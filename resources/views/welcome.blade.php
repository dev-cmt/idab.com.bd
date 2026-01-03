@extends('frontend.layouts.app')
@section('content')
    <!-- ======= Content Section ======= -->
    <main id="main">
        <!-- ======= Feature Section ======= -->
        <section id="feature" class="feature">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <!--<div class="col-3">-->
                    <!--    <div class="icon-box animate__animated animate__slideInLeft">-->
                    <!--        <i class="bi bi-people-fill"></i>-->
                    <!--        <h4>The Association</h4>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <a href="https://idab.com.bd/pages/why-be-member" class="col-md-3 mx-2 text-center">
                        <div class="icon-box animate__animated animate__slideInLeft">
                            <!--<i class="bi bi-person-badge"></i>-->
                            <h4>Why be a Member</h4>
                        </div>
                    </a>
                    <a href="https://idab.com.bd/pages/requirements" class="col-md-3 mx-2 text-center">
                        <div class="icon-box animate__animated animate__slideInRight">
                            <!--<i class="bi bi-award-fill"></i>-->
                            <h4>Types of Membership</h4>
                        </div>
                    </a>
                    <!--<div class="col-3">-->
                    <!--    <div class="icon-box animate__animated animate__slideInRight">-->
                    <!--        <i class="bi bi-wechat"></i>-->
                    <!--        <h4>Social</h4>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section>
        <!-- End Feature -->
        
        <!-- ================= CUSTOM CSS ================= -->
        <style>
            /* ===== TITLE ===== */
            .newsletter-title h1 {
                font-size: 42px;
                font-weight: 700;
                line-height: 1.3;
            }

            .newsletter-title span {
                color: #e30613;
            }

            .newsletter-title p {
                font-size: 16px;
                color: #444;
                margin-top: 8px;
            }

            /* ===== FIXED HEIGHT RESPONSIVE SLIDER ===== */
            .newsletter-slider,
            .newsletter-slider .owl-stage-outer,
            .newsletter-slider .owl-stage,
            .newsletter-slider .owl-item {
                height: 480px;
            }

            .newsletter-slider .item,
            .newsletter-slider .slide-img {
                height: 480px;
                width: 100%;
                overflow: hidden;
            }

            .newsletter-slider .slide-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }

            @media (max-width: 991px) {
                .newsletter-slider,
                .newsletter-slider .owl-stage-outer,
                .newsletter-slider .owl-stage,
                .newsletter-slider .owl-item,
                .newsletter-slider .item,
                .newsletter-slider .slide-img {
                    height: 360px;
                }
            }

            @media (max-width: 576px) {
                .newsletter-slider,
                .newsletter-slider .owl-stage-outer,
                .newsletter-slider .owl-stage,
                .newsletter-slider .owl-item,
                .newsletter-slider .item,
                .newsletter-slider .slide-img {
                    height: 280px;
                }
            }

            /* ===== RIGHT BOXES ===== */
            .news-box {
                height: 240px;
                padding: 30px;
                color: #fff;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .news-red {
                background: #e30613;
            }

            .news-black {
                background: #000;
            }

            .news-box h5 {
                font-weight: 600;
            }

            .news-box p {
                font-size: 14px;
                margin-top: 10px;
            }

            .news-box a {
                color: #fff;
                font-size: 22px;
                text-decoration: none;
            }

            /* ===== OWL NAV (BOOTSTRAP ICONS) ===== */
            .newsletter-section .owl-nav {
                position: absolute;
                bottom: 30px;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 14px;
            }

            .newsletter-section .owl-nav button {
                width: 42px;
                height: 42px;
                background: #e30613 !important;
                border-radius: 50%;
                color: #fff !important;
                font-size: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .newsletter-section .owl-nav button:hover {
                background: #c00010 !important;
            }

            /* DOTS */
            .newsletter-section .owl-dots {
                position: absolute;
                bottom: 32px;
                left: 25px;
            }

            .newsletter-section .owl-dot span {
                background: #ccc !important;
            }

            .newsletter-section .owl-dot.active span {
                background: #e30613 !important;
            }
        </style>

        <!-- ================= NEWSLETTER SECTION ================= -->
        <section class="newsletter-section py-5">
            <div class="container">

                <!-- Title -->
                <div class="newsletter-title mb-4">
                    <h1>The Institute of <span>Architects</span> Bangladesh</h1>
                    <p>is a professional organization for architects in Bangladesh</p>
                </div>

                <div class="row g-0">

                    <!-- SLIDER -->
                    <div class="col-lg-9 position-relative">
                        <div class="owl-carousel newsletter-slider">
                            @foreach ($blog_post as $item)
                                <div class="item">
                                    <div class="slide-img">
                                        <img src="{{ asset('public/'.$item->image_path) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- RIGHT BOXES -->
                    <div class="col-lg-3">
                        <div class="news-box news-red">
                            <div>
                                <h5>Competition / Awards</h5>
                                <p>Open Architectural Design Competition for the Design of Ten Storied...</p>
                            </div>
                            <a href="#"><i class="bi bi-arrow-right"></i></a>
                        </div>

                        <div class="news-box news-black">
                            <div>
                                <h5>Seminar / Workshop</h5>
                                <p>বার্ষিক সদস্যপদ পরীক্ষা সংক্রান্ত বিজ্ঞপ্তি</p>
                            </div>
                            <a href="#"><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ================= END NEWSLETTER SECTION ================= -->




        <!-- ======= About Section ======= -->
         <!--<section id="about" class="about">
            <div class="container">
                <div class="row no-gutters">
                    <div class="image animate__animated animate__fadeInDown col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" style="background: url({{asset('public/images')}}/pages/about.jpg) center center no-repeat;">

                    </div>
                    <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
                        <div class="content d-flex flex-column justify-content-center">
                            <h3>Interior Designer’s Association Of Bangladesh (IDAB)</h3>
                            <p>IDAB (Interior designer’s Association Of Bangladesh) founded in 2019 with some young and energetic Bangladeshi Interior Designers to represent the Interior designers & interior design industry as a whole of Bangladesh.</p>
                            <div class="row">
                                <div class="col-md-6 icon-box">
                                    <i class="bx bx-receipt"></i>
                                    <h4 class="">Corporis voluptates sit</h4>
                                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                                        aliquip</p>
                                </div>
                                <div class="col-md-6 icon-box">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Ullamco laboris nisi</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt</p>
                                </div>
                                <div class="col-md-6 icon-box">
                                    <i class="bx bx-images"></i>
                                    <h4>Labore consequatur</h4>
                                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                                    </p>
                                </div>
                                <div class="col-md-6 icon-box">
                                    <i class="bx bx-shield"></i>
                                    <h4>Beatae veritatis</h4>
                                    <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>--><!-- 75End .content--><!-- End About Section -->
        
        @if (count($event) > 0)
        <!-- ======= Upcoming Events Section======= -->
        <section id="events" class="events animate__animated animate__fadeInUp">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">UPCOMING EVENTS</h2>
                </div>
                
                
                <div id="owl-upcoming-events" class="owl-carousel">
                    @foreach ($event as $item)
                    <!--<a href="{{route('page.events-details', $item->id)}}">-->
                    <a href="https://idabaward.com">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{asset('public/images')}}/events/{{ $item->image }}" class="img-fluid p-2" alt="">
                        </div>
                    </a>
                    @endforeach
                </div>
                
                <div class="d-flex justify-content-center">
                    <!--<a href="{{Route('page.events')}}" class="btn btn-danger px-4" style="background:#EF1620;">More Events</a>-->
                    <a href="https://idabaward.com" class="btn btn-danger px-4" style="background:#EF1620;">More Events</a>
                </div>

            </div>
             
        </section><!-- End Upcoming Events Section -->
        @endif

        <!-- ======= Services Section ======= -->
        {{-- <section id="services" class="services animate__animated animate__fadeInUp">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">How IDAB Benefit You</h2>
                    <!--<p class="reveal">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>-->
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-briefcase"></i></div>
                        <h4 class="title"><a href="">Professional Guidance</a></h4>
                        <p class="description">We offer legal helplines, specialist guides, and peer-to-peer mentoring for our members.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        <h4 class="title"><a href="">Institute Status</a></h4>
                        <p class="description">The use of our member logo is a symbol of credibility, authority, and professionalism</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-bar-chart"></i></div>
                        <h4 class="title"><a href="">Continuous Development Support</a></h4>
                        <p class="description">Our members have access to a program of ongoing education and development related to interior design.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-binoculars"></i></div>
                        <h4 class="title"><a href="">Speaking Opportunities</a></h4>
                        <p class="description">We frequently place our members as speakers at high-profile industry events and as experts in interior design articles.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box">
                        <div class="icon"><i class="bi bi-calendar4-week"></i></div>
                        <h4 class="title"><a href="">Networking Events</a></h4>
                        <p class="description">Our busy events calendar provides members with regular opportunities to network with fellow industry professionals</p>
                    </div>
                    <!--<div class="col-lg-4 col-md-6 icon-box">-->
                    <!--    <div class="icon"><i class="bi bi-brightness-high"></i></div>-->
                    <!--    <h4 class="title"><a href="">Eiusmod Tempor</a></h4>-->
                    <!--    <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero-->
                    <!--        tempore, cumsoluta nobis est eligendi</p>-->
                    <!--</div>-->
                </div>

            </div>
        </section><!-- End Services Section --> --}}

        <!-- ======= Why Us Section ======= -->
       <!-- End Why Us Section -->
        
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts section-bg">
            <div class="container">

                <div class="row no-gutters">
                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch animate__animated animate__slideInUp">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{count($user)}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Our Member</strong></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch animate__animated animate__slideInUp">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{count($event)}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Events</strong></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch animate__animated animate__slideInUp">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <!--<span data-purecounter-start="0" data-purecounter-end="{{count($contact)}}" data-purecounter-duration="1"
                                class="purecounter"></span>--> <span>90</span>
                            <p><strong>Community Support</strong></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch animate__animated animate__slideInUp">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                           <!--<span data-purecounter-start="0" data-purecounter-end="{{count($executive)}}" data-purecounter-duration="1"
                                class="purecounter"></span>--><span>11</span>
                            <p><strong>Executive Members</strong></p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Team Section ======= 
        @if (count($add_hoc) > 0)
        <section id="team" class="team">
            <div class="container">

                <div class="section-title">
                    <h2 class="reveal">Ad Hoc Committee</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div id="owl-team-member" class="owl-carousel">
                    @foreach ($add_hoc as $item)
                    <div class="member" style="height:260px">
                        <img src="{{asset('public/images')}}/profile/{{$item->profile_photo_path}}" class="img-fluid" alt="" style="height: 100%">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>{{$item->name}}</h4>
                                <span>Chief Executive Officer</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>
        @endif--><!-- End Team Section -->
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section class="faq section-bg">
        <div class="container">

            <div class="section-title">
                <!--<h2 class="reveal">Frequently Asked Questions</h2>-->
            </div>

            <div class="row">
                <div class="col-lg-3 nav nav-pills" style="height: 380px;width: 254px;overflow: hidden;">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                        <i class="bi bi-card-text me-3"></i>Professional member
                    </button>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                        <i class="bi bi-card-text me-3"></i>Candidate member
                    </button>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                        <i class="bi bi-card-text me-3"></i>Student member
                    </button>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                        <i class="bi bi-card-text me-3"></i>Associate member
                    </button>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                        <i class="bi bi-card-text me-3"></i>Trade member
                    </button>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane fade" id="tab-pane-1">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-1.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-8">
                                    <!--<h4 class="mb-4"><i class="bi bi-amd text-danger"></i> First 100 Member 50% Discount</h4>-->
                                    <h3 class="mb-4">Student Member</h3>
                                    <h5 class="mb-4">Eligibility for Student membership</h5>
                                    <p>•	Must be Student of Bachelor of Architect, Interior Design, Diploma Architect from any reputed university, Govt polytechnic or IDAB recognized institute.</p>
                                    <h5>Documents</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>Last Educational certificate</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Student ID copy (both side)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Passport size picture with white background.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Relevant head of department’s acknowledgment letter.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>NID copy</p></p>
                                    <p><i class="bi bi-check-lg me-3"></i>500/-</p></p>
                                    <a href="{{route('page.requirements_student')}}" class="btn btn-info btn-sm">Read More</a>
                                </div>
                               
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-2.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-8">
                                    <h3 class="mb-4">Candidate Member</h3>
                                     <h5 class="mb-4">Eligibility for Candidate membership</h5>
                                    <p>•	Must be an Architect, Interior Design, Diploma Architect from any reputed university, Govt polytechnic or IDAB recognized institute.</p>
                                    <h5>Documents</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>Last Educational certificate (Architect, Interior design, Diploma architect)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Passport size picture with white background.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Trade license/ Job Certificate</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated TIN paper</p>
                                    <p><i class="bi bi-check-lg me-3"></i>NID</p>
                                    <p><i class="bi bi-check-lg me-3"></i>2000/-</p>
                                    <a href="{{route('page.requirements_details')}}" class="btn btn-info btn-sm">Read More</a>
                                </div>
              
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="tab-pane-3">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-3.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-8">
                                    <h3 class="mb-4">Professional Member</h3>
                                       <h5 class="mb-4">Eligibility for Professional membership</h5>
                                    <p>•	Must be an Architect, Interior Design, Diploma Architect from any reputed university, Govt polytechnic or IDAB recognized institute with 5 years’ experience</p>
                                    <h5>Documents</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>Last Educational certificate (Architect, Interior design, Diploma architect)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Passport size picture with white background.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Trade license/ Job Certificate with 5 years’ experience.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated TIN paper</p>
                                    <p><i class="bi bi-check-lg me-3"></i>NID</p>
                                    <p><i class="bi bi-check-lg me-3"></i>2000/-</p>
                                    <a href="{{route('page.requirements_details')}}" class="btn btn-info btn-sm">Read More</a>
                                </div>
                              
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-4.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-8">
                                    <h3 class="mb-4">Associate Member</h3>
                                    <h5 class="mb-4">Eligibility for Associate membership</h5>
                                    <p>•	The candidate must be a graduate of a reputed university</p>
                                    <p>•	Doing Interior design Business last 5 years</p>
                                    <h5>Documents</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>Last Educational certificate (Any Discipline)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Passport size picture with white background.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated Trade License as Interior design Company</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated TIN paper</p>
                                    <p><i class="bi bi-check-lg me-3"></i>NID</p>
                                    <p><i class="bi bi-check-lg me-3"></i>3000/-</p>
                                    <a href="{{route('page.requirements_details')}}" class="btn btn-info btn-sm">Read More</a>
                                </div>
                             
                            </div>
                        </div>
                            <div class="tab-pane fade" id="tab-pane-5">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-5.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-8">
                                    <h3 class="mb-4">Trade Member</h3>
                                    <h5 class="mb-4">Eligibility for Trade membership</h5>
                                    <p>•	The candidate must be a graduate of a reputed university</p>
                                    <p>•	Must do business as Importer, shop owner, trader on Interior design materials</p>
                                    <h5>Documents</h5>
                                    <p><i class="bi bi-check-lg me-3"></i>Last Educational certificate (Any Discipline)</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Passport size picture with white background.</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated Trade License</p>
                                    <p><i class="bi bi-check-lg me-3"></i>Updated TIN paper</p>
                                    <p><i class="bi bi-check-lg me-3"></i>NID</p>
                                    <p><i class="bi bi-check-lg me-3"></i>15000/-</p>
                                    <a href="{{route('page.requirements_details')}}" class="btn btn-info btn-sm">Read More</a>
                                </div>
                             
                            </div>
                        </div>
                            <div class="tab-pane fade" id="tab-pane-6">
                            <div class="row g-4">
                                <!--<div class="col-md-6">-->
                                <!--    <div class="position-relative h-100">-->
                                <!--        <img class="position-absolute rounded w-100 h-100" src="{{asset('public/images')}}/pages/service-6.jpg" style="object-fit: cover;" alt="">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-6">
                                    <h3 class="mb-4">Corporate Partner</h3>
                                    <p><i class="bi bi-check-lg me-3"></i>1.Assiciated in Industrial Business</p>
                                    <p><i class="bi bi-check-lg me-3"></i>2.Passport Size Picture</p>
                                    <p><i class="bi bi-check-lg me-3"></i>3.Job Experience Certificate </p>
                                    <p><i class="bi bi-check-lg me-3"></i>4.Valid Trade License</p>
                                    <p><i class="bi bi-check-lg me-3"></i>5.Valid Tin Certificate</p>
                                    <p><i class="bi bi-check-lg me-3"></i>6.NID</p>
                                    <p><i class="bi bi-check-lg me-3"></i>7.00/-</p>
                                    <a href="#" class="button">Read More</a>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->
        <!--======= Recognized Section ======= -->
        <section id="clients" class="clients mt-5 animate__animated animate__fadeInUp">
            <div class="container">
                 <div class="section-title">
                    <h2>Recognized University/Institute/Design School</h2>
                </div>

                <div id="owl-clients" class="owl-carousel">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/aiub.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/aust.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/brac.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/bsmrstu.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/bu.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/buet.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/cuet.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/diu.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/duet.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/hstu.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/ku.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/kuet.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/mist.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/nsu.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/pu.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/pust.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/ruet.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/sust.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/uap.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('public/images')}}/university/uct.jpg" class="img-fluid" alt="">
                    </div>
                   
                  </div>

            </div>
        </section><!-- End Recognized Section 
        
         <!--======= Clients Section ======= -->
        <section id="clients" class="clients section-bg mt-6 animate__animated animate__fadeInUp">
            <div class="container">
                 <div class="section-title">
                    <h2>Corporate Partners</h2>
                </div>

                <div id="owl-partners" class="owl-carousel">
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="https://www.mykitchen-bd.com"><img src="{{asset('public/images')}}/clients/mykitchen.jpg" class="img-fluid" alt=""></a>
                    </div>
                  </div>

            </div>
        </section><!-- End Clients Section 

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact animate__animated animate__fadeInUp">
            <div class="container">
                <div class="section-title">
                    <h2 class="reveal">Contact</h2>
                </div>
                <div class="row contact-info">
                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <address> Rain Razzak Plaza,2 Shahid Tazuddin Soroni, Moghbazar, Dhaka-1217, Bangladesh</address>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="bi bi-phone"></i>
                            <h3>Phone Number</h3>
                            <p><a href="tel:+8801806428222">+880 1806 428 222</a></p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:contact.idab@gmail.com">contact.idab@gmail.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form">
                    <form action="{{route('contact-us.store')}}" method="post" enctype="multipart/form-data" class="php-email-form"> 
                        @csrf                        
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" @guest value="{{ old('name')}}" @endguest @auth value="{{Auth::user()->name}}" @endauth  placeholder="Your Name" style="height: 55px;">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" @guest value="{{old('email')}}" @endguest @auth value="{{Auth::user()->email}}" @endauth placeholder="Your Email" style="height: 55px;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{old('subject')}}" placeholder="Subject" style="height: 55px;">
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control py-3 @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" rows="4" placeholder="Message"></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="my-3">
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- Modal -->
    <div class="modal fade" id="homePageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute;z-index: 999;right: 0;"></button>
                <div class="modal-body">
                    <img src="{{asset('public/images')}}/pages/model.jpg" class="img-fluid"/>
                </div>
            </div>
        </div>
    </div>

    
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your message was sent successfully.',
            })
        </script>
    @endif


@endsection

@section('script')
    <!-- ================= OWL INIT ================= -->
    <script>
        $('.newsletter-slider').owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4000,
            navText: [
                '<i class="bi bi-chevron-left"></i>',
                '<i class="bi bi-chevron-right"></i>'
            ]
        });
    </script>

@endsection

