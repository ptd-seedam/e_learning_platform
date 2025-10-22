package com.seedam.elearningapp.data.repository

import com.seedam.elearningapp.data.local.CourseDao
import com.seedam.elearningapp.data.mappers.toCourse
import com.seedam.elearningapp.data.mappers.toCourseEntity
import com.seedam.elearningapp.data.remote.ApiService
import com.seedam.elearningapp.domain.model.Course
import com.seedam.elearningapp.domain.repository.CourseRepository
import com.seedam.elearningapp.utils.Resource
import kotlinx.coroutines.flow.Flow
import kotlinx.coroutines.flow.firstOrNull
import kotlinx.coroutines.flow.flow
import kotlinx.coroutines.flow.map
import retrofit2.HttpException
import java.io.IOException
import javax.inject.Inject
import javax.inject.Singleton

@Singleton
class CourseRepositoryImpl @Inject constructor(
    private val apiService: ApiService,
    private val courseDao: CourseDao
) : CourseRepository {

    override suspend fun getAllCourses(): Flow<Resource<List<Course>>> {
        return flow {
            // 1. Tạo một Flow để lấy dữ liệu từ CSDL
            val localCoursesFlow = courseDao.getAllCourses().map { entities ->
                entities.map { it.toCourse() } // Map Entity -> Domain
            }

            // 2. Lấy dữ liệu CÓ SẴN (nếu có) từ CSDL
            //    Chúng ta dùng firstOrNull() để lấy giá trị hiện tại một cách an toàn
            val currentData = try {
                localCoursesFlow.firstOrNull()
            } catch (e: Exception) {
                null // Coi như là rỗng nếu có lỗi
            }

            // 3. Phát (emit) trạng thái Loading VỚI dữ liệu cũ (nếu có)
            emit(Resource.Loading(data = currentData))

            // 4. Bắt đầu khối try-catch để gọi API
            try {
                // 5. Gọi API lấy dữ liệu mới
                val remoteCoursesDto = apiService.getAllCourses()

                // 6. Xóa CSDL cũ và chèn dữ liệu mới
                courseDao.clearAll()
                courseDao.insertAll(remoteCoursesDto.map { it.toCourseEntity() })

                // 7. Bắt đầu lắng nghe CSDL
                //    Flow sẽ tự động phát ra dữ liệu mới (vừa chèn)
                localCoursesFlow.collect { newData ->
                    emit(Resource.Success(data = newData))
                }

            } catch (e: HttpException) {
                // 8. Lỗi HTTP (404, 500...)
                //    Phát ra lỗi, KÈM THEO dữ liệu cũ (đã lưu ở bước 2)
                emit(Resource.Error(
                    message = "Lỗi HTTP: ${e.message()}",
                    data = currentData
                ))
            } catch (e: IOException) {
                // 9. Lỗi mạng (mất kết nối)
                //    Phát ra lỗi, KÈM THEO dữ liệu cũ
                emit(Resource.Error(
                    message = "Lỗi mạng. Vui lòng kiểm tra kết nối.",
                    data = currentData
                ))
            }
        }
    }

    // Hàm getCourseDetails không thay đổi
    override suspend fun getCourseDetails(courseId: Int): Resource<Course> {
        return try {
            val courseDto = apiService.getCourseDetails(courseId)
            val course = courseDto.toCourseEntity().toCourse()
            Resource.Success(course)
        } catch (e: Exception) {
            Resource.Error(e.message ?: "Đã xảy ra lỗi")
        }
    }
}