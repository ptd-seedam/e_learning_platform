package com.seedam.elearningapp.data.local

import androidx.room.Dao
import androidx.room.Insert
import androidx.room.OnConflictStrategy
import androidx.room.Query
import com.seedam.elearningapp.data.local.entity.CourseEntity
import kotlinx.coroutines.flow.Flow

@Dao
interface CourseDao {

    // Chèn một danh sách các khóa học. Nếu bị trùng ID, ghi đè lên
    @Insert(onConflict = OnConflictStrategy.REPLACE)
    suspend fun insertAll(courses: List<CourseEntity>)

    // Xóa tất cả dữ liệu trong bảng
    @Query("DELETE FROM courses")
    suspend fun clearAll()

    // Lấy tất cả khóa học.
    // Quan trọng: Trả về một Flow. Room sẽ tự động phát (emit)
    // dữ liệu mới mỗi khi bảng này thay đổi.
    @Query("SELECT * FROM courses")
    fun getAllCourses(): Flow<List<CourseEntity>>
}