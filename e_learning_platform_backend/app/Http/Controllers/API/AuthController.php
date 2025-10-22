<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tymon\JWTAuth\JWTGuard;

class AuthController extends BaseController
{
    /**
     * Guard sử dụng cho JWT.
     */
    protected function guard()
    {
        /** @var JWTGuard $guard */
        $guard = Auth::guard('api');
        return $guard;
    }
    /**
     *  Đăng ký người dùng mới.
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        if (User::where('EMAIL', $data['EMAIL'])->exists()) {
            return $this->error('Tài khoản với email này đã tồn tại.', 409);
        }

        $user = User::create([
            'FULLNAME' => $data['FULLNAME'],
            'EMAIL' => $data['EMAIL'],
            'USERNAME' => $data['EMAIL'],
            'PASSWORD' => Hash::make($data['PASSWORD']),
            'ROLE' => 'STUDENT',
        ]);

        return $this->success($user, 'Đăng ký tài khoản thành công.', [], 201);
    }


    /**
     *  Đăng nhập và trả về JWT token.
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!$token = $this->guard()->attempt($credentials)) {
            return $this->error('Sai email hoặc mật khẩu.', 401);
        }

        return $this->respondWithToken($token);
    }


    /**
     *  Đăng xuất (vô hiệu hóa token hiện tại).
     */
    public function logout()
    {
        $this->guard()->logout();

        return $this->success(null, 'Đăng xuất thành công.');
    }

    /**
     *  Làm mới token.
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     *  Tạo response chuẩn có JWT Token.
     */
    protected function respondWithToken($token)
    {
        return $this->success([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60,
            'user' => $this->guard()->user(),
        ], 'Đăng nhập thành công.');
    }
}
