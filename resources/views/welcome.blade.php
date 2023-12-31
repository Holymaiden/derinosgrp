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
                        <li><i class="fal fa-map-marker-alt"></i> 734 H, Bryan Burlington, NC 27215 </li>
                        <li><i class="fal fa-envelope"></i> hello@support.com </li>
                    </ul>
                </div>
                <div class="header-language-select-social d-flex">
                    <div class="header-social ul-li">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-main-menu-wrapper d-flex justify-content-between align-items-center position-relative">
                <div class="archx-side-bar-menu-wrapper d-flex">
                    <div class="archx-side-bar-button navSidebar-button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="archx-main-navigation-wrap">
                        <nav class="main-navigation clearfix ul-li">
                            <ul id="main-nav" class="nav navbar-nav clearfix">
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li><a href="#archx-feature">Feature</a></li>
                                <li><a href="#archx-faq">FAQ</a></li>
                                <li><a href="#archx-project">Project</a></li>
                                <li><a href="#archx-map">Map</a></li>
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
                            <span class="ar-value">88 1900 6789 56</span>
                        </div>
                    </div>
                    <div class="header-cta-btn">
                        <a class="d-flex justify-content-center align-items-center" href="{{ route('login') }}">Get
                            Quate Now <i class="fal fa-long-arrow-right"></i></a>
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
                                    <li><a href="#archx-feature">Feature</a></li>
                                    <li><a href="#archx-faq">FAQ</a></li>
                                    <li><a href="#archx-project">Project</a></li>
                                    <li><a href="#archx-map">Map</a></li>
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
    <!-- Sidebar sidebar Item -->
    <div class="xs-sidebar-group info-group">
        <div class="xs-overlay xs-bg-black">
            <div class="row loader-area">
                <div class="col-3 preloader-wrap">
                    <div class="loader-bg"></div>
                </div>
                <div class="col-3 preloader-wrap">
                    <div class="loader-bg"></div>
                </div>
                <div class="col-3 preloader-wrap">
                    <div class="loader-bg"></div>
                </div>
                <div class="col-3 preloader-wrap">
                    <div class="loader-bg"></div>
                </div>
            </div>
        </div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading">
                    <a href="#" class="close-side-widget">
                        X
                    </a>
                </div>
                <div class="sidebar-textwidget">

                    <!-- Sidebar Info Content -->
                    <div class="sidebar-info-contents headline pera-content">
                        <div class="content-inner">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('assets/media/logos/default-dark.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="content-box">
                                <h5>About Us</h5>
                                <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Reprehenderit, necessitatibus maxime harum facere ab minima eum cum. Nemo voluptate
                                    temporibus placeat recusandae excepturi explicabo ipsum quas vero saepe! Officiis,
                                    sit.</p>
                            </div>
                            <div class="gallery-box ul-li">
                                <h5>Gallery</h5>
                                <ul>
                                    <li>
                                        <a href="#"><img src="{{ asset('landing/img/gallery/01.png') }}"
                                                alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('landing/img/gallery/02.png') }}"
                                                alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('landing/img/gallery/03.png') }}"
                                                alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('landing/img/gallery/04.png') }}"
                                                alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('landing/img/gallery/05.png') }}"
                                                alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('landing/img/gallery/06.png') }}"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Social Box -->
                            <div class="content-box">
                                <h5>Social Account</h5>
                                <ul class="social-box">
                                    <li><a href="https://www.facebook.com/" class="fab fa-facebook-f"></a></li>
                                    <li><a href="https://www.twitter.com/" class="fab fa-twitter"></a></li>
                                    <li><a href="https://dribbble.com/" class="fab fa-dribbble"></a></li>
                                    <li><a href="https://www.linkedin.com/" class="fab fa-linkedin"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header section
 ============================================= -->

    <!-- Start of Slider section
 ============================================= -->
    <section id="archx-slider" class="archx-slider-section position-relative"
        data-background="{{ asset('landing/img/slider-2/arrain1.png') }}">
        <span class="archx-slider-side1 position-absolute"><a href="#">Contact@gmail.com</a></span>
        <div class="archx-slider-side2 position-absolute ul-li">
            <ul>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="archx-slider-content position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="archx-slider-counter position-relative headline-2">
                            <div class="archx-slider-counter-text text-center">
                                <h2><span class="counter">471</span></h2>
                                <p>Projects Completed This Year.</p>
                            </div>
                            <div class="ar-slider-shape-img position-absolute">
                                <img src="{{ asset('landing/img/bg/ar-ba.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="archx-slider-text headline-2 pera-content">
                            <div class="slider-slug  wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                Lorem ipsum dolor sit amet.</div>
                            <h1 class="wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">Lorem ipsum
                                dolor sit amet.</h1>
                            <p class=" wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit. Proin tempor.</p>
                            <div class="archx-video-play-btn d-flex align-items-center  wow fadeInUp"
                                data-wow-delay="800ms" data-wow-duration="1500ms">
                                <div class="archx-slider-btn">
                                    <a class="d-flex justify-content-center align-items-center" href="#">Get
                                        quate now <i class="fal fa-long-arrow-right"></i></a>
                                </div>
                                <div class="archx-video-play-btn">
                                    <a class="d-flex align-items-center video_box justify-content-center"
                                        href="https://www.youtube.com/watch?v=OB_Ok4dZ-dg"><i
                                            class="fas fa-play"></i></a>
                                </div>
                            </div>
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
    <section id="archx-feature" class="archx-feature-section position-relative">
        <span class="archx-bg position-absolute"><img src="{{ asset('landing/img/bg/ar-bg1.png') }}"
                alt=""></span>
        <div class="container">
            <div class="archx-feature-content_2">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="archx-feature-img_2 position-relative  wow fadeInLeft" data-wow-delay="200ms"
                            data-wow-duration="1500ms">
                            <img src="{{ asset('landing/img/about/brosur.png') }}" alt="">
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
                        </div>
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
                                Ready To <a href="contact.html">Get Started?</a> CALL +44(0) 203 808 51
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Feature section
 ============================================= -->

    <!-- Start of FAQ section
 ============================================= -->
    <section id="archx-faq" class="archx-faq-section position-relative">
        <span class="ar-bg position-absolute"><img src="{{ asset('landing/img/bg/ar-bg2.png') }}"
                alt=""></span>
        <div class="container">
            <div class="archx-faq-content">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="archx-section-title headline-2 wow fadeInUp" data-wow-delay="0ms"
                            data-wow-duration="1500ms">
                            <span class="title-serial">01</span>
                            <h2>Need To Know About Company Reading some answer & Sees <span> Question </span></h2>
                        </div>
                        <div class="archx-faq-content-wrapper">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item headline-2 pera-content wow fadeInUp" data-wow-delay="0ms"
                                    data-wow-duration="1500ms">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga labore
                                            incidunt doloremque iste commodi quo unde quis alias eius et harum aperiam
                                            voluptates iusto a neque nobis, esse nemo mollitia.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item headline-2 pera-content wow fadeInUp"
                                    data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta architecto
                                            perferendis quae quia libero laboriosam a autem vitae ipsum ratione
                                            provident veritatis illum, consectetur, exercitationem voluptas quidem?
                                            Illo, quaerat repudiandae?
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item headline-2 pera-content wow fadeInUp"
                                    data-wow-delay="400ms" data-wow-duration="1500ms">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores eveniet
                                            illum qui accusamus sit ratione voluptatibus, dolor velit repellat harum
                                            inventore, exercitationem ipsum! A inventore error modi architecto labore
                                            quam.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="archx-faq-img-wrap wow fadeInRight" data-wow-delay="200ms"
                            data-wow-duration="1500ms">
                            <img src="{{ asset('landing/img/about/ar-faq.png') }}" alt="">
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
    <section id="archx-project" class="archx-project-section">
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
    </section>
    <!-- End of Project section
 ============================================= -->

    <!-- Start of Before After section
 ============================================= -->
    <section id="archx-before-after" class="archx-before-after-section position-relative"
        data-background="{{ asset('landing/img/bg/before-after-bg.png') }}">
        <span class="archx-before-after-shape position-absolute"><img src="{{ asset('landing/img/bg/ar-ba.png') }}"
                alt=""></span>
        <div class="container">
            <div class="archx-section-title text-center headline-2 wow fadeInUp" data-wow-delay="200ms"
                data-wow-duration="1500ms">
                <span class="title-serial">03</span>
                <h2>See the comparison of service
                    <span>before</span> & <span>after</span> working
                </h2>
            </div>
            <div class="archx-before-after-content">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="archx-before-after-tab-btn position-relative ul-li-block">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Theater</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Architecture</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Designing</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="interior-tab" data-bs-toggle="pill"
                                        data-bs-target="#interior" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Interior</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="construction-tab" data-bs-toggle="pill"
                                        data-bs-target="#construction" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Construction</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="archx-before-after-img-wrapper">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="twentytwenty-container beforeafter-wrap">
                                        <div class="arck-before-item before-after-item position-relative">
                                            <img src="{{ asset('landing/img/about/ba1.jpg') }}" alt="">
                                        </div>
                                        <div class="arck-after-item before-after-item position-relative">
                                            <img src="{{ asset('landing/img/about/ba2.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="twentytwenty-container beforeafter-wrap">
                                        <div class="arck-before-item before-after-item position-relative">
                                            <img src="{{ asset('landing/img/about/ba1.jpg') }}" alt="">
                                        </div>
                                        <div class="arck-after-item before-after-item position-relative">
                                            <img src="{{ asset('landing/img/about/ba2.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="twentytwenty-container beforeafter-wrap">
                                        <div class="arck-before-item before-after-item position-relative">
                                            <img src="{{ asset('landing/img/about/ba1.jpg') }}" alt="">
                                        </div>
                                        <div class="arck-after-item before-after-item position-relative">
                                            <img src="{{ asset('landing/img/about/ba2.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="interior" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="twentytwenty-container beforeafter-wrap">
                                        <div class="arck-before-item before-after-item position-relative">
                                            <img src="{{ asset('landing/img/about/ba1.jpg') }}" alt="">
                                        </div>
                                        <div class="arck-after-item before-after-item position-relative">
                                            <img src="{{ asset('landing/img/about/ba2.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="construction" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="twentytwenty-container beforeafter-wrap">
                                        <div class="arck-before-item before-after-item position-relative">
                                            <img src="{{ asset('landing/img/about/ba1.jpg') }}" alt="">
                                        </div>
                                        <div class="arck-after-item before-after-item position-relative">
                                            <img src="{{ asset('landing/img/about/ba2.jpg') }}" alt="">
                                        </div>
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
    <section id="archx-service" class="archx-service-section">
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
    </section>
    <!-- End of Service section
 ============================================= -->

    <!-- Start of  About Section
 ============================================= -->
    <section id="archx-about" class="archx-about-section position-relative">
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
    </section>
    <!-- End of About section
 ============================================= -->

    <!-- Start of  Project Section
 ============================================= -->
    <section id="archx-project-2" class="archx-project-section-2"
        data-background="{{ asset('landing/img/bg/ar-pro-bg.png') }}">
        <div class="container">
            <div class="archx-project-top-content d-flex justify-content-between align-items-center">
                <div class="archx-section-title headline-2">
                    <h2>See <span> Projects </span> History Of honourable World
                    </h2>
                </div>
                <div class="archx-section-title headline-2">
                    <span class="title-serial">06</span>
                </div>
                <div class="carousel_nav">
                    <button type="button" class="ar-pro_left_arrow text-uppercase"><i
                            class="fal fa-long-arrow-left"></i></button>
                    <button type="button" class="ar-pro_right_arrow text-uppercase"><i
                            class="fal fa-long-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="archx-project-slider-area">
            <div class="archx-project-slider">
                <div class="archx-project-item-2">
                    <div class="archx-project-item-content  position-relative">
                        <div class="archx-project-img-2">
                            <img src="{{ asset('landing/img/project/ar-pro1.png') }}" alt="">
                        </div>
                        <div class="serial-no d-flex justify-content-center align-items-center position-absolute">
                            01
                        </div>
                        <div
                            class="archx-project-text-2 d-flex justify-content-between headline-2 position-absolute align-items-center">
                            <h3><a href="project-single.html">Book Printing Service</a></h3>
                            <a class="more_btn d-flex align-items-center justify-content-center"
                                href="project-single.html"> <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="archx-project-item-2">
                    <div class="archx-project-item-content  position-relative">
                        <div class="archx-project-img-2">
                            <img src="{{ asset('landing/img/project/ar-pro2.png') }}" alt="">
                        </div>
                        <div class="serial-no d-flex justify-content-center align-items-center position-absolute">
                            02
                        </div>
                        <div
                            class="archx-project-text-2 d-flex justify-content-between headline-2 position-absolute align-items-center">
                            <h3><a href="project-single.html">Book Printing Service</a></h3>
                            <a class="more_btn d-flex align-items-center justify-content-center"
                                href="project-single.html"> <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="archx-project-item-2">
                    <div class="archx-project-item-content  position-relative">
                        <div class="archx-project-img-2">
                            <img src="{{ asset('landing/img/project/ar-pro3.png') }}" alt="">
                        </div>
                        <div class="serial-no d-flex justify-content-center align-items-center position-absolute">
                            03
                        </div>
                        <div
                            class="archx-project-text-2 d-flex justify-content-between headline-2 position-absolute align-items-center">
                            <h3><a href="project-single.html">Book Printing Service</a></h3>
                            <a class="more_btn d-flex align-items-center justify-content-center"
                                href="project-single.html"> <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="archx-project-item-2">
                    <div class="archx-project-item-content  position-relative">
                        <div class="archx-project-img-2">
                            <img src="{{ asset('landing/img/project/ar-pro4.png') }}" alt="">
                        </div>
                        <div class="serial-no d-flex justify-content-center align-items-center position-absolute">
                            04
                        </div>
                        <div
                            class="archx-project-text-2 d-flex justify-content-between headline-2 position-absolute align-items-center">
                            <h3><a href="project-single.html">Book Printing Service</a></h3>
                            <a class="more_btn d-flex align-items-center justify-content-center"
                                href="project-single.html"> <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="archx-project-item-2">
                    <div class="archx-project-item-content  position-relative">
                        <div class="archx-project-img-2">
                            <img src="{{ asset('landing/img/project/ar-pro5.png') }}" alt="">
                        </div>
                        <div class="serial-no d-flex justify-content-center align-items-center position-absolute">
                            05
                        </div>
                        <div
                            class="archx-project-text-2 d-flex justify-content-between headline-2 position-absolute align-items-center">
                            <h3><a href="project-single.html">Book Printing Service</a></h3>
                            <a class="more_btn d-flex align-items-center justify-content-center"
                                href="project-single.html"> <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="archx-project-item-2">
                    <div class="archx-project-item-content  position-relative">
                        <div class="archx-project-img-2">
                            <img src="{{ asset('landing/img/project/ar-pro1.png') }}" alt="">
                        </div>
                        <div class="serial-no d-flex justify-content-center align-items-center position-absolute">
                            06
                        </div>
                        <div
                            class="archx-project-text-2 d-flex justify-content-between headline-2 position-absolute align-items-center">
                            <h3><a href="project-single.html">Book Printing Service</a></h3>
                            <a class="more_btn d-flex align-items-center justify-content-center"
                                href="project-single.html"> <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="archx-project-item-2">
                    <div class="archx-project-item-content  position-relative">
                        <div class="archx-project-img-2">
                            <img src="{{ asset('landing/img/project/ar-pro2.png') }}" alt="">
                        </div>
                        <div class="serial-no d-flex justify-content-center align-items-center position-absolute">
                            07
                        </div>
                        <div
                            class="archx-project-text-2 d-flex justify-content-between headline-2 position-absolute align-items-center">
                            <h3><a href="project-single.html">Book Printing Service</a></h3>
                            <a class="more_btn d-flex align-items-center justify-content-center"
                                href="project-single.html"> <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="archx-newslatter-wrapper">
            <div class="container">
                <div class="archx-newslatter-content d-flex justify-content-between">
                    <div class="archx-newslatter-cta d-flex align-items-center">
                        <div class="inner-icon">
                            <img src="{{ asset('landing/icon/ar-nw.png') }}" alt="">
                        </div>
                        <div class="inner-text">
                            <span class="cta-no">+44(0) 203 808 51</span>
                            <span class="cta-text">Ready To <a href="#">Get Started?</a> give a call </span>
                        </div>
                    </div>
                    <div class="archx-newslatter-form">
                        <div class="newslatter-form position-relative">
                            <span class="bg-icon position-absolute"><i class="fas fa-envelope"></i></span>
                            <form action="#" method="get">
                                <input type="email" name="email" placeholder="Enter your Email">
                                <button type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                            Level 13, 2 Elizabeth St, Melbourne
                            Victoria 3000, Australia
                        </div>
                    </div>
                    <div class="archx-map-info-item">
                        <div class="info-title d-flex align-items-center">
                            <span><i class="fas fa-address-book"></i></span>
                            <h3>Contact Way</h3>
                        </div>
                        <div class="info-text ul-li-block">
                            <ul>
                                <li><i class="fas fa-comments"></i> deanna.curtis@example.com</li>
                                <li><i class="fas fa-phone-alt"></i> (406) 555-0120</li>
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
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                    <span>Facebook</span>
                </a>
            </div>
            <div class="archx-social-item">
                <a href="#">
                    <i class="fab fa-linkedin"></i>
                    <span>Linkdin</span>
                </a>
            </div>
            <div class="archx-social-item">
                <a href="#">
                    <i class="fab fa-twitter"></i>
                    <span>Twitter</span>
                </a>
            </div>
            <div class="archx-social-item">
                <a href="#">
                    <i class="fab fa-instagram"></i>
                    <span>Instagram</span>
                </a>
            </div>
            <div class="archx-social-item">
                <a href="#">
                    <i class="fab fa-youtube"></i>
                    <span>Youtube</span>
                </a>
            </div>
            <div class="archx-social-item">
                <a href="#">
                    <i class="fab fa-pinterest"></i>
                    <span>Pinterest</span>
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
        <span class="archx-footer-mail position-absolute">Contact@gmail.com</span>
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis omnis
                                    assumenda inventore, deserunt vero nam harum. Aspernatur blanditiis reiciendis,
                                    ducimus odio repudiandae dolor fugiat cum, iusto exercitationem harum possimus
                                    fugit?
                                </div>
                                <div class="logo-cta-info ul-li-block">
                                    <ul>
                                        <li><i class="fal fa-map-marker-alt"></i> 254 Lillian Blvd, Holbrook</li>
                                        <li><i class="fas fa-phone-alt"></i> 1-800-654-3210</li>
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
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="blog.html">Recent News</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="service-single.html">Interior Design</a></li>
                                    <li><a href="project.html">Recent Project</a></li>
                                    <li><a href="service.html">Services</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="archx-footer-widget headline-2">
                            <div class="menu-widget ul-li-block">
                                <h3 class="widget-title">My Account</h3>
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="blog.html">Recent News</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="service-single.html">Interior Design</a></li>
                                    <li><a href="project.html">Recent Project</a></li>
                                    <li><a href="service.html">Services</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="archx-footer-widget headline-2">
                            <div class="award-widget">
                                <h3 class="widget-title">Our Information</h3>
                                <div class="total-award d-flex align-items-center">
                                    <span class="aw-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </div>
                                <div class="aw-instagram-wrap ul-li">
                                    <ul>
                                        <li><a href="#"><img src="{{ asset('landing/img/gallery/ins1.jpg') }}"
                                                    alt=""> <i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><img src="{{ asset('landing/img/gallery/ins2.jpg') }}"
                                                    alt=""> <i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="archx-footer-copyright d-flex justify-content-between align-items-center">
                <div class="archx-footer-copyright-text">
                    Copyright © <a href="#"> 2023 </a> by Data Cipta Celebes. All Rights Reserved.
                </div>
                <div class="archx-footer-copyright-social ul-li">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
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
