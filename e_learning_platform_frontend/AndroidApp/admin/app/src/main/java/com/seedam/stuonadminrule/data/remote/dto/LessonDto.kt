package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName

data class LessonDto(
    @SerializedName("LessonId") val id: Int,
    @SerializedName("Title") val title: String,
    @SerializedName("VideoUrl") val videoUrl: String?,
    @SerializedName("OrderIndex") val orderIndex: Int,
    @SerializedName("CourseId") val courseId: Int // Thêm trường này để liên kết với Course
)
