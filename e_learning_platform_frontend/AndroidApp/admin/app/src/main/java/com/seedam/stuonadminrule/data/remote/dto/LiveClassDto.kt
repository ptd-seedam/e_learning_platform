package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName
import java.util.Date

data class LiveClassDto(
    @SerializedName("LiveClassId") val id: Int,
    @SerializedName("CourseId") val courseId: Int, // Liên kết với Course
    @SerializedName("StartTime") val startTime: Date,
    @SerializedName("EndTime") val endTime: Date,
    @SerializedName("MeetingLink") val meetingLink: String,
    @SerializedName("Description") val description: String?
)
