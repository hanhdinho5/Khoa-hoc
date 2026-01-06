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
    </style>

</head>

<body style="background-color: #ebebf2;">

    <style>
        .quiz-header {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            padding: 16px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .quiz-header__inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .quiz-logo img {
            height: 42px;
        }

        .quiz-info {
            flex: 1;
            text-align: center;
            color: #fff;
        }

        .quiz-title {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .quiz-warning {
            margin-top: 6px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 14px;
        }

        .quiz-warning i {
            color: #fde047;
        }

        .quiz-status {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 14px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.4);
                opacity: 0.6;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
    <!-- Title Starts Here -->
    <header class="quiz-header">
        <div class="container">
            <div class="quiz-header__inner">

                <!-- Logo -->
                <a class="quiz-logo" href="{{ route('home') }}">
                    <img src="{{ asset('frontend/dist/images/logo/logo.png') }}" alt="Logo">
                </a>

                <!-- Quiz info -->
                <div class="quiz-info">
                    <h4 class="quiz-title">{{ $quiz->title }}</h4>
                    <div class="quiz-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Không thoát ra ngoài khi đang làm bài</span>
                    </div>
                </div>

                <!-- Status -->
                <div class="quiz-status">
                    <span class="status-dot"></span>
                    <span>Đang làm bài</span>
                </div>

            </div>
        </div>
    </header>

    <div class="container py-4">
        <h2 class="mb-3">{{ $quiz->name }}</h2>
        <p class="mb-3">Thời gian làm bài: <strong id="timer">{{ $quiz->test_time }}</strong> phút</p>
        <form action="{{ route('test.submit', $quiz->id) }}" method="POST" id="quizForm">
            @csrf
            <input type="hidden" name="student_test_id" value="{{ $studentTest->id }}">
            @foreach ($quiz->questions as $index => $q)
                <div class="card mb-3">
                    <div class="card-header">
                        <strong>Câu {{ $index + 1 }}:</strong> {{ $q->content }}
                    </div>
                    <div class="card-body">
                        @foreach (['a', 'b', 'c', 'd'] as $opt)
                            @php $optText = $q->{'option_'.$opt}; @endphp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $q->id }}]"
                                    value="{{ $opt }}" id="q{{ $q->id }}{{ $opt }}">
                                <label class="form-check-label" for="q{{ $q->id }}{{ $opt }}">
                                    {{ strtoupper($opt) }}. {{ $optText }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>

    <script>
        // Đồng hồ đếm ngược
        let time = {{ $quiz->test_time * 60 }};
        const timerEl = document.getElementById('timer');
        const form = document.getElementById('quizForm');

        const timer = setInterval(() => {
            let m = Math.floor(time / 60);
            let s = time % 60;
            timerEl.textContent = `${m}:${s.toString().padStart(2, '0')}`;
            time--;
            if (time < 0) {
                clearInterval(timer);
                form.submit();
            }
        }, 1000);
    </script>






</body>

</html>
