package com.seedam.stuonadminrule.data.remote.dto

import com.google.gson.annotations.SerializedName

data class QuestionDto(
    @SerializedName("QuestionId") val id: Int,
    @SerializedName("QuestionText") val text: String,
    @SerializedName("QuestionType") val type: String,
    @SerializedName("QuizId") val quizId: Int // Liên kết với Quiz
)
