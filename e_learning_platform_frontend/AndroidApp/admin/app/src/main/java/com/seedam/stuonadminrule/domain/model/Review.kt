package com.seedam.stuonadminrule.domain.model

import java.util.Date

data class Review(
    val id: Int,
    val courseId: Int,
    val userId: String,
    val rating: Int,
    val comment: String?,
    val reviewDate: Date
)
