<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Derinos Group - Home</title>
    <meta name="description" content="Archix - Architecture and Interior Design HTML Template">
    <meta name="keywords"
        content="apartments, architect, architecture, building, clean, construction, creative, decoration, interior design, minimal, modern, portfolio, residence, studio">
    <meta name="author" content="Themexriver">
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" type="image/x-icon">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/video.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/twenty.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
</head>

<body class="archx-home">
    <div id="preloader"></div>
    <div class="up">
        <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
    </div>
    <!-- Start of Header section
 ============================================= -->
    <header id="archx-header" class="archx-header-section">
        <div class="container">
            <div class="header-top-content d-flex justify-content-between position-relative">
                <div class="header-top-cta ul-li">
                    <ul>
                        <li><img src="{{ asset('assets/media/logos/default-dark.png') }}" alt=""></li>
                        <li><i class="fal fa-envelope"></i> derinosgroup@gmail.com </li>
                    </ul>
                </div>
            </div>
            <div class="header-main-menu-wrapper d-flex justify-content-between align-items-center position-relative">
                <div class="archx-side-bar-menu-wrapper d-flex">
                    {{-- <div class="archx-side-bar-button navSidebar-button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div> --}}
                    <div class="archx-main-navigation-wrap">
                        <nav class="main-navigation clearfix ul-li">
                            <ul id="main-nav" class="nav navbar-nav clearfix">
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li><a href="#archx-facility">Facilities</a></li>
                                <li><a href="#archx-views">Beautiful Views</a></li>
                                <li><a href="#archx-project">Our Project</a></li>
                                <li><a href="#archx-social">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-cta-btn-wrapper d-flex align-items-center">
                    <div class="header-cta-number d-flex align-items-center text-uppercase">
                        <div class="header-cta-icon d-flex justify-content-center align-items-center">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="header-cta-value">
                            <span class="ar-title">Phone:</span>
                            <span class="ar-value">0821-9057-6421</span>
                        </div>
                    </div>
                </div>
                <div class="mobile_menu">
                    <div class="mobile_menu_button open_mobile_menu">
                        <i class="fal fa-bars"></i>
                    </div>
                    <div class="mobile_menu_wrap">
                        <div class="mobile_menu_overlay open_mobile_menu"></div>
                        <div class="mobile_menu_content">
                            <div class="mobile_menu_close open_mobile_menu">
                                <i class="fal fa-times"></i>
                            </div>
                            <div class="m-brand-logo">
                                <a href="!#"><img src="{{ asset('assets/media/logos/default-dark.png') }}"
                                        alt=""></a>
                            </div>
                            <nav class="mobile-main-navigation  clearfix ul-li">
                                <ul id="m-main-nav" class="nav navbar-nav clearfix">
                                    <li>
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li><a href="#archx-facility">Facilities</a></li>
                                    <li><a href="#archx-views">Beautiful Views</a></li>
                                    <li><a href="#archx-social">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Mobile-Menu -->
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header section
 ============================================= -->

    <!-- Start of Slider section
 ============================================= -->
    <section id="archx-slider" class="archx-slider-section position-relative"
        data-background="{{ asset('landing/img/slider-2/arrain1.png') }}">
        <span class="archx-slider-side1 position-absolute"><a href="#">derinosgroup@gmail.com</a></span>
        <div class="container">
            <div class="archx-slider-content position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="archx-slider-counter position-relative headline-2">
                            <div class="archx-slider-counter-text text-center">
                                <h2><span>We Build Your Home With Heart</span></h2>
                                {{-- <p>Projects Completed This Year.</p> --}}
                            </div>
                            <div class="ar-slider-shape-img position-absolute">
                                <img src="{{ asset('landing/img/bg/ar-ba.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="archx-slider-text headline-2 pera-content">
                            <h1 class="wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">Premium
                                Living, High-Quality Materials, Scandinavian Vibes, Strategies</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Slider section
 ============================================= -->

    <!-- Start of Feature section
 ============================================= -->
    {{-- <section id="archx-feature" class="archx-feature-section position-relative">
        <span class="archx-bg position-absolute"><img src="{{ asset('landing/img/bg/ar-bg1.png') }}"
                alt=""></span>
        <div class="container">
            <div class="archx-feature-content_2">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="archx-feature-img_2 position-relative  wow fadeInLeft" data-wow-delay="200ms"
                            data-wow-duration="1500ms">
                            <img src="{{ asset('landing/img/about/brosur-2.jpeg') }}" alt="">
                            {{-- <span class="archx-ft-shape position-absolute"><img
                                    src="{{ asset('landing/img/shape/ar-ft-sh.png') }}" alt=""></span>
                            <div class="award-wining-text position-absolute">
                                <span>20+</span> Award Winning Company
                            </div>
                            <div class="archx-experience-text text-center position-absolute pera-content">
                                25<sub>+</sub>
                                <p>years of
                                    experince</p>
                            </div> --}}
    {{-- </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="archx-feature-content-item_2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="archx-feature-item_2 position-relative  wow fadeInUp"
                                        data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <div class="archx-feature-icon position-relative">
                                            <img src="{{ asset('landing/icon/ar-ic1.png') }}" alt="">
                                        </div>
                                        <div class="archx-feature-text headline-2 pera-content">
                                            <h3>Reasonable Prices</h3>
                                            <p>We build and activate brands
                                                through cultural insight, str
                                                vision, and the power of </p>
                                            <a href="service-single.html">Know More <i
                                                    class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="archx-feature-item_2 position-relative wow fadeInUp"
                                        data-wow-delay="400ms" data-wow-duration="1500ms">
                                        <div class="archx-feature-icon position-relative">
                                            <img src="{{ asset('landing/icon/ar-ic2.png') }}" alt="">
                                        </div>
                                        <div class="archx-feature-text headline-2 pera-content">
                                            <h3>Exclusive Design </h3>
                                            <p>We build and activate brands
                                                through cultural insight, str
                                                vision, and the power of </p>
                                            <a href="service-single.html">Know More <i
                                                    class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="archx-feature-item_2 position-relative wow fadeInUp"
                                        data-wow-delay="600ms" data-wow-duration="1500ms">
                                        <div class="archx-feature-icon position-relative">
                                            <img src="{{ asset('landing/icon/ar-ic3.png') }}" alt="">
                                        </div>
                                        <div class="archx-feature-text headline-2 pera-content">
                                            <h3>Kitchen Design</h3>
                                            <p>We build and activate brands
                                                through cultural insight, str
                                                vision, and the power of </p>
                                            <a href="service-single.html">Know More <i
                                                    class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="archx-feature-cta-text wow fadeInUp" data-wow-delay="900ms"
                                data-wow-duration="1500ms">
                                Ready To <a href="https://wa.me/6282190576421">Get Started?</a> CALL 0821-9057-6421
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End of Feature section
 ============================================= -->

    <!-- Start of FAQ section
 ============================================= -->
    <section id="archx-facility" class="archx-faq-section position-relative">
        <span class="ar-bg position-absolute"><img src="{{ asset('landing/img/bg/ar-bg2.png') }}"
                alt=""></span>
        <div class="container">
            <div class="archx-faq-content">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="archx-section-title headline-2 wow fadeInUp" data-wow-delay="0ms"
                            data-wow-duration="1500ms">
                            <span class="title-serial">01</span>
                            <h2>Here, we present a modern environment that combines comfort, convenience, and a range of
                                comprehensive facilities to meet all your <span> Needs </span></h2>
                        </div>
                        <div class="archx-faq-content-wrapper">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item headline-2 pera-content wow fadeInUp" data-wow-delay="0ms"
                                    data-wow-duration="1500ms">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Business Area Facilities
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Supporting your business growth, equipped with comfortable office spaces and
                                            complete business amenities.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item headline-2 pera-content wow fadeInUp"
                                    data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Cafe and Minimarket
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Ready to fulfill your daily needs, making your shopping and dining
                                            experiences more practical and enjoyable.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item headline-2 pera-content wow fadeInUp"
                                    data-wow-delay="400ms" data-wow-duration="1500ms">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Place of Worship
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Provided to offer comfort and community in your religious activities.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item headline-2 pera-content wow fadeInUp"
                                    data-wow-delay="600ms" data-wow-duration="1500ms">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            Jogging Track
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Encircling the complex, allowing you to maintain physical health and fitness
                                            without leaving your residential environment.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item headline-2 pera-content wow fadeInUp"
                                    data-wow-delay="800ms" data-wow-duration="1500ms">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                            aria-expanded="false" aria-controls="collapseFive">
                                            Club House Area
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            As the center for social and recreational activities, where you can gather,
                                            interact, and enjoy leisure time with family and friends.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item headline-2 pera-content wow fadeInUp"
                                    data-wow-delay="1000ms" data-wow-duration="1500ms">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                            aria-expanded="false" aria-controls="collapseSix">
                                            Playgroup and kindergarten
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse"
                                        aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Providing a safe and comfortable environment for your child's education and
                                            development.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="archx-faq-img-wrap wow fadeInRight" data-wow-delay="200ms"
                            data-wow-duration="1500ms">
                            <img src="{{ asset('landing/img/about/brosur-2.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of FAQ section
 ============================================= -->

    <!-- Start of Project section
 ============================================= -->
    {{-- <section id="archx-project" class="archx-project-section">
        <div class="archx-project-content d-flex">
            <div class="archx-project-item position-relative">
                <div class="img-bg position-absolute">
                    <img src="{{ asset('landing/img/project/pro-bg.png') }}" alt="">
                </div>
                <div class="project-icon">
                    <img src="{{ asset('landing/icon/ar-pr2.png') }}" alt="">
                </div>
                <div class="project-text headline-2 pera-content">
                    <h3>Creative Design & Digital
                        Soulktion</h3>
                    <p>We build and activate brands through cultural insight
                        str vision, and the power of </p>
                    <a href="project-single.html">Know More <i class="fal fa-long-arrow-right"></i></a>
                </div>
                <div class="hover-item">
                    <div class="inner-img">
                        <img src="{{ asset('landing/img/project/ar-prt1.png') }}" alt="">
                    </div>
                    <div class="inner-text position-absolute">
                        <div class="inner-icon-serial d-flex align-items-center">
                            <div class="inner-icon">
                                <img src="{{ asset('landing/icon/ar-pr1.png') }}" alt="">
                            </div>
                            <div class="inner-serial">
                                01
                            </div>
                        </div>
                        <div class="inner-title headline-2">
                            <h3>Creative Design & Digital
                                Soulktion</h3>
                            <a href="project-single.html">Know More <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="archx-project-item position-relative">
                <div class="img-bg position-absolute">
                    <img src="{{ asset('landing/img/project/pro-bg.png') }}" alt="">
                </div>
                <div class="project-icon">
                    <img src="{{ asset('landing/icon/ar-pr2.png') }}" alt="">
                </div>
                <div class="project-text headline-2 pera-content">
                    <h3>Creative Design & Digital
                        Soulktion</h3>
                    <p>We build and activate brands through cultural insight
                        str vision, and the power of </p>
                    <a href="project-single.html">Know More <i class="fal fa-long-arrow-right"></i></a>
                </div>
                <div class="hover-item">
                    <div class="inner-img">
                        <img src="{{ asset('landing/img/project/ar-prt1.png') }}" alt="">
                    </div>
                    <div class="inner-text position-absolute">
                        <div class="inner-icon-serial d-flex align-items-center">
                            <div class="inner-icon">
                                <img src="{{ asset('landing/icon/ar-pr1.png') }}" alt="">
                            </div>
                            <div class="inner-serial">
                                02
                            </div>
                        </div>
                        <div class="inner-title headline-2">
                            <h3>Creative Design & Digital
                                Soulktion</h3>
                            <a href="project-single.html">Know More <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="archx-project-item position-relative">
                <div class="img-bg position-absolute">
                    <img src="{{ asset('landing/img/project/pro-bg.png') }}" alt="">
                </div>
                <div class="project-icon">
                    <img src="{{ asset('landing/icon/ar-pr2.png') }}" alt="">
                </div>
                <div class="project-text headline-2 pera-content">
                    <h3>Creative Design & Digital
                        Soulktion</h3>
                    <p>We build and activate brands through cultural insight
                        str vision, and the power of </p>
                    <a href="project-single.html">Know More <i class="fal fa-long-arrow-right"></i></a>
                </div>
                <div class="hover-item">
                    <div class="inner-img">
                        <img src="{{ asset('landing/img/project/ar-prt1.png') }}" alt="">
                    </div>
                    <div class="inner-text position-absolute">
                        <div class="inner-icon-serial d-flex align-items-center">
                            <div class="inner-icon">
                                <img src="{{ asset('landing/icon/ar-pr1.png') }}" alt="">
                            </div>
                            <div class="inner-serial">
                                03
                            </div>
                        </div>
                        <div class="inner-title headline-2">
                            <h3>Creative Design & Digital
                                Soulktion</h3>
                            <a href="project-single.html">Know More <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="archx-project-item position-relative">
                <div class="img-bg position-absolute">
                    <img src="{{ asset('landing/img/project/pro-bg.png') }}" alt="">
                </div>
                <div class="project-icon">
                    <img src="{{ asset('landing/icon/ar-pr2.png') }}" alt="">
                </div>
                <div class="project-text headline-2 pera-content">
                    <h3>Creative Design & Digital
                        Soulktion</h3>
                    <p>We build and activate brands through cultural insight
                        str vision, and the power of </p>
                    <a href="project-single.html">Know More <i class="fal fa-long-arrow-right"></i></a>
                </div>
                <div class="hover-item">
                    <div class="inner-img">
                        <img src="{{ asset('landing/img/project/ar-prt1.png') }}" alt="">
                    </div>
                    <div class="inner-text position-absolute">
                        <div class="inner-icon-serial d-flex align-items-center">
                            <div class="inner-icon">
                                <img src="{{ asset('landing/icon/ar-pr1.png') }}" alt="">
                            </div>
                            <div class="inner-serial">
                                04
                            </div>
                        </div>
                        <div class="inner-title headline-2">
                            <h3>Creative Design & Digital
                                Soulktion</h3>
                            <a href="project-single.html">Know More <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End of Project section
 ============================================= -->

    <!-- Start of Before After section
 ============================================= -->
    <section id="archx-views" class="archx-before-after-section position-relative"
        data-background="{{ asset('landing/img/bg/before-after-bg.png') }}">
        <span class="archx-before-after-shape position-absolute"><img src="{{ asset('landing/img/bg/ar-ba.png') }}"
                alt=""></span>
        <div class="container">
            <div class="archx-section-title text-center headline-2 wow fadeInUp" data-wow-delay="200ms"
                data-wow-duration="1500ms">
                <span class="title-serial">02</span>
                <h2>Capture the beauty from every angle with these stunning views</h2>
            </div>
            <div class="archx-before-after-content">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="archx-before-after-tab-btn position-relative ul-li-block">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="front-tab" data-bs-toggle="pill"
                                        data-bs-target="#front" type="button" role="tab" aria-controls="front"
                                        aria-selected="true">Front</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="right-front-tab" data-bs-toggle="pill"
                                        data-bs-target="#right-front" type="button" role="tab"
                                        aria-controls="right-front" aria-selected="false">Right Front</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="left-front-tab" data-bs-toggle="pill"
                                        data-bs-target="#left-front" type="button" role="tab"
                                        aria-controls="left-front" aria-selected="false">Left Front</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="rear-tab" data-bs-toggle="pill"
                                        data-bs-target="#rear" type="button" role="tab" aria-controls="rear"
                                        aria-selected="false">Rear</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="right-rear-tab" data-bs-toggle="pill"
                                        data-bs-target="#right-rear" type="button" role="tab"
                                        aria-controls="right-rear" aria-selected="false">Right Rear</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="left-rear-tab" data-bs-toggle="pill"
                                        data-bs-target="#left-rear" type="button" role="tab"
                                        aria-controls="left-rear" aria-selected="false">Left Rear</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="archx-before-after-img-wrapper">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="front" role="tabpanel"
                                    aria-labelledby="front-tab">
                                    <div style="width: 100%">
                                        <img src="{{ asset('landing/img/landing/img-5.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="right-front" role="tabpanel"
                                    aria-labelledby="right-front-tab">
                                    <div style="width: 100%">
                                        <img src="{{ asset('landing/img/landing/img-3.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="left-front" role="tabpanel"
                                    aria-labelledby="left-front-tab">
                                    <div style="width: 100%">
                                        <img src="{{ asset('landing/img/landing/img-4.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="rear" role="tabpanel"
                                    aria-labelledby="rear-tab">
                                    <div style="width: 100%">
                                        <img src="{{ asset('landing/img/landing/img-8.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="right-rear" role="tabpanel"
                                    aria-labelledby="right-rear-tab">
                                    <div style="width: 100%">
                                        <img src="{{ asset('landing/img/landing/img-6.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="left-rear" role="tabpanel"
                                    aria-labelledby="left-rear-tab">
                                    <div style="width: 100%">
                                        <img src="{{ asset('landing/img/landing/img-7.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Before After section
 ============================================= -->

    <!-- Start of Service section
 ============================================= -->
    {{-- <section id="archx-service" class="archx-service-section">
        <div class="container">
            <div class="archx-service-content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="archx-service-text-area">
                            <div class="archx-section-title headline-2 wow fadeInUp" data-wow-delay="200ms"
                                data-wow-duration="1500ms">
                                <span class="title-serial">04</span>
                                <h2>We Think Working Process
                                    may <span>increase</span> mindset
                                </h2>
                            </div>
                            <div class="archx-service-list-wraper ul-li-block wow fadeInUp" data-wow-delay="400ms"
                                data-wow-duration="1500ms">
                                <ul>
                                    <li>More accurate match between press and proof</li>
                                    <li>Similar visual appearance across all print processes</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="archx-service-item-content">
                            <div class="row">
                                <div class="col-md-4 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="archx-service-item">
                                        <span class="bg-img text-center position-absolute"><img
                                                src="{{ asset('landing/img/about/ar-sr1.png') }}"
                                                alt=""></span>
                                        <div class="service-serial">
                                            01
                                        </div>
                                        <div class="service-title-text headline-2 pera-content">
                                            <h3><a href="#">Visiting at home</a></h3>
                                            <p>We build and activate br
                                                through cultural insight</p>
                                            <a class="more-btn" href="service-single.html"><i
                                                    class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                                    <div class="archx-service-item active">
                                        <span class="bg-img text-center position-absolute"><img
                                                src="{{ asset('landing/img/about/ar-sr1.png') }}"
                                                alt=""></span>
                                        <div class="service-serial">
                                            02
                                        </div>
                                        <div class="service-title-text headline-2 pera-content">
                                            <h3><a href="#">Visiting at home</a></h3>
                                            <p>We build and activate br
                                                through cultural insight</p>
                                            <a class="more-btn" href="service-single.html"><i
                                                    class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                    <div class="archx-service-item">
                                        <span class="bg-img text-center position-absolute"><img
                                                src="{{ asset('landing/img/about/ar-sr1.png') }}"
                                                alt=""></span>
                                        <div class="service-serial">
                                            03
                                        </div>
                                        <div class="service-title-text headline-2 pera-content">
                                            <h3><a href="#">Visiting at home</a></h3>
                                            <p>We build and activate br
                                                through cultural insight</p>
                                            <a class="more-btn" href="service-single.html"><i
                                                    class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End of Service section
 ============================================= -->

    <!-- Start of  About Section
 ============================================= -->
    {{-- <section id="archx-about" class="archx-about-section position-relative">
        <div class="container">
            <div class="archx-about-content">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="archx-about-text-content">
                            <div class="archx-section-title headline-2 wow fadeInUp" data-wow-delay="200ms"
                                data-wow-duration="1500ms">
                                <h2>Making sure you have all the
                                    <span>services</span> you need your new project.
                                </h2>
                            </div>
                            <div class="archx-about-sub-text headline-2 pera-content wow fadeInUp"
                                data-wow-delay="400ms" data-wow-duration="1500ms">
                                <h3>A Dedicated Master Degree Qualified Interior Designer</h3>
                                <p>The other hand we denounce with righteou indg ation and dislike men who
                                    demorali ed by the of pleasure of the moment.Dislike men who are so </p>
                            </div>
                            <div class="archx-about-feature-list ul-li-block wow fadeInUp" data-wow-delay="600ms"
                                data-wow-duration="1500ms">
                                <ul>
                                    <li>Technical Lighting Structure / Plan Fixed & Free Standing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="archx-about-sponsor-scroller">
                            <div class="archx-about-sponsor-wrapper">
                                <div class="archx-sponsor-item">
                                    <img src="{{ asset('landing/img/sponsor/ar-sp1.png') }}" alt="">
                                </div>
                                <div class="archx-sponsor-item">
                                    <img src="{{ asset('landing/img/sponsor/ar-sp2.png') }}" alt="">
                                </div>
                                <div class="archx-sponsor-item">
                                    <img src="{{ asset('landing/img/sponsor/ar-sp1.png') }}" alt="">
                                </div>
                                <div class="archx-sponsor-item">
                                    <img src="{{ asset('landing/img/sponsor/ar-sp2.png') }}" alt="">
                                </div>
                                <div class="archx-sponsor-item">
                                    <img src="{{ asset('landing/img/sponsor/ar-sp1.png') }}" alt="">
                                </div>
                                <div class="archx-sponsor-item">
                                    <img src="{{ asset('landing/img/sponsor/ar-sp2.png') }}" alt="">
                                </div>
                            </div>
                            <div class="archx-about-experience-scoller d-flex">
                                <div class="archx-about-experience text-center headline-2 pera-content d-flex align-items-center justify-content-center wow fadeLeft"
                                    data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="archx-about-exp-text">
                                        <h3>
                                            25<sub>+</sub>
                                        </h3>
                                        <p>Include Service
                                            Features</p>
                                    </div>
                                </div>
                                <div class="archx-about-scroller-wrapper wow fadeInRight" data-wow-delay="400ms"
                                    data-wow-duration="1500ms">
                                    <div class="archx-about-scroller-content">
                                        <div class="archx-about-scroller-item headline-2 pera-content">
                                            <h3>A Dedicated Master Degree Qualified Interior Designer</h3>
                                            <p>The other hand we denounce with righteou indg ation and dislike men who
                                                demorali ed by the of pleasure of the moment.Dislike men who are so </p>
                                        </div>
                                        <div class="archx-about-scroller-item headline-2 pera-content">
                                            <h3>A Dedicated Master Degree Qualified Interior Designer</h3>
                                            <p>The other hand we denounce with righteou indg ation and dislike men who
                                                demorali ed by the of pleasure of the moment.Dislike men who are so </p>
                                        </div>
                                        <div class="archx-about-scroller-item headline-2 pera-content">
                                            <h3>A Dedicated Master Degree Qualified Interior Designer</h3>
                                            <p>The other hand we denounce with righteou indg ation and dislike men who
                                                demorali ed by the of pleasure of the moment.Dislike men who are so </p>
                                        </div>
                                        <div class="archx-about-scroller-item headline-2 pera-content">
                                            <h3>A Dedicated Master Degree Qualified Interior Designer</h3>
                                            <p>The other hand we denounce with righteou indg ation and dislike men who
                                                demorali ed by the of pleasure of the moment.Dislike men who are so </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End of About section
 ============================================= -->

    <!-- Start of  Project Section
 ============================================= -->
    <section id="archx-project" class="archx-project-section-2"
        data-background="{{ asset('landing/img/bg/ar-pro-bg.png') }}">
        <div class="container">
            <div class="archx-project-top-content d-flex justify-content-between align-items-center">
                <div class="archx-section-title headline-2">
                    <h2>See Our <span> Project</span>
                    </h2>
                </div>
                <div class="archx-section-title headline-2">
                    <span class="title-serial">03</span>
                </div>
            </div>
        </div>
        <div style="width: 100%; padding: 30px">
            <img src="{{ asset('landing/img/landing/Dalam Kiri - Dalam Kanan.png') }}" alt="">
        </div>
    </section>
    <!-- End of  Project Section
 ============================================= -->

    <!-- Start of  Map Section
 ============================================= -->
    <section id="archx-map" class="archx-map-section position-relative">
        <div class="archx-map-wrap">
            <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6752.029590056817!2d119.41927486513835!3d-5.222721669054716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee1047a23ed7d%3A0x5197cb6296318c51!2sArrain%20Residence%202!5e0!3m2!1sid!2sid!4v1693763754138!5m2!1sid!2sid"
                width="100%" height="470"></iframe>
        </div>
        <div class="container">
            <div class="archx-map-info">
                <div class="archx-map-contact-info headline-2 pera-content">
                    <div class="archx-map-info-item">
                        <div class="info-title d-flex align-items-center">
                            <span><i class="fas fa-address-book"></i></span>
                            <h3>Our Address</h3>
                        </div>
                        <div class="info-text">
                            Ruko Zamrud Blok F9
                        </div>
                    </div>
                    <div class="archx-map-info-item">
                        <div class="info-title d-flex align-items-center">
                            <span><i class="fas fa-address-book"></i></span>
                            <h3>Contact Way</h3>
                        </div>
                        <div class="info-text ul-li-block">
                            <ul>
                                <li><i class="fas fa-comments"></i>derinosgroup@gmail.com</li>
                                <li><i class="fas fa-phone-alt"></i>0821-9057-6421</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of  Map Section
 ============================================= -->

    <!-- Start of  Social Section
 ============================================= -->
    <section id="archx-social" class="archx-social-section">
        <div class="archx-social-content d-flex align-items-center">
            <div class="archx-social-item">
                <a href="https://www.facebook.com/profile.php?id=100083718036253&mibextid=2JQ9oc">
                    <i class="fab fa-facebook-f"></i>
                    <span>Facebook</span>
                </a>
            </div>
            <div class="archx-social-item">
                <a href="https://www.instagram.com/derinosgroup/">
                    <i class="fab fa-instagram"></i>
                    <span>Instagram</span>
                </a>
            </div>
        </div>
    </section>
    <!-- End of  Social Section
 ============================================= -->

    <!-- Start of  Footer Section
 ============================================= -->
    <footer id="archx-footer" class="archx-footer-section position-relative"
        data-background="{{ asset('landing/img/bg/ar-ft-bg.png') }}">
        <span class="archx-footer-mail position-absolute">derinosgroup@gmail.com</span>
        <span class="archx-footer-address  position-absolute">Level 13, 2 <b>Elizabeth St</b>, Melbourne</span>
        <div class="container">
            <div class="archx-footer-content">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="archx-footer-widget headline-2">
                            <div class="logo-widget">
                                <div class="brand-logo">
                                    <a href="#"><img src="{{ asset('assets/media/logos/default-dark.png') }}"
                                            alt=""></a>
                                </div>
                                <div class="logo-text">
                                    Our complex not only offers modern and comfortable living spaces but also a solid
                                    and harmonious community. Start your new lifestyle here, in an environment that
                                    prioritizes practicality, comfort, and an active social life
                                </div>
                                <div class="logo-cta-info ul-li-block">
                                    <ul>
                                        <li><i class="fal fa-map-marker-alt"></i> Ruko Zamrud Blok F9</li>
                                        <li><i class="fas fa-phone-alt"></i> 0821-9057-6421</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="archx-footer-widget headline-2">
                            <div class="menu-widget ul-li-block">
                                <h3 class="widget-title">Marketplace</h3>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Nami Land Barombong</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="archx-footer-widget headline-2">
                            <div class="menu-widget ul-li-block">
                                <h3 class="widget-title">My Account</h3>
                                <ul>
                                    <li><a href="#">Derinos Group</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="archx-footer-widget headline-2">
                            <div class="award-widget">
                                <h3 class="widget-title">Our Information</h3>
                                <div class="total-award d-flex align-items-center">
                                    <span class="aw-title">Ruko Zamrud Blok F9
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="archx-footer-copyright d-flex justify-content-between align-items-center">
                <div class="archx-footer-copyright-text">
                    Copyright © <a href="#"> 2024 </a> by Data Cipta Celebes. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- End of  Footer Section
 ============================================= -->


    <!-- For Js Library -->
    <script src="{{ asset('landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing/js/appear.js') }}"></script>
    <script src="{{ asset('landing/js/slick.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('landing/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('landing/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/js/twenty.js') }}"></script>
    <script src="{{ asset('landing/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.inputarrow.js') }}"></script>
    <script src="{{ asset('landing/js/script.js') }}"></script>

</body>

</html>
