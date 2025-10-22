package com.seedam.elearningapp.domain.repository

import com.seedam.elearningapp.domain.model.Lesson
import com.seedam.elearningapp.utils.Resource
import kotlinx.coroutines.flow.Flow

// Interface cho các hành động liên quan đến bài học
interface LessonRepository {

    // Lấy tất cả bài học của MỘT khóa học
    // suspend fun getLessonsForCourse(courseId: Int): Flow<Resource<List<Lesson>>>
}