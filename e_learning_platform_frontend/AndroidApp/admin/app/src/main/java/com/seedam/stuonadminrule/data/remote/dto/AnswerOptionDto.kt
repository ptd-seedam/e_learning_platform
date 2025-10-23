package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName

data class AnswerOptionDto(
    @SerializedName("OptionId") val id: Int,
    @SerializedName("OptionText") val text: String,
    @SerializedName("IsCorrect") val isCorrect: Boolean,
    @SerializedName("QuestionId") val questionId: Int // Liên kết với Question
)
