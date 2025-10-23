package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName
import java.util.Date

data class ReviewDto(
    @SerializedName("ReviewId") val id: Int,
    @SerializedName("CourseId") val courseId: Int, // Liên kết với Course
    @SerializedName("UserId") val userId: String, // Liên kết với User
    @SerializedName("Rating") val rating: Int,
    @SerializedName("Comment") val comment: String?,
    @SerializedName("ReviewDate") val reviewDate: Date
)
