package com.seedam.elearningapp.ui.features.login

import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Button
import androidx.compose.material3.CircularProgressIndicator
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.runtime.getValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.text.input.PasswordVisualTransformation
import androidx.compose.ui.unit.dp
import androidx.hilt.navigation.compose.hiltViewModel
import androidx.compose.runtime.collectAsState

@Composable
fun LoginScreen(
    // Chúng ta sẽ thêm NavController ở đây để điều hướng
     onLoginSuccess: () -> Unit
) {
    // 1. Lấy ViewModel (Hilt sẽ tự động cung cấp)
    val viewModel: LoginViewModel = hiltViewModel()

    // 2. Lấy state từ ViewModel và quan sát thay đổi
    // (collectAsStateWithLifecycle là cách an toàn nhất)
    val state by viewModel.state.collectAsState()

    // 3. Xử lý logic "chỉ một lần" (ví dụ: điều hướng khi đăng nhập thành công)
    LaunchedEffect(key1 = state.loginSuccess) {
        if (state.loginSuccess) {
            // TODO: Điều hướng đến màn hình chính (HomeScreen)
             onLoginSuccess()
        }
    }

    // 4. Xây dựng giao diện
    Scaffold { paddingValues ->
        Box(
            modifier = Modifier
                .fillMaxSize()
                .padding(paddingValues)
                .padding(16.dp),
            contentAlignment = Alignment.Center
        ) {
            Column(
                modifier = Modifier.fillMaxWidth(),
                horizontalAlignment = Alignment.CenterHorizontally,
                verticalArrangement = Arrangement.Center
            ) {
                Text(text = "Đăng Nhập", style = MaterialTheme.typography.headlineMedium)

                Spacer(modifier = Modifier.height(32.dp))

                // Ô nhập Username
                OutlinedTextField(
                    value = state.usernameInput,
                    onValueChange = { viewModel.onUsernameChange(it) },
                    label = { Text("Tên đăng nhập") },
                    modifier = Modifier.fillMaxWidth(),
                    isError = state.loginError != null
                )

                Spacer(modifier = Modifier.height(16.dp))

                // Ô nhập Password
                OutlinedTextField(
                    value = state.passwordInput,
                    onValueChange = { viewModel.onPasswordChange(it) },
                    label = { Text("Mật khẩu") },
                    modifier = Modifier.fillMaxWidth(),
                    visualTransformation = PasswordVisualTransformation(),
                    isError = state.loginError != null
                )

                Spacer(modifier = Modifier.height(8.dp))

                // Hiển thị thông báo lỗi
                if (state.loginError != null) {
                    Text(
                        text = state.loginError!!,
                        color = Color.Red,
                        style = MaterialTheme.typography.bodySmall
                    )
                }

                Spacer(modifier = Modifier.height(24.dp))

                // Nút Đăng nhập
                Button(
                    onClick = { viewModel.onLoginClick() },
                    modifier = Modifier.fillMaxWidth(),
                    // Vô hiệu hóa nút khi đang tải
                    enabled = !state.isLoading
                ) {
                    Text(text = "Đăng Nhập")
                }
            }

            // Hiển thị vòng xoay Loading
            if (state.isLoading) {
                CircularProgressIndicator()
            }
        }
    }
}