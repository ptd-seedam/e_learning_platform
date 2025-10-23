package com.seedam.stuonadminrule.domain.model

import java.util.Date

data class Enrollment(
    val id: Int,
    val userId: String,
    val courseId: Int,
    val enrollDate: Date,
    val progress: Int
)
