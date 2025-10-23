package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.LiveClassDto
import com.seedam.stuonadminrule.domain.model.LiveClass

fun LiveClassDto.toLiveClass(): LiveClass {
    return LiveClass(
        id = id,
        courseId = courseId,
        startTime = startTime,
        endTime = endTime,
        meetingLink = meetingLink,
        description = description
    )
}
