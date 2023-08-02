<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
        <base href="" />
        <title>{{ config('app.name', 'Derinos Group') }}</title>
        <meta charset="utf-8" />
        <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
        <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
        <meta property="og:url" content="https://keenthemes.com/metronic" />
        <meta property="og:site_name" content="Keenthemes | Metronic" />
        <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Vendor Stylesheets(used by this page)-->
        @stack('css-vendor')
        <!--end::Vendor Stylesheets-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        @stack('css-custom')
        <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
        <!--begin::Theme mode setup on page load-->
        <script>
                var defaultThemeMode = "light";
                var themeMode;
                if (document.documentElement) {
                        if (document.documentElement.hasAttribute("data-theme-mode")) {
                                themeMode = document.documentElement.getAttribute("data-theme-mode");
                        } else {
                                if (localStorage.getItem("data-theme") !== null) {
                                        themeMode = localStorage.getItem("data-theme");
                                } else {
                                        themeMode = defaultThemeMode;
                                }
                        }
                        if (themeMode === "system") {
                                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                        }
                        document.documentElement.setAttribute("data-theme", themeMode);
                }
        </script>
        <!--end::Theme mode setup on page load-->
        <!--begin::App-->
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
                <!--begin::Page-->
                <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                        <!--begin::Header-->
                        @include('_layouts.header')
                        <!--end::Header-->
                        <!--begin::Wrapper-->
                        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                                <!--begin::Sidebar-->
                                @include('_layouts.sidebar')
                                <!--end::Sidebar-->
                                <!--begin::Main-->
                                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                                        <!--begin::Content wrapper-->
                                        @yield('content')
                                        <!--end::Content wrapper-->
                                        <!--begin::Footer-->
                                        @include('_layouts.footer')
                                        <!--end::Footer-->
                                </div>
                                <!--end:::Main-->
                        </div>
                        <!--end::Wrapper-->
                </div>
                <!--end::Page-->
        </div>
        <!--end::App-->


        <!--begin::Javascript-->
        <script>
                var hostUrl = "assets/";
        </script>
        <!--begin::Global Javascript Bundle(used by all pages)-->
        @stack('javascript-global')
        <!--end::Global Javascript Bundle-->
        <!--begin::Vendors Javascript(used by this page)-->
        @stack('javascript-vendor')
        <!--end::Vendors Javascript-->
        <!--begin::Custom Javascript(used by this page)-->
        @stack('javascript-custom')
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
</body>
<!--end::Body-->

</html>