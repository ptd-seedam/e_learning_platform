package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.CourseDto
import com.seedam.stuonadminrule.domain.model.Course

fun CourseDto.toCourse(): Course {
    return Course(
        id = id,
        title = title,
        description = description,
        imageUrl = imageUrl,
        teacherId = teacherId
    )
}
