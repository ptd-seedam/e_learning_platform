package com.seedam.elearningapp.data.repository

import com.seedam.elearningapp.data.mappers.toUser // <-- Import hàm mapper
import com.seedam.elearningapp.data.remote.ApiService
import com.seedam.elearningapp.data.remote.LoginRequest
import com.seedam.elearningapp.domain.model.User
import com.seedam.elearningapp.domain.repository.AuthRepository
import com.seedam.elearningapp.utils.Resource
import kotlinx.coroutines.flow.Flow // Bạn có thể cần cái này cho các hàm khác
import kotlinx.coroutines.flow.flow // Bạn có thể cần cái này cho các hàm khác
import javax.inject.Inject
import javax.inject.Singleton

@Singleton
class AuthRepositoryImpl @Inject constructor(
    private val apiService: ApiService // <-- Hilt tự động tiêm (inject) ApiService vào đây
) : AuthRepository { // <-- Triển khai interface AuthRepository

    override suspend fun login(username: String, password: String): Resource<User> {
        // Tạo đối tượng request
        val request = LoginRequest(
            USERNAME = username,
            PASSWORD = password
        )

        return try {
            // Gọi API
            val response = apiService.login(request)

            // Lấy UserDto từ response và map nó sang User (model domain)
            val user = response.user.toUser()

            // Trả về thành công
            Resource.Success(user)

        } catch (e: Exception) {
            // Xử lý lỗi (ví dụ: lỗi mạng, lỗi 401, v.v.)
            e.printStackTrace() // In lỗi ra logcat
            Resource.Error(e.message ?: "Đã xảy ra lỗi không xác định")
        }
    }

    override suspend fun register(
        username: String,
        email: String,
        password: String
    ): Resource<User> {
        TODO("Not yet implemented")
    }

    override suspend fun logout(): Resource<Unit> {
        TODO("Not yet implemented")
    }

    // ... Triển khai các hàm 'register' và 'logout' ở đây
}