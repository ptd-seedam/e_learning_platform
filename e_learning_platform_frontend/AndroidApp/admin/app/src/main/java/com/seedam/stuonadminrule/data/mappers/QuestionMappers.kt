package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.QuestionDto
import com.seedam.stuonadminrule.domain.model.Question

fun QuestionDto.toQuestion(): Question {
    return Question(
        id = id,
        text = text,
        type = type
    )
}
