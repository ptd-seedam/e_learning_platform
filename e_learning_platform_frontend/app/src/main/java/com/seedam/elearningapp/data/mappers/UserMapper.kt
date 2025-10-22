package com.seedam.elearningapp.data.mappers

import com.seedam.elearningapp.data.remote.dto.UserDto
import com.seedam.elearningapp.domain.model.User

/**
 * Hàm mở rộng (extension function) để chuyển UserDto (từ API)
 * thành User (model "sạch" của domain)
 */
fun UserDto.toUser(): User {
    return User(
        id = this.id,
        username = this.username,
        fullName = this.fullName,
        email = this.email,
        role = this.role
    )
}