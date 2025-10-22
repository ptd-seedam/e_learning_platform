package com.seedam.elearningapp.domain.model

// Model này đại diện cho thông tin người dùng
data class User(
    val id: Int,
    val username: String,
    val fullName: String,
    val email: String,
    val role: String
)