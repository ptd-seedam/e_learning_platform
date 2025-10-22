package com.seedam.elearningapp.ui.features.login

import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.seedam.elearningapp.domain.repository.AuthRepository
import com.seedam.elearningapp.utils.Resource
import dagger.hilt.android.lifecycle.HiltViewModel
import kotlinx.coroutines.flow.MutableStateFlow
import kotlinx.coroutines.flow.asStateFlow
import kotlinx.coroutines.flow.update
import kotlinx.coroutines.launch
import javax.inject.Inject

@HiltViewModel
class LoginViewModel @Inject constructor(
    private val authRepository: AuthRepository // <-- Hilt tự động tiêm Repository vào
) : ViewModel() {

    // _state: Trạng thái riêng tư, có thể thay đổi
    private val _state = MutableStateFlow(LoginState())
    // state: Trạng thái công khai, chỉ đọc, để UI quan sát
    val state = _state.asStateFlow()

    /**
     * Được gọi khi người dùng nhập vào ô username
     */
    fun onUsernameChange(username: String) {
        _state.update { it.copy(usernameInput = username) }
    }

    /**
     * Được gọi khi người dùng nhập vào ô password
     */
    fun onPasswordChange(password: String) {
        _state.update { it.copy(passwordInput = password) }
    }

    /**
     * Được gọi khi người dùng nhấn nút Đăng nhập
     */
    fun onLoginClick() {
        // Khởi chạy coroutine trong scope của ViewModel
        viewModelScope.launch {
            // 1. Cập nhật trạng thái sang Loading
            _state.update { it.copy(isLoading = true, loginError = null) }

            // 2. Gọi Repository
            val result = authRepository.login(
                username = _state.value.usernameInput,
                password = _state.value.passwordInput
            )

            // 3. Xử lý kết quả
            when (result) {
                is Resource.Success -> {
                    // Đăng nhập thành công
                    _state.update {
                        it.copy(
                            isLoading = false,
                            loginSuccess = true // Báo cho UI biết để điều hướng
                        )
                    }
                }
                is Resource.Error -> {
                    // Đăng nhập thất bại
                    _state.update {
                        it.copy(
                            isLoading = false,
                            loginError = result.message // Hiển thị thông báo lỗi
                        )
                    }
                }
                is Resource.Loading -> {
                    // (Đã xử lý ở trên)
                }
            }
        }
    }
}