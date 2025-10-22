// Top-level build file where you can add configuration options common to all sub-projects/modules.
// Áp dụng plugin bằng cách tham chiếu đến file TOML
plugins {
    alias(libs.plugins.android.application) apply false
    alias(libs.plugins.kotlin.android) apply false
    alias(libs.plugins.hilt) apply false
    alias(libs.plugins.ksp) apply false
}