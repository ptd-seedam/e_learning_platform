package com.seedam.stuonadminrule.domain.usecase

import com.seedam.stuonadminrule.domain.model.Course
import com.seedam.stuonadminrule.domain.repository.UserRepository
import com.seedam.stuonadminrule.utils.Resource
import kotlinx.coroutines.flow.Flow
import kotlinx.coroutines.flow.flow
import javax.inject.Inject

class GetCoursesUseCase @Inject constructor(
    private val repository: UserRepository
) {
    operator fun invoke(): Flow<Resource<List<Course>>> = flow {
        emit(Resource.Loading())
        val result = repository.getCourses()
        emit(result)
    }
}
