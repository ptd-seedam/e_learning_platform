package com.seedam.elearningapp.data.mappers

import com.seedam.elearningapp.data.local.entity.CourseEntity
import com.seedam.elearningapp.data.remote.dto.CourseDto
import com.seedam.elearningapp.domain.model.Course

/**
 * Ánh xạ từ CourseDto (API) sang CourseEntity (Database)
 */
fun CourseDto.toCourseEntity(): CourseEntity {
    return CourseEntity(
        id = this.id,
        title = this.title,
        description = this.description,
        price = this.price,
        imageUrl = this.imageUrl,
        teacherName = this.teacher?.fullName ?: "Không rõ" // Xử lý null
    )
}

/**
 * Ánh xạ từ CourseEntity (Database) sang Course (Domain Model)
 */
fun CourseEntity.toCourse(): Course {
    return Course(
        id = this.id,
        title = this.title,
        description = this.description,
        price = this.price,
        imageUrl = this.imageUrl,
        teacherName = this.teacherName
    )
}