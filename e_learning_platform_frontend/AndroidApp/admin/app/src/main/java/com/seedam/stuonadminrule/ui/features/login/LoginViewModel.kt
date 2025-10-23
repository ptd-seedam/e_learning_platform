package com.seedam.stuonadminrule.ui.features.login

import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.seedam.stuonadminrule.data.remote.dto.LoginRequest
import com.seedam.stuonadminrule.domain.usecase.LoginUseCase
import com.seedam.stuonadminrule.utils.Resource
import dagger.hilt.android.lifecycle.HiltViewModel
import kotlinx.coroutines.flow.MutableSharedFlow
import kotlinx.coroutines.flow.MutableStateFlow
import kotlinx.coroutines.flow.asSharedFlow
import kotlinx.coroutines.flow.asStateFlow
import kotlinx.coroutines.flow.update
import kotlinx.coroutines.launch
import javax.inject.Inject

@HiltViewModel
class LoginViewModel @Inject constructor(
    private val loginUseCase: LoginUseCase
) : ViewModel() {

    private val _state = MutableStateFlow(LoginState())
    val state = _state.asStateFlow()

    private val _loginEvent = MutableSharedFlow<Unit>()
    val loginEvent = _loginEvent.asSharedFlow()

    fun onLoginClick(email: String, password: String) {
        viewModelScope.launch {
            _state.update { it.copy(isLoading = true, loginError = null) }
            val loginRequest = LoginRequest(email, password)
            when (val result = loginUseCase(loginRequest)) {
                is Resource.Success -> {
                    _loginEvent.emit(Unit)
                }
                is Resource.Error -> {
                    _state.update { it.copy(loginError = result.message) }
                }
                is Resource.Loading -> { /* No-op */ }
            }
            _state.update { it.copy(isLoading = false) }
        }
    }
}
