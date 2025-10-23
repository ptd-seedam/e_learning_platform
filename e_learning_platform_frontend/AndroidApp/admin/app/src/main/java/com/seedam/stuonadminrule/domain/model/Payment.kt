package com.seedam.stuonadminrule.domain.model

import java.util.Date

data class Payment(
    val id: Int,
    val enrollmentId: Int,
    val amount: Double,
    val paymentDate: Date,
    val paymentMethod: String,
    val status: String
)
