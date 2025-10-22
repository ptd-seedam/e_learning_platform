package com.seedam.elearningapp.ui.features.login

// Data class đại diện cho toàn bộ trạng thái của LoginScreen
data class LoginState(
    val usernameInput: String = "",
    val passwordInput: String = "",
    val isLoading: Boolean = false,
    val loginError: String? = null,
    val loginSuccess: Boolean = false // Sẽ dùng để điều hướng
)