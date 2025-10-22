package com.seedam.elearningapp.domain.repository

import com.seedam.elearningapp.domain.model.User
import com.seedam.elearningapp.utils.Resource // Chúng ta sẽ tạo file này sau

// Interface cho các hành động xác thực
interface AuthRepository {

     suspend fun login(username: String, password: String): Resource<User>

     suspend fun register(username: String, email: String, password: String): Resource<User>

     suspend fun logout(): Resource<Unit>

    // Chúng ta sẽ bỏ comment khi tạo lớp Resource ở bước sau
}