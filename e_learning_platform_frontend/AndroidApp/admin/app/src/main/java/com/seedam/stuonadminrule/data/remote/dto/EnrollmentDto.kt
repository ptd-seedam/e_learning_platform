package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName
import java.util.Date

data class EnrollmentDto(
    @SerializedName("EnrollmentId") val id: Int,
    @SerializedName("UserId") val userId: String, // Liên kết với User
    @SerializedName("CourseId") val courseId: Int, // Liên kết với Course
    @SerializedName("EnrollDate") val enrollDate: Date,
    @SerializedName("Progress") val progress: Int
)
