package com.seedam.stuonadminrule.ui.features.home

import com.seedam.stuonadminrule.domain.model.Course

data class HomeState(
    val courses: List<Course> = emptyList(),
    val isLoading: Boolean = false,
    val error: String? = null
)
