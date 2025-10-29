@extends('frontend.layouts.app')
@section('title', 'Register-success')
@section('body-attr') style="background-color: #ebebf2;" @endsection

@section('content')

    <!-- Breadcrumb Starts Here -->
    <div class="py-0">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="fs-6 text-secondary">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="checkout.html" class="fs-6 text-secondary">Đăng ký</a></li>
                    <li class="breadcrumb-item active"><a href="#" class="fs-6 text-secondary">Đăng ký thành
                            công</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <section>
        <div class="container">
            @if (request()->session()->get('studentLogin'))

                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center my-5">
                        <div class="card border-0 shadow-lg p-5 rounded-4"
                            style="background: linear-gradient(135deg, #f9fafc, #eef2f7);">
                            <div class="mb-4">
                                <img src="{{ asset('images/register-success.png') }}" alt="Success illustration"
                                    class="img-fluid" style="max-width: 240px;">
                            </div>
                            <h2 class="fw-bold text-success mb-3">
                                🎉 Chúc mừng bạn đã đăng ký khoá học thành công!
                            </h2>
                            <p class="fs-5 text-secondary mb-4">
                                Cảm ơn bạn đã đăng ký khóa học.
                                Vui lòng <strong>kiểm tra email</strong> để nhận hướng dẫn thanh toán và biết thêm chi tiết.
                            </p>
                            <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                                Quay lại trang chủ
                            </a>
                            <div class="mt-4">
                                <small class="text-muted">
                                    Nếu bạn không nhận được email, hãy kiểm tra hộp thư <strong>Spam / Quảng cáo</strong>.
                                </small>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <!-- SignIn Area Starts Here -->
                <section class="section signin overflow-hidden">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 offset-xl-3 order-2 order-xl-0">
                                <div class="signup-area-textwrapper">
                                    <h2 class="font-title--md mb-0">Đăng nhập trước khi thanh toán</h2>
                                    <p class="mt-2 mb-lg-4 mb-3">Bạn chưa có tài khoản?
                                        <a href="#" onclick="hide_signin()" class="text-black-50">Đăng ký</a>
                                    </p>
                                    <form action="{{ route('studentLogin.check', 'checkout') }}" method="POST">
                                        @csrf
                                        <div class="form-element">
                                            <label for="email">Email</label>
                                            <input type="email" placeholder="Username" id="email" name="email" />
                                            @if ($errors->has('email'))
                                                <small class="d-block text-danger">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                        <div class="form-element">
                                            <div class="d-flex justify-content-between">
                                                <label for="password">Password</label>
                                                <a href="forget-password.html" class="text-primary fs-6">Forget Password</a>
                                            </div>
                                            <div class="form-alert-input">
                                                <input type="password" placeholder="Type here..." id="password"
                                                    name="password" />
                                                <div class="form-alert-icon" onclick="showPassword('password',this);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <small
                                                        class="d-block text-danger">{{ $errors->first('password') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-element">
                                            <button type="submit" class="button button-lg button--primary w-100">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- SignIn Area Ends Here -->

                <!-- SignUp Area Starts Here -->
                <section class="signup" style="display:none">
                    <div class="container">
                        <div class="row align-items-center justify-content-md-center">
                            <div class="col-lg-5 order-2 order-lg-0">
                                <div class="signup-area-textwrapper">
                                    <h2 class="font-title--md mb-0">Đăng ký trước khi thanh toán</h2>
                                    <p class="mt-2 mb-lg-4 mb-3">Bạn đã có tài khoản?<a href="#"
                                            onclick="hide_signin()" class="text-black-50">Đăng nhập</a></p>
                                    <form action="{{ route('studentRegister.store', 'checkout') }}" method="POST">
                                        @csrf
                                        <div class="form-element">
                                            <label for="name">Họ tên</label>
                                            <input type="text" placeholder="Enter Your Name" id="name"
                                                value="{{ old('name') }}" name="name" />
                                            @if ($errors->has('name'))
                                                <small class="d-block text-danger">{{ $errors->first('name') }}</small>
                                            @endif
                                        </div>
                                        <div class="form-element">
                                            <label for="email">Email</label>
                                            <input type="email" placeholder="example@email.com" id="email"
                                                value="{{ old('email') }}" name="email" />
                                            @if ($errors->has('email'))
                                                <small class="d-block text-danger">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                        <div class="form-element">
                                            <label for="password" class="w-100" style="text-align: left;">Mật
                                                khẩu</label>
                                            <div class="form-alert-input">
                                                <input type="password" placeholder="Type here..." id="password"
                                                    name="password" />
                                                <div class="form-alert-icon" onclick="showPassword('password',this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <small
                                                        class="d-block text-danger">{{ $errors->first('password') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-element">
                                            <label for="password_confirmation" class="w-100"
                                                style="text-align: left;">Xác nhận mật khẩu</label>
                                            <div class="form-alert-input">
                                                <input type="password" placeholder="Type here..."
                                                    name="password_confirmation" id="password_confirmation" />
                                                <div class="form-alert-icon"
                                                    onclick="showPassword('password_confirmation',this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-element d-flex align-items-center terms">
                                            <input class="checkbox-primary me-1" type="checkbox" id="agree" />
                                            <label for="agree" class="text-secondary mb-0">Chấp nhận <a href="#"
                                                    style="text-decoration: underline;">Điều khoản</a> và <a
                                                    href="#" style="text-decoration: underline;">Chính sách bảo
                                                    mật</a></label>
                                        </div>
                                        <div class="form-element">
                                            <button type="submit" class="button button-lg button--primary w-100">Đăng
                                                ký</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-7 order-1 order-lg-0">
                                <div class="signup-area-image">
                                    <img src="{{ asset('frontend/dist/images/signup/Illustration.png') }}"
                                        alt="Illustration Image" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- SignUp Area Ends Here -->

            @endif
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const card = document.querySelector('.card');
            card.style.opacity = 0;
            card.style.transform = 'translateY(30px)';
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease';
                card.style.opacity = 1;
                card.style.transform = 'translateY(0)';
            }, 200);
        });
    </script>

@endsection
