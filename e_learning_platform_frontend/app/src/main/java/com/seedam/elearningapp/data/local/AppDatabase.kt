package com.seedam.elearningapp.data.local

import androidx.room.Database
import androidx.room.RoomDatabase
import com.seedam.elearningapp.data.local.entity.CourseEntity

// Liệt kê tất cả các Entity (bảng)
@Database(
    entities = [CourseEntity::class], // Thêm các entity khác ở đây, vd: UserEntity
    version = 1 // Tăng số này lên khi bạn thay đổi cấu trúc bảng
)
abstract class AppDatabase : RoomDatabase() {

    // Liệt kê tất cả các DAO
    abstract fun courseDao(): CourseDao
    // abstract fun userDao(): UserDao
}