package com.seedam.elearningapp.domain.repository

import com.seedam.elearningapp.domain.model.Course
import com.seedam.elearningapp.utils.Resource
import kotlinx.coroutines.flow.Flow

// Interface cho các hành động liên quan đến khóa học
interface CourseRepository {

    // Lấy tất cả khóa học
     suspend fun getAllCourses(): Flow<Resource<List<Course>>>

    // Lấy chi tiết một khóa học
     suspend fun getCourseDetails(courseId: Int): Resource<Course>
}