package com.seedam.elearningapp.domain.model

// Model này đại diện cho một bài học
data class Lesson(
    val id: Int,
    val title: String,
    val videoUrl: String,
    val orderIndex: Int
)