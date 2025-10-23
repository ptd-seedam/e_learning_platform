package com.seedam.stuonadminrule.domain.model

data class Lesson(
    val id: Int,
    val title: String,
    val videoUrl: String?,
    val orderIndex: Int
)
