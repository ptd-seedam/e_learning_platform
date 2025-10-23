package com.seedam.stuonadminrule.ui.features.course_detail

import com.seedam.stuonadminrule.domain.model.Course

data class CourseDetailState(
    val course: Course? = null,
    val isLoading: Boolean = false,
    val error: String? = null
)
