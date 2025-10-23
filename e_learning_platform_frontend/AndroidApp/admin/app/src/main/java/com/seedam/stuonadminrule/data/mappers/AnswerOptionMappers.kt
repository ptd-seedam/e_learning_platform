package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.AnswerOptionDto
import com.seedam.stuonadminrule.domain.model.AnswerOption

fun AnswerOptionDto.toAnswerOption(): AnswerOption {
    return AnswerOption(
        id = id,
        text = text,
        isCorrect = isCorrect
    )
}
