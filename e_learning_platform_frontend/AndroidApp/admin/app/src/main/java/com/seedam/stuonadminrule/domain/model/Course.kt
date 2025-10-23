package com.seedam.stuonadminrule.domain.model

data class Course(
    val id: Int,
    val title: String,
    val description: String,
    val imageUrl: String?,
    val teacherId: String
)
