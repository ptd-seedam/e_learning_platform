package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.UserDto
import com.seedam.stuonadminrule.domain.model.User

fun UserDto.toUser(): User {
    return User(
        id = id,
        username = username,
        fullName = fullName,
        email = email,
        role = role
    )
}
