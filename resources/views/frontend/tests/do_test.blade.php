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

    <!-- Title Starts Here -->
    <header class="bg-transparent">
        <div class="container-fluid">
            <div class="coursedescription-header">
                <div class="coursedescription-header-start">
                    <a class="logo-image" href="{{ route('home') }}">
                        <img src="{{ asset('frontend/dist/images/logo/logo.png') }}" alt="Logo" />
                    </a>
                    <div class="topic-info">
                        <div class="topic-info-arrow">
                            Lưu ý: Không thoát ra ngoài khi đang làm bài
                        </div>

                    </div>
                </div>
                <div class="coursedescription-header-end">


                    <button class="button button--primary"> {{ $quiz->title }}
                    </button>
                </div>
            </div>
        </div>
    </header>
    <div class="container py-4">
        <h2 class="mb-3">{{ $quiz->name }}</h2>
        <p>Thời gian làm bài: <strong id="timer">{{ $quiz->test_time }}</strong> phút</p>
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
