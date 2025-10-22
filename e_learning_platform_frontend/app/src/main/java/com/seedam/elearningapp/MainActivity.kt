package com.seedam.elearningapp

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.ui.Modifier
import androidx.navigation.compose.rememberNavController
import com.seedam.elearningapp.ui.navigation.AppNavHost
//import com.seedam.elearningapp.ui.theme.ELearningSeedamTheme
import dagger.hilt.android.AndroidEntryPoint

@AndroidEntryPoint
class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            // Chúng ta có thể tạo file theme riêng (trong ui/theme)
            // hoặc dùng MaterialTheme mặc định
            MaterialTheme {
                Surface(
                    modifier = Modifier.fillMaxSize(),
                    color = MaterialTheme.colorScheme.background
                ) {
                    // 1. Tạo NavController
                    val navController = rememberNavController()

                    // 2. Hiển thị AppNavHost
                    AppNavHost(navController = navController)
                }
            }
        }
    }
}