package com.seedam.stuonadminrule.domain.model

import java.util.Date

data class LiveClass(
    val id: Int,
    val courseId: Int,
    val startTime: Date,
    val endTime: Date,
    val meetingLink: String,
    val description: String?
)
