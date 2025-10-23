package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName

data class UserDto(
    @SerializedName("USER_UDID") val id: String,
    @SerializedName("USERNAME") val username: String,
    @SerializedName("FULLNAME") val fullName: String,
    @SerializedName("EMAIL") val email: String,
    @SerializedName("PHONENUMBER") val phoneNumber: String?,
    @SerializedName("ADDRESS") val address: String?,
    @SerializedName("ROLE") val role: String
)
