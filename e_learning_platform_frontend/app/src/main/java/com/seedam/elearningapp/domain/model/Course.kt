package com.seedam.elearningapp.domain.model

// Model này đại diện cho một khóa học
data class Course(
    val id: Int,
    val title: String,
    val description: String,
    val price: Double,
    val imageUrl: String,
    val teacherName: String // Chúng ta sẽ "làm phẳng" dữ liệu, chỉ lấy tên GV
)