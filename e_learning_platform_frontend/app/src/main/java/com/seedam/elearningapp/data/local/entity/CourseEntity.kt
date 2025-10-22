package com.seedam.elearningapp.data.local.entity

import androidx.room.Entity
import androidx.room.PrimaryKey

@Entity(tableName = "courses") // Tên của bảng
data class CourseEntity(
    @PrimaryKey
    val id: Int,
    val title: String,
    val description: String,
    val price: Double,
    val imageUrl: String,
    val teacherName: String
    // Chúng ta lưu phiên bản "sạch" đã được xử lý
)