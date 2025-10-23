package com.seedam.stuonadminrule.domain.model

data class User(
    val id: String,
    val username: String,
    val fullName: String,
    val email: String,
    val role: String
)
