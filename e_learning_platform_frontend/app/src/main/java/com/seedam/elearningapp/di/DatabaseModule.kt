package com.seedam.elearningapp.di

import android.content.Context
import androidx.room.Room
// Import các file vừa tạo
import com.seedam.elearningapp.data.local.AppDatabase
import com.seedam.elearningapp.data.local.CourseDao
import dagger.Module
import dagger.Provides
import dagger.hilt.InstallIn
import dagger.hilt.android.qualifiers.ApplicationContext
import dagger.hilt.components.SingletonComponent
import javax.inject.Singleton

@Module
@InstallIn(SingletonComponent::class)
object DatabaseModule {

    // Bỏ comment hàm này
    @Provides
    @Singleton
    fun provideAppDatabase(@ApplicationContext context: Context): AppDatabase {
        return Room.databaseBuilder(
            context,
            AppDatabase::class.java,
            "elearning_db" // Tên file CSDL
        ).fallbackToDestructiveMigration() // Thêm dòng này để tránh crash khi nâng version
            .build()
    }

    // Bỏ comment hàm này
    @Provides
    @Singleton
    fun provideCourseDao(appDatabase: AppDatabase): CourseDao {
        return appDatabase.courseDao()
    }

    // ... Cung cấp các DAO khác ở đây
}