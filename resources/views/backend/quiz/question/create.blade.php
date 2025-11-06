@extends('backend.layouts.app')
@section('title', 'Thêm câu hỏi')

@push('styles')
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/pickadate/themes/default.date.css') }}">
@endpush

@section('content')

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Thêm câu hỏi</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><a
                                href="{{ route('quiz.question.index', encryptor('encrypt', $quiz->id)) }}">Danh sách câu
                                hỏi</a>
                        </li>
                        <li class="breadcrumb-item active"><a
                                href="{{ route('quiz.question.create', encryptor('encrypt', $quiz->id)) }}">Thêm câu hỏi</a>
                        </li>
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
                            <form action="{{ route('quiz.question.store', encryptor('encrypt', $quiz->id)) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Bài kiểm tra</label>
                                            <select class="form-control" disabled name="quizId">
                                                <option value="">{{ $quiz->title }}</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Loại câu hỏi</label>
                                            <select class="form-control" disabled name="questionType_display">
                                                <option value="multiple_choice" selected>Trắc nghiệm</option>
                                            </select>

                                            <!-- input hidden để gửi giá trị thật khi submit -->
                                            <input type="hidden" name="questionType" value="multiple_choice">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Nội dung câu hỏi</label>
                                            <textarea class="form-control" name="questionContent">{{ old('questionContent') }}</textarea>
                                        </div>
                                        @if ($errors->has('questionContent'))
                                            <span class="text-danger"> {{ $errors->first('questionContent') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Đáp án A</label>
                                            <input type="text" class="form-control" name="optionA"
                                                value="{{ old('optionA') }}">
                                        </div>
                                        @if ($errors->has('optionA'))
                                            <span class="text-danger"> {{ $errors->first('optionA') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Đáp án B</label>
                                            <input type="text" class="form-control" name="optionB"
                                                value="{{ old('optionB') }}">
                                        </div>
                                        @if ($errors->has('optionB'))
                                            <span class="text-danger"> {{ $errors->first('optionB') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Đáp án C</label>
                                            <input type="text" class="form-control" name="optionC"
                                                value="{{ old('optionC') }}">
                                        </div>
                                        @if ($errors->has('optionC'))
                                            <span class="text-danger"> {{ $errors->first('optionC') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Đáp án D</label>
                                            <input type="text" class="form-control" name="optionD"
                                                value="{{ old('optionD') }}">
                                        </div>
                                        @if ($errors->has('optionD'))
                                            <span class="text-danger"> {{ $errors->first('optionD') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Đáp án đúng</label>
                                            <select class="form-control" name="correctAnswer">
                                                <option value="a" @if (old('correctAnswer') == 'a') selected @endif>
                                                    Đáp án A</option>
                                                <option value="b" @if (old('correctAnswer') == 'b') selected @endif>
                                                    Đáp án B</option>
                                                <option value="c" @if (old('correctAnswer') == 'c') selected @endif>
                                                    Đáp án C</option>
                                                <option value="d" @if (old('correctAnswer') == 'd') selected @endif>
                                                    Đáp án D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Giải thích đáp án đúng</label>
                                            <textarea class="form-control" name="explain"></textarea>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary mr-3">Lưu</button>
                                        <button type="button" class="btn btn-light"><a
                                                href="{{ route('quiz.question.index', encryptor('encrypt', $quiz->id)) }}">Quay
                                                lại</a></button>
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
