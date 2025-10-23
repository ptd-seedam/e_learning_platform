package com.seedam.stuonadminrule

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import com.seedam.stuonadminrule.ui.navigation.AppNavHost
import com.seedam.stuonadminrule.ui.theme.StuOnAdminRuleTheme
import dagger.hilt.android.AndroidEntryPoint

@AndroidEntryPoint
class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            StuOnAdminRuleTheme {
                AppNavHost()
            }
        }
    }
}
