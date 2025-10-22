<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Nếu request mong muốn nhận JSON (ví dụ: một API call)
        // thì trả về null. Laravel sẽ tự động ném ra một
        // AuthenticationException, sau đó được render thành
        // một response JSON 401 Unauthorized.
        if ($request->expectsJson()) {
            return null;
        }

        // Nếu là request web thông thường, chuyển hướng đến route 'login'
        return route('login');
    }
}
