<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
            return redirect()->route('logon');
        }

        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Kiểm tra vai trò của người dùng
        if ($user->role != 1) {
            // Nếu không phải admin, chuyển hướng về trang không có quyền truy cập
            return redirect()->route('logon'); // Thay 'home' bằng route của trang không có quyền truy cập
        }

        // Cho phép người dùng admin truy cập vào trang dashboard
        return $next($request);
    }
}
