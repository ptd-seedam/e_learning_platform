package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.LessonMaterialDto
import com.seedam.stuonadminrule.domain.model.LessonMaterial

fun LessonMaterialDto.toLessonMaterial(): LessonMaterial {
    return LessonMaterial(
        id = id,
        lessonId = lessonId,
        fileName = fileName,
        fileUrl = fileUrl
    )
}
