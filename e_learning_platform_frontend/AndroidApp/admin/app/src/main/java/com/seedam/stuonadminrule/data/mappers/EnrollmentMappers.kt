package com.seedam.stuonadminrule.data.mappers

import com.seedam.stuonadminrule.data.remote.dto.EnrollmentDto
import com.seedam.stuonadminrule.domain.model.Enrollment

fun EnrollmentDto.toEnrollment(): Enrollment {
    return Enrollment(
        id = id,
        userId = userId,
        courseId = courseId,
        enrollDate = enrollDate,
        progress = progress
    )
}
