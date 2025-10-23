package com.seedam.stuonadminrule.domain.repository

import com.seedam.stuonadminrule.data.remote.dto.LoginRequest
import com.seedam.stuonadminrule.data.remote.dto.LoginResponse
import com.seedam.stuonadminrule.domain.model.Course
import com.seedam.stuonadminrule.utils.Resource

interface UserRepository {
    suspend fun login(loginRequest: LoginRequest): Resource<LoginResponse>

    suspend fun getCourses(): Resource<List<Course>>

    suspend fun getCourseById(courseId: Int): Resource<Course>
}
