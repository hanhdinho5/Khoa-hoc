<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ ENV('APP_NAME') }} | @yield('title', 'Watch Course')</title>
    <link rel="stylesheet" href="{{ asset('frontend/src/scss/vendors/plugin/css/video-js.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/src/scss/vendors/plugin/css/star-rating-svg.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/dist/main.css') }}" />
    <link rel="icon" type="image/png" href="{{ asset('frontend/dist/images/favicon/favicon.png') }}" />


    <link rel="stylesheet" href="{{ asset('frontend/fontawesome-free-5.15.4-web/css/all.min.css') }}">
    <style>
        .vjs-poster {
            width: 100%;
            background-size: cover;
        }

        .info-line {
            display: flex;
            align-items: flex-start;
            margin-bottom: 6px;
        }

        .info-label {
            width: 155px;
            /* tùy chỉnh để các label đều thẳng */
            font-weight: 500;
        }

        .info-content {
            flex: 1;
            position: relative;
        }

        .info-content i {
            position: absolute;
            right: 0;
            /* căn icon sang phải */
            top: 0;
        }
    </style>

</head>

<body style="background-color: #ebebf2;">

    <!-- Title Starts Here -->
    <header class="bg-transparent">
        <div class="container-fluid">
            <div class="coursedescription-header">
                <div class="coursedescription-header-start">
                    <a class="logo-image" href="{{ route('home') }}">
                        <img src="{{ asset('frontend/dist/images/logo/logo.png') }}" alt="Logo" />
                    </a>
                    <div style="margin-left:470px; padding: 17px 100px;"
                        class="alert alert-success d-flex justify-content-center align-items-center mt-3 shadow-sm"
                        role="alert">
                        <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                        <div>
                            <h5>
                                Bạn đã nộp bài thành công!</h5>
                        </div>
                    </div>
                </div>
                <div class="coursedescription-header-end">
                    <button class="button button--primary"> Kết quả làm bài
                    </button>
                </div>
            </div>
        </div>
    </header>
    <div class="container py-4">
        <h3 class="mb-2">{{ $studentTest->quiz->title }}</h3>
        <p>Điểm: <strong>{{ $studentTest->score }}</strong></p>
        <p>Số câu đúng: {{ $studentTest->correct_count }}/{{ $studentTest->total_questions }}</p>

        @foreach ($studentTest->studentAnswer as $index => $item)
            @php
                $check = strtoupper($item->selected_answer) == strtoupper($item->question->correct_answer);
            @endphp
            <div class="card mb-3 {{ $item->question->is_correct ? 'border-success' : 'border-danger' }}">
                <div class="card-header">
                    <strong>Câu {{ $index + 1 }}:</strong> {{ $item->question->content }}
                </div>
                <div class="card-body">
                    <div class="info-line">
                        <span class="info-label">Đáp án bạn chọn:</span>
                        <span class="info-content">
                            <strong
                                class="{{ $check ? 'text-success' : 'text-danger' }}">{{ strtoupper($item->selected_answer) }}</strong>
                            {{ $item->question->{'option_' . $item->selected_answer} }}
                            <i
                                class="fas {{ $check ? 'fa-check-circle text-success' : 'fa-times-circle text-danger' }}"></i>
                        </span>
                    </div>

                    <div class="info-line">
                        <span class="info-label">Đáp án đúng:</span>
                        <span class="info-content">
                            <strong class="text-success">{{ strtoupper($item->question->correct_answer) }}</strong>
                            {{ $item->question->{'option_' . $item->question->correct_answer} }}
                        </span>
                    </div>

                    <div class="info-line">
                        <span class="info-label">Giải thích:</span>
                        <span class="info-content">{{ $item->question->explain ?? 'Không có' }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>
