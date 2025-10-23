package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName
import java.util.Date

data class PaymentDto(
    @SerializedName("PAYMENTID") val id: Int,
    @SerializedName("EnrollmentId") val enrollmentId: Int, // Liên kết với Enrollment
    @SerializedName("Amount") val amount: Double,
    @SerializedName("PaymentDate") val paymentDate: Date,
    @SerializedName("PaymentMethod") val paymentMethod: String,
    @SerializedName("Status") val status: String
)
