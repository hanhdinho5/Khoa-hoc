<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Http\Requests\Authentication\SignUpRequest;
use App\Http\Requests\Authentication\SignInRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthenticationController extends Controller
{
    public function signUpForm()
    {
        return view('backend.Authentication.register');
    }

    public function signUpStore(SignUpRequest $request)
    {
        try {
            $user = new User;
            $user->name_en = $request->name;
            $user->contact_en = $request->contact_en;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = 3;
            // dd($request->all());
            if ($user->save())
                return redirect('login')->with('success', 'Tạo tài khoản thành công');
            else
                return redirect('login')->with('danger', 'Vui lòng thử lại');
        } catch (Exception $e) {
            dd($e);
            return redirect('login')->with('danger', 'Vui lòng thử lại');
        }
    }

    public function signInForm()
    {
        return view('backend.Authentication.login');
    }

    public function signInCheck(SignInRequest $request)
    {
        try {
            $user = User::where('contact_en', $request->username)->orWhere('email', $request->username)->first();
            if ($user) {
                if ($user->status == 1) {
                    if (Hash::check($request->password, $user->password)) {
                        // Xoá toàn bộ session cũ, nếu đang đăng nhập với học viên
                        session()->flush();
                        // Lưu thông tin vào session
                        $this->setSession($user);
                        // dd(request()->session());
                        return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công!');
                    } else
                        return redirect()->route('login')->with('error', 'Tên người dùng hoặc mật khẩu không đúng!');
                } else
                    return redirect()->route('login')->with('error', 'Bạn không phải là người dùng đang hoạt động! Vui lòng liên hệ với Cơ quan quản lý');
            } else
                return redirect()->route('login')->with('error', 'Tên người dùng hoặc mật khẩu không đúng!');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->route('login')->with('error', 'Tên người dùng hoặc mật khẩu không đúng!');
        }
    }

    public function setSession($user)
    {
        return request()->session()->put(
            [
                'userId' => encryptor('encrypt', $user->id),
                'userName' => encryptor('encrypt', $user->name_en),
                'emailAddress' => encryptor('encrypt', $user->email),
                'role_id' => encryptor('encrypt', $user->role_id),
                'accessType' => encryptor('encrypt', $user->full_access),
                'role' => encryptor('encrypt', $user->role?->name),
                'roleIdentitiy' => encryptor('encrypt', $user->role?->identity),
                'image' => $user->image ?? null,
                'instructorImage' => $user?->instructor->image ?? 'Không thấy người hướng dẫn',
            ]
        );
    }

    public function signOut()
    {
        request()->session()->flush();
        return redirect('login')->with('danger', 'Đã đăng xuất');
    }

    public function show(User $data)
    {
        return view('backend.user.userProfile', compact('data'));
    }
}
