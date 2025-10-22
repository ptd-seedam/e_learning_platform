package com.seedam.elearningapp.di

import com.seedam.elearningapp.data.repository.AuthRepositoryImpl
import com.seedam.elearningapp.data.repository.CourseRepositoryImpl // <-- Import
import com.seedam.elearningapp.domain.repository.AuthRepository
import com.seedam.elearningapp.domain.repository.CourseRepository // <-- Import
import dagger.Binds
import dagger.Module
import dagger.hilt.InstallIn
import dagger.hilt.components.SingletonComponent
import javax.inject.Singleton

@Module
@InstallIn(SingletonComponent::class)
abstract class RepositoryModule {

    @Binds
    @Singleton
    abstract fun bindAuthRepository(
        authRepositoryImpl: AuthRepositoryImpl
    ): AuthRepository

    // Thêm hàm bind này
    @Binds
    @Singleton
    abstract fun bindCourseRepository(
        courseRepositoryImpl: CourseRepositoryImpl
    ): CourseRepository
}