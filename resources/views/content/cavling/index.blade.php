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
                <button type="button" class="btn btn-primary" onclick="downloadSVG()">
                    <span class="svg-icon svg-icon-2 svg-icon-white me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #ffffff
                                }
                            </style>
                            <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                        </svg>
                    </span>
                </button>
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
                    <div class="col-2">
                        <div class="p-3 mb-2 bg-light text-black">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Kosong</font>
                            </font>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="p-3 mb-2 bg-success text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Booking</font>
                            </font>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="p-3 mb-2 bg-primary text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Proses Berkas</font>
                            </font>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="p-3 mb-2 bg-danger text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Sudah Akad</font>
                            </font>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="p-3 mb-2 bg-warning text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Cash/Lunas</font>
                            </font>
                        </div>
                    </div>
                    <div class="col-2">
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