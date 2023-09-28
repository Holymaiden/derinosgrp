@extends('_layouts.index')

@push('css-vendor')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('css-custom')
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('javascript-global')
<script src="{{ asset('assets/plugins/custom/jquery/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
@endpush

@push('javascript-vendor')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/pagination/jquery.twbsPagination.js') }}"></script>
@endpush

@push('javascript-custom')
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
<script src="{{ asset('assets/js/master/cavling/cavling-crud.js') }}"></script>
@endpush

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Blok
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Blok Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Blok</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Card header-->
            <div class="justify-content-end">
                <!--begin::Toggle-->
                <button type="button" class="btn btn-primary rotate" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="30px, 30px">
                    <i class="fa-solid fa-share" style="color: #ffffff;"></i>
                </button>
                <!--end::Toggle-->
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-auto min-w-200 mw-300px" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Share</div>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a onclick="downloadSVG()" class="menu-link px-3">
                            <i class="fa-solid fa-download me-1" style="color: #009ef7;"></i>
                            Download
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a onclick="downloadWhatsApp()" class="menu-link px-3">
                            <i class="fa-brands fa-whatsapp me-1" style="color: #50cd89;"></i>
                            WhatsApp
                        </a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
            </div>
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">
                @include('content.cavling.modal-show')
                <!--end::Card header-->
                <!--begin::Card body-->

                <div class="card-body py-4 cavling-data">
                </div>
                <h2 class="text-center">Keterangan :</h2>
                <div class="div row mx-2">
                    <div class="col-sm-12 col-md-6 col-lg-2">
                        <div class="p-3 mb-2 bg-light text-black">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Kosong</font>
                            </font>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-2">
                        <div class="p-3 mb-2 bg-success text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Booking</font>
                            </font>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-2">
                        <div class="p-3 mb-2 bg-primary text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Proses Berkas</font>
                            </font>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-2">
                        <div class="p-3 mb-2 bg-danger text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Sudah Akad</font>
                            </font>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-2">
                        <div class="p-3 mb-2 bg-warning text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Cash/Lunas</font>
                            </font>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-2">
                        <div class="p-3 mb-2 bg-info text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">SP3K</font>
                            </font>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
@endsection