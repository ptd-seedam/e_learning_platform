package com.seedam.elearningapp.domain.model

// Model này đại diện cho một bài kiểm tra
data class Quiz(
    val id: Int,
    val title: String,
    val description: String,
    val duration: Int // Thời gian (tính bằng phút)
)