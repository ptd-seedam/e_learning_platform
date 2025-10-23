package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.QuizDto
import com.seedam.stuonadminrule.domain.model.Quiz

fun QuizDto.toQuiz(): Quiz {
    return Quiz(
        id = id,
        title = title,
        description = description,
        duration = duration,
        passScore = passScore
    )
}
