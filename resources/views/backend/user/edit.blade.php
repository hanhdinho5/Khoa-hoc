@extends('backend.layouts.app')
@section('title', 'Edit User')

@push('styles')
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/pickadate/themes/default.date.css') }}">
@endpush

@section('content')

@section('content')

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Thêm người dùng</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">Người dùng</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Chỉnh sửa người dùng</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Thông tin cơ bản</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update', encryptor('encrypt', $user->id)) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{ encryptor('encrypt', $user->id) }}">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Tên</label>
                                            <input type="text" class="form-control" name="userName_en"
                                                value="{{ old('userName_en', $user->name_en) }}">
                                        </div>
                                        @if ($errors->has('userName_en'))
                                            <span class="text-danger"> {{ $errors->first('userName_en') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Số điện thoại</label>
                                            <input type="tel" class="form-control" name="contactNumber_en"
                                                value="{{ old('contactNumber_en', $user->contact_en) }}">
                                        </div>
                                        @if ($errors->has('contactNumber_en'))
                                            <span class="text-danger"> {{ $errors->first('contactNumber_en') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="emailAddress"
                                                value="{{ old('emailAddress', $user->email) }}">
                                        </div>
                                        @if ($errors->has('emailAddress'))
                                            <span class="text-danger"> {{ $errors->first('emailAddress') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Vai trò</label>
                                            <select class="form-control" name="roleId">
                                                @forelse ($role as $r)
                                                    @if ($r->identity != 'instructor' && $r->identity != 'student')
                                                        <option value="{{ $r->id }}"
                                                            {{ old('roleId', $user->role_id) == $r->id ? 'selected' : '' }}>
                                                            {{ $r->name }}</option>
                                                    @endif
                                                @empty
                                                    <option value="">Không tìm thấy vai trò</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        @if ($errors->has('roleId'))
                                            <span class="text-danger"> {{ $errors->first('roleId') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Truy cập đầy đủ</label>
                                            <select class="form-control" name="fullAccess">
                                                <option value="0" @if (old('fullAccess', $user->full_access) == 0) selected @endif>
                                                    Không</option>
                                                <option value="1" @if (old('fullAccess', $user->full_access) == 1) selected @endif>
                                                    Đúng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Trạng thái hoạt động</label>
                                            <select class="form-control" name="status">
                                                <option value="1" @if (old('status', $user->status) == 1) selected @endif>
                                                    Hoạt động</option>
                                                <option value="0" @if (old('status', $user->status) == 0) selected @endif>
                                                    Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label class="form-label">Hình ảnh (Để trống nếu không thay đổi)</label>
                                        <div class="form-group fallback w-100">
                                            <input type="file" class="dropify" data-default-file="" name="image">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Mật khẩu (Để trống nếu không thay đổi)</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="text-danger"> {{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary m">Cập nhật</button>
                                        <button type="button" class="btn btn-light"><a
                                                href="{{ route('user.index') }}">Quay lại</a></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <!-- pickdate -->
    <script src="{{ asset('vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('vendor/pickadate/picker.date.js') }}"></script>

    <!-- Pickdate -->
    <script src="{{ asset('js/plugins-init/pickadate-init.js') }}"></script>
@endpush
