package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName

data class QuizDto(
    @SerializedName("QuizID") val id: Int,
    @SerializedName("Title") val title: String,
    @SerializedName("Description") val description: String?,
    @SerializedName("Duration") val duration: Int,
    @SerializedName("PassScore") val passScore: Int,
    @SerializedName("LessonId") val lessonId: Int // Liên kết với Lesson
)
