package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName

data class LessonMaterialDto(
    @SerializedName("MaterialId") val id: Int,
    @SerializedName("LessonId") val lessonId: Int, // Liên kết với Lesson
    @SerializedName("FileName") val fileName: String,
    @SerializedName("FileUrl") val fileUrl: String
)
