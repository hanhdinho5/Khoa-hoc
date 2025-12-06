@extends('frontend.layouts.app')
@section('title', 'Giới thiệu')
@section('header-attr') class="nav-shadow" @endsection

@section('content')
    <!-- Breadcrumb Starts Here -->
    <div class="py-0">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html" class="fs-6 text-secondary">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="about.html" class="fs-6 text-secondary">Giới thiệu</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Ends Here -->

    <!-- About Intro Starts Here -->
    <section class="about-intro section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 position-relative mt-4 mt-lg-0" style="z-index: 0;">
                    <div class="about-intro__img-wrapper">
                        <img src="{{ asset('frontend/dist/images/about/intro.jpg') }}" alt="Intro Image"
                            class="img-fluid rounded-2 ms-lg-5 position-relative intro-image" />
                    </div>
                    <div class="intro-shape">
                        <img src="{{ asset('frontend/dist/images/shape/rec04.png') }}" alt="Shape"
                            class="img-fluid shape-01" />
                        <img src="{{ asset('frontend/dist/images/shape/dots/dots-img-09.png') }}" alt="Shape"
                            class="img-fluid shape-02" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-intro__textContent">
                        <h2 class="font-title--md mb-3">Một nơi tuyệt vời để phát triển.</h2>
                        <p class="mt-2 mt-lg-1 mb-2 mb-lg-4 text-secondary">
                            Chúng tôi tạo ra môi trường học tập hiệu quả, nơi mỗi cá nhân đều được phát triển tối đa khả
                            năng của mình. Các phương pháp giảng dạy được thiết kế khoa học, giúp học viên tiếp thu kiến
                            thức một cách tự nhiên và linh hoạt. Chúng tôi cam kết mang đến trải nghiệm học tập thú vị và
                            chất lượng.
                        </p>
                        <p class="text-secondary">
                            Chúng tôi tin vào việc tạo ra môi trường học tập thân thiện và hỗ trợ. Mỗi phương pháp giảng dạy
                            đều được thiết kế để học viên cảm thấy thoải mái, phát triển kỹ năng và kiến thức một cách hiệu
                            quả.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Intro Ends Here -->

    <!-- About Feature Starts Here -->
    <section class="section aboutFeature pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-feature dark-feature">
                        <h5 class="text-white font-title--sm">Chúng tôi là ai?</h5>
                        <p class="text-lowblack">
                            Chúng tôi luôn khuyến khích sự sáng tạo và tiềm năng của mỗi cá nhân. Mỗi chương trình và dự án
                            đều được thiết kế để mang lại trải nghiệm học tập linh hoạt, thú vị và hiệu quả. Đội ngũ của
                            chúng tôi luôn đồng hành để hỗ trợ học viên đạt được mục tiêu của mình.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="about-feature">
                        <h5 class="font-title--sm">Sứ mệnh của chúng tôi</h5>
                        <p class="text-secondary">
                            Chúng tôi cam kết cung cấp các giải pháp giáo dục chất lượng cao, giúp học viên phát triển kỹ
                            năng một cách toàn diện. Mỗi chương trình được thiết kế linh hoạt, phù hợp với nhu cầu và mục
                            tiêu của từng cá nhân. Đội ngũ giảng viên giàu kinh nghiệm luôn đồng hành để đảm bảo hiệu quả
                            học tập tối ưu.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Feature Ends Here -->

    <!-- Brands Starts Here -->
    <section class="section overflow-hidden brands pb-lg-0">
        <div class="bg-secondary py-80">
            <div class="container">
                <div class="row mb-40">
                    <div class="col-lg-6 mx-auto text-center">
                        <div class="brands__titleContent">
                            <h5 class="mb-2 dark-text font-title--sm">
                                Hơn 30.000+ trường học & cao đẳng đang học cùng chúng tôi.
                            </h5>
                            <p class="font-para--lg">
                                Chúng tôi tạo ra các chương trình học tập hiệu quả, linh hoạt và dễ tiếp cận, giúp học viên
                                phát triển kỹ năng một cách tự nhiên và bền vững.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-area">
                            <div class="brand-area-image">
                                <img src="{{ asset('frontend/dist/images/versity/1.png') }}" alt="Brand"
                                    class="img-fluid" />
                            </div>
                            <div class="brand-area-image">
                                <img src="{{ asset('frontend/dist/images/versity/2.png') }}" alt="Brand"
                                    class="img-fluid" />
                            </div>
                            <div class="brand-area-image">
                                <img src="{{ asset('frontend/dist/images/versity/3.png') }}" alt="Brand"
                                    class="img-fluid" />
                            </div>
                            <div class="brand-area-image">
                                <img src="{{ asset('frontend/dist/images/versity/4.png') }}" alt="Brand"
                                    class="img-fluid" />
                            </div>
                            <div class="brand-area-image">
                                <img src="{{ asset('frontend/dist/images/versity/2.png') }}" alt="Brand"
                                    class="img-fluid" />
                            </div>
                            <div class="brand-area-image">
                                <img src="{{ asset('frontend/dist/images/versity/5.png') }}" alt="Brand"
                                    class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brands Ends Here -->

    <!-- Best Instructors Starts Here -->
    <section class="section best-instructor-featured overflow-hidden main-instructor-featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative">
                    <h2 class="text-center mb-40 font-title--md">Gặp gỡ những giảng viên xuất sắc nhất</h2>
                    <div class="ourinstructor__wrapper mt-lg-5 mt-0">
                        <div class="ourinstructor-active">
                            <div class="mentor">
                                <div class="mentor__img">
                                    <img src="{{ asset('frontend/dist/images/instructor/03.jpg') }}" alt="Mentor image" />

                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-youtube"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                                <div class="mentor__title">
                                    <h6><a href="instructor-profile.html" tabindex="0">Nguyễn Văn An</a></h6>
                                    <p>Giảng viên Adobe</p>
                                </div>
                            </div>

                            <div class="mentor">
                                <div class="mentor__img">
                                    <img src="{{ asset('frontend/dist/images/instructor/02.jpg') }}"
                                        alt="Mentor image" />

                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-youtube"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                                <div class="mentor__title">
                                    <h6><a href="instructor-profile.html" tabindex="0">Trần Thị Bích</a></h6>
                                    <p>Giảng viên Adobe</p>
                                </div>
                            </div>

                            <div class="mentor">
                                <div class="mentor__img">
                                    <img src="{{ asset('frontend/dist/images/instructor/3.jpg') }}" alt="Mentor image" />

                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-youtube"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                                <div class="mentor__title">
                                    <h6><a href="instructor-profile.html" tabindex="0">Lê Minh Tuấn</a></h6>
                                    <p>Giảng viên Adobe</p>
                                </div>
                            </div>

                            <div class="mentor">
                                <div class="mentor__img">
                                    <img src="{{ asset('frontend/dist/images/instructor/04.jpg') }}"
                                        alt="Mentor image" />

                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-youtube"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                                <div class="mentor__title">
                                    <h6><a href="instructor-profile.html" tabindex="0">Phạm Thị Hồng</a></h6>
                                    <p>Giảng viên Adobe</p>
                                </div>
                            </div>

                            <div class="mentor">
                                <div class="mentor__img">
                                    <img src="{{ asset('frontend/dist/images/instructor/1.png') }}" alt="Mentor image" />

                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-youtube"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                                <div class="mentor__title">
                                    <h6><a href="instructor-profile.html" tabindex="0">Ngô Văn Khải</a></h6>
                                    <p>Giảng viên Adobe</p>
                                </div>
                            </div>

                            <div class="mentor">
                                <div class="mentor__img">
                                    <img src="{{ asset('frontend/dist/images/instructor/2.png') }}" alt="Mentor image" />

                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-youtube"></i></a></li>
                                        <li class="list-inline-item"><a href="#" tabindex="0"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                                <div class="mentor__title">
                                    <h6><a href="instructor-profile.html" tabindex="0">Trương Thị Lan</a></h6>
                                    <p>Giảng viên Adobe</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="main-instructor-featured-shape">
            <img src="{{ asset('frontend/dist/images/shape/dots/dots-img-14.png') }}" alt="shape"
                class="img-fluid shape01" />
            <img src="{{ asset('frontend/dist/images/shape/triangel2.png') }}" alt="shape"
                class="img-fluid shape02" />
        </div>
    </section>
@endsection

@push('scripts')
@endpush
