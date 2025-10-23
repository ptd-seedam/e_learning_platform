package com.seedam.stuonadminrule.data.remote

import com.seedam.stuonadminrule.data.remote.dto.CourseDto
import com.seedam.stuonadminrule.data.remote.dto.LoginRequest
import com.seedam.stuonadminrule.data.remote.dto.LoginResponse
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.Path

interface ApiService {
    @POST("auth/login")
    suspend fun login(@Body request: LoginRequest): LoginResponse

    @GET("courses")
    suspend fun getCourses(): List<CourseDto>

    @GET("courses/{id}")
    suspend fun getCourseById(@Path("id") courseId: Int): CourseDto
}
