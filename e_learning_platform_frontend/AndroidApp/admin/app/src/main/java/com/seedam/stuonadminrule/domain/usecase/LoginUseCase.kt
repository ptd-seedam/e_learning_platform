package com.seedam.stuonadminrule.domain.usecase

import com.seedam.stuonadminrule.data.remote.dto.LoginRequest
import com.seedam.stuonadminrule.data.remote.dto.LoginResponse
import com.seedam.stuonadminrule.domain.repository.UserRepository
import com.seedam.stuonadminrule.utils.Resource
import javax.inject.Inject

class LoginUseCase @Inject constructor(
    private val repository: UserRepository
) {
    suspend operator fun invoke(loginRequest: LoginRequest): Resource<LoginResponse> {
        return repository.login(loginRequest)
    }
}
