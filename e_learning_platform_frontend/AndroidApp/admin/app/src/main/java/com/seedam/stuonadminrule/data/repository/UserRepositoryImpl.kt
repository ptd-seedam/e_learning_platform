package com.seedam.stuonadminrule.data.repository

import com.seedam.stuonadminrule.data.mappers.toCourse
import com.seedam.stuonadminrule.data.remote.ApiService
import com.seedam.stuonadminrule.data.remote.dto.LoginRequest
import com.seedam.stuonadminrule.data.remote.dto.LoginResponse
import com.seedam.stuonadminrule.domain.model.Course
import com.seedam.stuonadminrule.domain.repository.UserRepository
import com.seedam.stuonadminrule.utils.Resource
import retrofit2.HttpException
import java.io.IOException
import javax.inject.Inject

class UserRepositoryImpl @Inject constructor(
    private val apiService: ApiService
) : UserRepository {

    override suspend fun login(loginRequest: LoginRequest): Resource<LoginResponse> {
        return try {
            val response = apiService.login(loginRequest)
            Resource.Success(response)
        } catch (e: IOException) {
            Resource.Error("Không thể kết nối đến máy chủ. Vui lòng kiểm tra lại kết nối mạng.")
        } catch (e: HttpException) {
            when(e.code()) {
                401, 403 -> Resource.Error("Sai email hoặc mật khẩu.")
                422 -> Resource.Error("Dữ liệu không hợp lệ.")
                500 -> Resource.Error("Máy chủ đang gặp sự cố. Vui lòng thử lại sau.")
                else -> Resource.Error("Đã xảy ra lỗi không xác định: ${e.message()}")
            }
        } catch (e: Exception) {
            Resource.Error("Đã có lỗi xảy ra: ${e.localizedMessage}")
        }
    }

    override suspend fun getCourses(): Resource<List<Course>> {
        return try {
            val courseDtos = apiService.getCourses()
            val courses = courseDtos.map { it.toCourse() }
            Resource.Success(courses)
        } catch (e: IOException) {
            Resource.Error("Không thể tải danh sách khóa học. Vui lòng kiểm tra lại kết nối mạng.")
        } catch (e: HttpException) {
            Resource.Error("Không thể tải danh sách khóa học: Lỗi máy chủ ${e.code()}")
        } catch (e: Exception) {
            Resource.Error("Đã có lỗi không xác định xảy ra khi tải khóa học.")
        }
    }
    override suspend fun getCourseById(courseId: Int): Resource<Course> {
        return try {
            val courseDto = apiService.getCourseById(courseId)
            Resource.Success(courseDto.toCourse())
        } catch (e: IOException) {
            Resource.Error("Không thể tải chi tiết khóa học. Vui lòng kiểm tra lại kết nối mạng.")
        } catch (e: HttpException) {
            Resource.Error("Không thể tải chi tiết khóa học: Lỗi máy chủ ${e.code()}")
        } catch (e: Exception) {
            Resource.Error("Đã có lỗi không xác định xảy ra khi tải chi tiết khóa học.")
        }
    }
}
