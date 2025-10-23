package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName

data class CourseDto(
    @SerializedName("CourseId") val id: Int,
    @SerializedName("Title") val title: String,
    @SerializedName("Description") val description: String,
    @SerializedName("Price") val price: Double,
    @SerializedName("ImageUrl") val imageUrl: String?,
    @SerializedName("TeacherId") val teacherId: String,
    @SerializedName("Status") val status: String
)
