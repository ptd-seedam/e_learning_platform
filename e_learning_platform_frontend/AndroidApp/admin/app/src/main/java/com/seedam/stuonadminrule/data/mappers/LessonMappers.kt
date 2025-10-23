package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.LessonDto
import com.seedam.stuonadminrule.domain.model.Lesson

fun LessonDto.toLesson(): Lesson {
    return Lesson(
        id = id,
        title = title,
        videoUrl = videoUrl,
        orderIndex = orderIndex
    )
}
