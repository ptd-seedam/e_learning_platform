package com.seedam.elearningapp.ui.navigation

import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.navigation.NavHostController
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import com.seedam.elearningapp.ui.features.home.HomeScreen
import com.seedam.elearningapp.ui.features.login.LoginScreen

@Composable
fun AppNavHost(
    navController: NavHostController,
    modifier: Modifier = Modifier
) {
    NavHost(
        navController = navController,
        startDestination = Routes.LOGIN, // Màn hình bắt đầu là Login
        modifier = modifier
    ) {
        // Định nghĩa Màn hình Đăng nhập
        composable(route = Routes.LOGIN) {
            LoginScreen(
                // Khi Login thành công, điều hướng đến HOME
                onLoginSuccess = {
                    navController.navigate(Routes.HOME) {
                        // Xóa LoginScreen khỏi backstack (để không quay lại được)
                        popUpTo(Routes.LOGIN) {
                            inclusive = true
                        }
                    }
                }
            )
        }

        // Định nghĩa Màn hình Trang chủ
        composable(route = Routes.HOME) {
            HomeScreen()
        }

        // Thêm các màn hình khác (composable) ở đây
    }
}