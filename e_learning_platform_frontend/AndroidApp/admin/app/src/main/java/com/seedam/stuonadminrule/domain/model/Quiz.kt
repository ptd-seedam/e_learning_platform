package com.seedam.stuonadminrule.domain.model

data class Quiz(
    val id: Int,
    val title: String,
    val description: String?,
    val duration: Int,
    val passScore: Int
)
