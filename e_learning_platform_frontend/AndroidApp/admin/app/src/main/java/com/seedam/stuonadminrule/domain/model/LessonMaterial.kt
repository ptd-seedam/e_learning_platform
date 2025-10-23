package com.seedam.stuonadminrule.domain.model

data class LessonMaterial(
    val id: Int,
    val lessonId: Int,
    val fileName: String,
    val fileUrl: String
)
