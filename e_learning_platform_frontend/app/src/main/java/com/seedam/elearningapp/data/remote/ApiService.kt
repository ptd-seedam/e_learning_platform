package com.seedam.elearningapp.data.remote

import com.seedam.elearningapp.data.remote.dto.AuthResponse
import com.seedam.elearningapp.data.remote.dto.CourseDto
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.Path

interface ApiService {

    // Endpoint đăng nhập
    @POST("auth/login")
    suspend fun login(
        @Body loginRequest: LoginRequest // Chúng ta sẽ tạo LoginRequest DTO sau
    ): AuthResponse

    // Endpoint lấy tất cả khóa học
    @GET("courses")
    suspend fun getAllCourses(): List<CourseDto>

    // Endpoint lấy chi tiết một khóa học
    @GET("courses/{id}")
    suspend fun getCourseDetails(
        @Path("id") courseId: Int
    ): CourseDto

    // ... Thêm các endpoint khác (register, getLessons, v.v.) ở đây
}

// Chúng ta cũng cần DTO cho Login Request
data class LoginRequest(
    val USERNAME: String,
    val PASSWORD: String
)