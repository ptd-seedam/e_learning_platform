package com.seedam.elearningapp.data.remote.dto

import com.squareup.moshi.Json

// DTO này khớp với đối tượng 'course' trong JSON
data class CourseDto(
    @field:Json(name = "CourseId")
    val id: Int,

    @field:Json(name = "Title")
    val title: String,

    @field:Json(name = "Description")
    val description: String,

    @field:Json(name = "Price")
    val price: Double,

    @field:Json(name = "ImageUrl")
    val imageUrl: String,

    // Giả sử API của bạn trả về một đối tượng Teacher lồng nhau
    @field:Json(name = "teacher")
    val teacher: TeacherDto? // Hoặc chỉ là TeacherId tùy API của bạn
)

data class TeacherDto(
    @field:Json(name = "FULLNAME")
    val fullName: String
)