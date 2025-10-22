<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth Facade
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Kiểm tra xem người dùng đã được xác thực (đăng nhập) chưa
        // 2. Nếu đã đăng nhập, kiểm tra xem vai trò của họ có phải là 'Quản trị viên' không
        if (Auth::check() && Auth::user()->ROLE === 'ADMIN') {
            // Nếu đúng, cho phép yêu cầu được tiếp tục
            return $next($request);
        }

        // Nếu không phải admin hoặc chưa đăng nhập, trả về lỗi 403 Forbidden
        return response()->json([
            'message' => 'Bạn không có quyền truy cập vào khu vực này.'
        ], 403);
    }
}
