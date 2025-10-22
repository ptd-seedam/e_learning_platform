package com.seedam.elearningapp.data.remote.dto

import com.squareup.moshi.Json

// DTO này khớp với JSON trả về khi đăng nhập
data class AuthResponse(
    @field:Json(name = "access_token")
    val accessToken: String,

    @field:Json(name = "token_type")
    val tokenType: String,

    @field:Json(name = "expires_in")
    val expiresIn: Int,

    @field:Json(name = "user")
    val user: UserDto // Một DTO User lồng bên trong
)

// DTO này khớp với đối tượng 'user' trong JSON
data class UserDto(
    @field:Json(name = "USER_ID")
    val id: Int,

    @field:Json(name = "USERNAME")
    val username: String,

    @field:Json(name = "FULLNAME")
    val fullName: String,

    @field:Json(name = "EMAIL")
    val email: String,

    @field:Json(name = "ROLE")
    val role: String
    // Lưu ý: Chúng ta không lấy PASSWORD
)