package com.seedam.stuonadminrule.ui.navigation

import androidx.compose.runtime.Composable
import androidx.navigation.NavType
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import androidx.navigation.navArgument
import com.seedam.stuonadminrule.ui.features.course_detail.CourseDetailScreen
import com.seedam.stuonadminrule.ui.features.home.HomeScreen
import com.seedam.stuonadminrule.ui.features.login.LoginScreen

object Routes {
    const val LOGIN = "login"
    const val HOME = "home"
    const val COURSE_DETAIL = "course_detail"
}

@Composable
fun AppNavHost() {
    val navController = rememberNavController()
    NavHost(navController = navController, startDestination = Routes.LOGIN) {
        composable(Routes.LOGIN) {
            LoginScreen(onLoginSuccess = {
                navController.navigate(Routes.HOME) {
                    popUpTo(Routes.LOGIN) { inclusive = true }
                }
            })
        }
        composable(Routes.HOME) {
            HomeScreen(onCourseClick = {
                navController.navigate("${Routes.COURSE_DETAIL}/${it}")
            })
        }
        composable(
            route = "${Routes.COURSE_DETAIL}/{courseId}",
            arguments = listOf(navArgument("courseId") { type = NavType.IntType })
        ) {
            CourseDetailScreen()
        }
    }
}
