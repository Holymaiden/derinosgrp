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
    <script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/users/list/add.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('assets/js/master/user-crud.js') }}"></script>
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Cavling
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Cavling Management</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Cavling</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
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
                    <!--begin::Card header-->
                    {{-- <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-user-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search user"
                                    id="kt_table_search" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Filter-->
                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Filter</button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->
                                    <!--begin::Content-->
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">Role:</label>
                                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                                data-placeholder="Select option" data-allow-clear="true"
                                                data-kt-user-table-filter="role" data-hide-search="true">
                                                <option></option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Analyst">Analyst</option>
                                                <option value="Developer">Developer</option>
                                                <option value="Support">Support</option>
                                                <option value="Trial">Trial</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset"
                                                class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                            <button type="submit" class="btn btn-primary fw-semibold px-6"
                                                data-kt-menu-dismiss="true"
                                                data-kt-user-table-filter="filter">Apply</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Filter-->
                                <!--begin::Export-->
                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_export_users">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="12.75" y="4.25" width="12"
                                                height="2" rx="1" transform="rotate(90 12.75 4.25)"
                                                fill="currentColor" />
                                            <path
                                                d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Export</button>
                                <!--end::Export-->
                                <!--begin::Add user-->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user" data-id="create-0">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                                fill="currentColor" />
                                            <rect x="4.36396" y="11.364" width="16" height="2"
                                                rx="1" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Add User</button>
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                            <!--begin::Modal - Adjust Balance-->
                            @include('content.users.modal-export')
                            <!--end::Modal - New Card-->
                            <!--begin::Modal - Add task-->
                            @include('content.users.modal-create-edit')
                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div> --}}
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xml:space="preserve" {{-- width="279.4mm" height="165.1mm" --}} version="1.1"
                            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                            viewBox="0 0 27940 16510">
                            <defs>
                                <style type="text/css">
                                    <![CDATA[
                                    .str0 {
                                        stroke: #1FFF1F;
                                        stroke-width: 17.64
                                    }

                                    .fil19 {
                                        fill: none
                                    }

                                    .fil28 {
                                        fill: #FEFEFE
                                    }

                                    .fil49 {
                                        fill: #FFFCDB
                                    }

                                    .fil44 {
                                        fill: #B6B49E
                                    }

                                    .fil18 {
                                        fill: #5F5C50
                                    }

                                    .fil48 {
                                        fill: #FFF9B1
                                    }

                                    .fil45 {
                                        fill: #B6B281
                                    }

                                    .fil47 {
                                        fill: #FFF582
                                    }

                                    .fil46 {
                                        fill: #DED572
                                    }

                                    .fil55 {
                                        fill: #FFF000
                                    }

                                    .fil25 {
                                        fill: #897870
                                    }

                                    .fil50 {
                                        fill: #B39B77
                                    }

                                    .fil20 {
                                        fill: #DAB96B
                                    }

                                    .fil24 {
                                        fill: #F4B3B3
                                    }

                                    .fil23 {
                                        fill: #F5B06E
                                    }

                                    .fil51 {
                                        fill: #D59961
                                    }

                                    .fil22 {
                                        fill: #F6AE45
                                    }

                                    .fil21 {
                                        fill: #EF8641
                                    }

                                    .fil59 {
                                        fill: #F08519
                                    }

                                    .fil57 {
                                        fill: #E40082
                                    }

                                    .fil0 {
                                        fill: #E61D4C
                                    }

                                    .fil56 {
                                        fill: #E62129
                                    }

                                    .fil31 {
                                        fill: #B8CEDA
                                    }

                                    .fil32 {
                                        fill: #98AAB4
                                    }

                                    .fil1 {
                                        fill: #75838A
                                    }

                                    .fil2 {
                                        fill: #50585D
                                    }

                                    .fil10 {
                                        fill: #D5EAD8
                                    }

                                    .fil27 {
                                        fill: #B9CCBC
                                    }

                                    .fil12 {
                                        fill: #99A99C
                                    }

                                    .fil15 {
                                        fill: #BBC99A
                                    }

                                    .fil13 {
                                        fill: #9AA780
                                    }

                                    .fil17 {
                                        fill: #D9E483
                                    }

                                    .fil14 {
                                        fill: #BCC774
                                    }

                                    .fil26 {
                                        fill: #D2CDE6
                                    }

                                    .fil58 {
                                        fill: #B04B87
                                    }

                                    .fil41 {
                                        fill: #A0D9F6
                                    }

                                    .fil5 {
                                        fill: #769C9B
                                    }

                                    .fil3 {
                                        fill: #5B7877
                                    }

                                    .fil11 {
                                        fill: #A6D4AE
                                    }

                                    .fil16 {
                                        fill: #ACCE22
                                    }

                                    .fil39 {
                                        fill: #7789A4
                                    }

                                    .fil36 {
                                        fill: #9288B1
                                    }

                                    .fil38 {
                                        fill: #5E5872
                                    }

                                    .fil8 {
                                        fill: #62C3D0
                                    }

                                    .fil9 {
                                        fill: #56AAB7
                                    }

                                    .fil6 {
                                        fill: #5BA997
                                    }

                                    .fil4 {
                                        fill: #4B8D7F
                                    }

                                    .fil7 {
                                        fill: #5FA776
                                    }

                                    .fil34 {
                                        fill: #758FC8
                                    }

                                    .fil37 {
                                        fill: #566892
                                    }

                                    .fil35 {
                                        fill: #7C6FB0
                                    }

                                    .fil52 {
                                        fill: #714588
                                    }

                                    .fil53 {
                                        fill: #00A2E9
                                    }

                                    .fil54 {
                                        fill: #009B4C
                                    }

                                    .fil40 {
                                        fill: #008FD7
                                    }

                                    .fil33 {
                                        fill: #1FFF1F
                                    }

                                    .fil30 {
                                        fill: #1FFF1F
                                    }

                                    .fil29 {
                                        fill: #25FF25
                                    }

                                    .fil60 {
                                        fill: #332C2B;
                                        fill-rule: nonzero
                                    }

                                    .fil43 {
                                        fill: #332C2B;
                                        fill-rule: nonzero
                                    }

                                    .fil42 {
                                        fill: #2B292A;
                                        fill-rule: nonzero
                                    }
                                    ]]>
                                </style>
                            </defs>
                            <g id="Layer_x0020_1">
                                <metadata id="CorelCorpID_0Corel-Layer" />
                                <polygon class="fil0 str0"
                                    points="19332,1527 19652,1425 19584,1248 19892,1524 19796,1340 20009,1239 26965,13949 26779,14026 26847,14197 26526,13925 26603,14097 26284,14202 " />
                                <polygon class="fil1 str0" points="958,8391 1816,8391 1816,10336 958,10336 " />
                                <polygon class="fil2 str0" points="1841,8391 2699,8391 2699,10336 1841,10336 " />
                                <polygon class="fil3 str0" points="2728,8391 3586,8391 3586,10336 2728,10336 " />
                                <polygon class="fil4 str0" points="3635,8391 4493,8391 4493,10336 3635,10336 " />
                                <polygon class="fil5 str0" points="4527,8391 5385,8391 5385,10336 4527,10336 " />
                                <polygon class="fil6 str0" points="5439,8391 6297,8391 6297,10336 5439,10336 " />
                                <polygon class="fil7 str0" points="6321,8391 7179,8391 7179,10336 6321,10336 " />
                                <polygon class="fil8 str0" points="7233,8391 8091,8391 8091,10336 7233,10336 " />
                                <polygon class="fil9 str0" points="8115,8391 8973,8391 8973,10336 8115,10336 " />
                                <polygon class="fil10 str0" points="958,10358 1816,10358 1816,12303 958,12303 " />
                                <polygon class="fil11 str0" points="1841,10358 2699,10358 2699,12303 1841,12303 " />
                                <polygon class="fil12 str0" points="2728,10358 3586,10358 3586,12303 2728,12303 " />
                                <polygon class="fil13 str0" points="3635,10358 4493,10358 4493,12303 3635,12303 " />
                                <polygon class="fil14 str0" points="4527,10358 5385,10358 5385,12303 4527,12303 " />
                                <polygon class="fil15 str0" points="5439,10358 6297,10358 6297,12303 5439,12303 " />
                                <polygon class="fil16 str0" points="6321,10358 7179,10358 7179,12303 6321,12303 " />
                                <polygon class="fil17 str0" points="7233,10358 8091,10358 8091,12303 7233,12303 " />
                                <polygon class="fil18 str0" points="8115,10358 8973,10358 8973,12303 8115,12303 " />
                                <polygon class="fil19 str0" points="880,13245 1738,13245 1738,15190 880,15190 " />
                                <polygon class="fil19 str0" points="1769,13245 2628,13245 2628,15190 1769,15190 " />
                                <polygon class="fil19 str0" points="2668,13245 3526,13245 3526,15190 2668,15190 " />
                                <polygon class="fil19 str0" points="3585,13245 4443,13245 4443,15190 3585,15190 " />
                                <polygon class="fil19 str0" points="4474,13245 5332,13245 5332,15190 4474,15190 " />
                                <polygon class="fil19 str0" points="5346,13245 6204,13245 6204,15190 5346,15190 " />
                                <polygon class="fil19 str0" points="6273,13245 7131,13245 7131,15190 6273,15190 " />
                                <polygon class="fil19 str0" points="7134,13245 7992,13245 7992,15190 7134,15190 " />
                                <polygon class="fil20 str0" points="8053,13245 8911,13245 8911,15190 8053,15190 " />
                                <polygon class="fil21 str0" points="8929,13245 9787,13245 9787,15190 8929,15190 " />
                                <polygon class="fil22 str0" points="9842,13245 10700,13245 10700,15190 9842,15190 " />
                                <polygon class="fil23 str0" points="10739,13245 11597,13245 11597,15190 10739,15190 " />
                                <polygon class="fil19 str0" points="1424,5479 2283,5479 2283,7424 1424,7424 " />
                                <polygon class="fil19 str0" points="2334,5479 3192,5479 3192,7424 2334,7424 " />
                                <polygon class="fil19 str0" points="3233,5479 4091,5479 4091,7424 3233,7424 " />
                                <polygon class="fil19 str0" points="4109,5479 4967,5479 4967,7424 4109,7424 " />
                                <polygon class="fil19 str0" points="5010,5479 5868,5479 5868,7424 5010,7424 " />
                                <polygon class="fil19 str0" points="5899,5479 6757,5479 6757,7424 5899,7424 " />
                                <polygon class="fil19 str0" points="6826,5479 7684,5479 7684,7424 6826,7424 " />
                                <polygon class="fil19 str0" points="7707,5479 8565,5479 8565,7424 7707,7424 " />
                                <polygon class="fil24 str0" points="8605,5479 9463,5479 9463,7424 8605,7424 " />
                                <polygon class="fil25 str0" points="9502,5479 10360,5479 10360,7424 9502,7424 " />
                                <polygon class="fil26 str0" points="10400,5479 11258,5479 11258,7424 10400,7424 " />
                                <polygon class="fil27 str0" points="9007,8399 10800,8399 10800,12273 9007,12273 " />
                                <line class="fil19 str0" x1="19729" y1="8475" x2="22957" y2="8121" />
                                <polygon class="fil28 str0" points="19729,8475 19860,8725 20161,8692 20023,8438 " />
                                <polygon class="fil29 str0"
                                    points="20161,8692 20559,9481 15463,10075 12049,10330 11984,13249 12026,13844 12264,14463 11597,15141 11597,13245 11731,13242 11739,10344 12112,9536 " />
                                <polygon class="fil29 str0"
                                    points="1424,5479 1424,7424 1219,7420 1198,8369 958,8391 902,13242 856,13248 880,15190 10864,15190 2968,15401 832,15213 678,12582 839,11793 787,9684 1115,6395 " />
                                <polygon class="fil30 str0"
                                    points="11258,5479 11527,5480 11714,6546 11712,7424 11258,7424 " />
                                <polygon class="fil19 str0" points="11688,8518 11714,6590 18870,5808 18874,7728 " />
                                <polygon class="fil31 str0" points="18911,5817 21525,5523 21944,6278 18900,6694 " />
                                <polygon class="fil32 str0" points="18904,6729 18893,7563 22361,7076 21948,6311 " />
                                <polygon class="fil33 str0" points="18890,7579 18891,7730 22462,7205 22391,7083 " />
                                <polyline class="fil19 str0"
                                    points="12613,6491 12628,8415 13523,8316 13523,6392 14412,6295 14398,8220 15281,8123 15292,6199 16217,6098 16207,8021 17112,7922 17093,6002 18005,5902 17989,7825 " />
                                <polygon class="fil34 str0"
                                    points="11703,7424 11688,8518 12628,8415 12613,6491 11714,6590 11712,7424 " />
                                <polygon class="fil35 str0" points="12613,6491 12628,8415 13523,8316 13523,6392 " />
                                <polygon class="fil36 str0" points="13523,6392 13523,8316 14398,8220 14412,6295 " />
                                <polygon class="fil37 str0" points="14412,6295 14398,8220 15281,8123 15292,6199 " />
                                <polygon class="fil38 str0" points="15292,6199 15281,8123 16207,8021 16217,6098 " />
                                <polygon class="fil39 str0" points="16217,6098 16207,8021 17112,7922 17093,6002 " />
                                <polygon class="fil40 str0" points="17093,6002 17112,7922 17989,7825 18005,5902 " />
                                <polygon class="fil41 str0" points="18005,5902 17989,7825 18874,7728 18870,5808 " />
                                <path class="fil42"
                                    d="M21191 4109l10 14c-10,6 -15,12 -17,17 -2,5 -2,11 1,17 3,4 6,7 9,9 4,2 8,3 12,2 4,0 10,-3 17,-6l90 -48 9 17 -89 47c-11,6 -20,9 -27,10 -8,0 -14,-2 -21,-6 -6,-4 -11,-10 -15,-17 -6,-12 -7,-22 -4,-32 4,-9 12,-17 25,-24zm8 105l157 -18 10 19 -103 122 -10 -20 32 -36 -29 -55 -47 7 -10 -19zm73 10l24 44 29 -33c9,-9 16,-17 22,-23 -9,2 -19,4 -29,6l-46 6zm-2 126l131 -69 9 17 -115 61 33 64 -15 8 -43 -81zm46 88l158 -19 10 19 -103 122 -10 -20 31 -36 -29 -55 -47 7 -10 -18zm74 9l23 45 29 -33c9,-10 17,-18 23,-24 -10,3 -19,5 -29,6l-46 6zm-2 127l131 -69 9 18 -66 122 102 -54 9 17 -131 69 -9 -18 66 -123 -102 54 -9 -16zm62 117l157 -18 10 19 -103 122 -10 -20 32 -36 -29 -55 -47 7 -10 -19zm73 10l24 44 29 -32c9,-10 16,-18 22,-24 -9,3 -19,5 -29,6l-46 6zm-2 126l131 -68 10 17 -67 123 103 -54 8 17 -130 68 -10 -17 67 -123 -103 54 -9 -17z" />
                                <path class="fil42"
                                    d="M23609 8502l10 14c-9,6 -15,11 -17,16 -2,6 -2,11 2,17 2,5 5,8 8,10 4,2 8,3 12,2 4,-1 10,-3 17,-7l90 -47 10 17 -90 47c-10,6 -20,9 -27,9 -7,1 -14,-1 -20,-5 -7,-4 -12,-10 -16,-18 -6,-11 -7,-22 -4,-31 4,-10 12,-18 25,-24zm8 105l157 -19 10 19 -102 122 -11 -19 32 -36 -29 -55 -47 6 -10 -18zm74 9l23 45 29 -33c9,-10 17,-18 23,-24 -10,3 -20,5 -29,6l-46 6zm-3 126l131 -68 9 17 -115 61 34 64 -16 8 -43 -82zm47 88l157 -18 10 19 -103 122 -10 -20 31 -36 -29 -55 -47 7 -9 -19zm73 10l24 44 29 -32c9,-10 16,-18 22,-24 -9,3 -19,5 -29,6l-46 6zm-2 126l131 -68 9 17 -66 123 102 -54 9 17 -131 68 -9 -17 67 -123 -103 54 -9 -17zm62 118l157 -19 10 19 -102 123 -11 -20 32 -36 -29 -55 -47 6 -10 -18zm74 9l23 45 29 -33c9,-10 16,-17 23,-23 -10,2 -20,4 -29,6l-46 5zm-2 127l130 -69 10 18 -67 123 103 -54 9 16 -131 69 -10 -18 67 -122 -103 54 -8 -17z" />
                                <path class="fil43"
                                    d="M9539 10410l0 -148 29 0 35 105c3,9 5,17 7,21 2,-5 4,-13 8,-23l35 -103 27 0 0 148 -19 0 0 -124 -43 124 -18 0 -43 -126 0 126 -18 0zm156 0l56 -148 22 0 60 148 -22 0 -17 -45 -63 0 -16 45 -20 0zm42 -61l51 0 -16 -41c-4,-12 -8,-23 -10,-31 -2,10 -5,19 -9,29l-16 43zm105 13l19 -1c0,7 2,13 6,18 3,5 8,8 14,11 7,3 15,5 23,5 8,0 14,-1 20,-3 6,-3 10,-6 13,-10 2,-4 4,-8 4,-12 0,-5 -2,-9 -4,-12 -3,-4 -7,-7 -14,-9 -3,-2 -12,-4 -26,-7 -13,-4 -23,-7 -28,-10 -7,-3 -13,-8 -16,-13 -4,-6 -5,-12 -5,-19 0,-7 2,-14 6,-21 4,-6 10,-11 19,-14 8,-4 17,-6 27,-6 11,0 20,2 29,6 8,3 14,8 19,15 5,7 7,15 7,24l-19 1c-1,-9 -4,-16 -10,-21 -6,-5 -14,-7 -26,-7 -11,0 -20,2 -25,6 -6,5 -8,10 -8,16 0,5 1,10 5,13 4,3 14,7 30,11 16,3 27,6 32,9 9,4 15,9 19,15 5,6 7,13 7,21 0,8 -3,15 -7,22 -5,7 -11,13 -20,16 -8,4 -17,6 -28,6 -13,0 -24,-2 -34,-6 -9,-4 -16,-9 -21,-17 -5,-8 -8,-17 -8,-27zm134 6l18 -3c0,12 2,19 6,24 4,4 9,6 16,6 5,0 9,-1 12,-4 4,-2 6,-5 8,-9 1,-4 2,-10 2,-18l0 -102 19 0 0 101c0,12 -1,22 -4,28 -3,7 -8,12 -14,16 -7,3 -14,5 -23,5 -13,0 -23,-4 -30,-11 -7,-7 -10,-19 -10,-33zm117 42l0 -148 19 0 0 148 -19 0zm54 0l0 -148 51 0c11,0 20,1 26,2 8,2 16,6 22,11 7,6 13,15 17,25 4,10 6,22 6,35 0,11 -1,21 -4,30 -3,9 -6,16 -10,21 -4,6 -9,11 -14,14 -4,3 -10,6 -17,7 -7,2 -15,3 -24,3l-53 0zm19 -18l32 0c10,0 17,-1 23,-2 5,-2 10,-5 13,-8 5,-5 8,-11 11,-19 2,-8 4,-17 4,-28 0,-16 -3,-28 -8,-36 -5,-8 -11,-14 -18,-17 -6,-2 -14,-3 -26,-3l-31 0 0 113z" />
                                <polygon class="fil44 str0" points="1738,15190 1738,13245 880,13245 880,15190 " />
                                <polygon class="fil45 str0" points="1769,13245 1769,15190 2628,15190 2628,13245 " />
                                <polygon class="fil46 str0" points="2668,13245 2668,15190 3526,15190 3526,13245 " />
                                <polygon class="fil47 str0" points="3585,13245 3585,15190 4443,15190 4443,13245 " />
                                <polygon class="fil48 str0" points="4474,13245 4474,15190 5332,15190 5332,13245 " />
                                <polygon class="fil49 str0" points="5346,13245 5346,15190 6204,15190 6204,13245 " />
                                <polygon class="fil50 str0" points="6273,13245 6273,15190 7131,15190 7131,13245 " />
                                <polygon class="fil51 str0" points="7134,13245 7134,15190 7992,15190 7992,13245 " />
                                <polygon class="fil52" points="1424,5479 1424,7424 2283,7424 2283,5479 " />
                                <polygon class="fil53" points="2334,5479 2334,7424 3192,7424 3192,5479 " />
                                <polygon class="fil54" points="3233,5479 3233,7424 4091,7424 4091,5479 " />
                                <polygon class="fil55" points="4109,5479 4109,7424 4967,7424 4967,5479 " />
                                <polygon class="fil56" points="5010,5479 5010,7424 5868,7424 5868,5479 " />
                                <polygon class="fil57" points="5899,5479 5899,7424 6757,7424 6757,5479 " />
                                <polygon class="fil58" points="6826,5479 6826,7424 7684,7424 7684,5479 " />
                                <polygon class="fil59" points="8565,5479 7707,5479 7707,7424 8565,7424 " />
                                <line class="fil19 str0" x1="27262" y1="13823" x2="26963" y2="13950" />
                                <line class="fil19 str0" x1="20298" y1="1109" x2="20002" y2="1243" />
                                <path class="fil60"
                                    d="M10704 6545l0 -186 69 0c14,0 26,2 34,6 9,3 16,9 20,17 5,8 8,16 8,25 0,8 -2,15 -7,22 -4,7 -10,13 -19,17 11,3 20,9 26,17 6,8 9,17 9,28 0,9 -2,17 -6,24 -3,8 -8,13 -13,17 -6,5 -12,8 -21,10 -8,2 -18,3 -30,3l-70 0zm24 -108l40 0c11,0 19,-1 24,-2 6,-2 11,-5 14,-9 3,-5 5,-10 5,-17 0,-6 -2,-11 -5,-16 -3,-5 -7,-8 -12,-10 -6,-1 -15,-2 -29,-2l-37 0 0 56zm0 86l46 0c8,0 14,0 17,-1 6,-1 11,-3 14,-5 4,-2 7,-6 10,-10 2,-5 3,-10 3,-16 0,-7 -1,-13 -5,-18 -3,-5 -8,-9 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm226 22l-23 0 0 -146c-5,6 -12,11 -21,16 -9,5 -17,9 -24,12l0 -22c12,-6 24,-13 33,-22 10,-8 16,-17 20,-25l15 0 0 187z" />
                                <path class="fil43"
                                    d="M19986 6250l-20 -185 82 -9c16,-2 29,-1 38,1 9,2 16,7 22,15 6,8 10,17 11,27 1,13 -2,25 -9,35 -8,10 -20,17 -38,21 7,3 12,5 16,8 8,5 15,13 23,22l37 47 -30 3 -29 -36c-8,-10 -15,-18 -20,-23 -5,-5 -10,-9 -14,-11 -4,-2 -8,-3 -12,-4 -2,0 -7,0 -13,1l-29 3 9 82 -24 3zm13 -106l53 -6c11,-1 19,-3 25,-6 6,-3 11,-7 13,-13 3,-5 4,-11 3,-17 -1,-9 -4,-16 -11,-20 -7,-5 -18,-7 -31,-6l-59 7 7 61zm273 -112l25 -3 11 107c2,18 2,33 -1,44 -3,12 -10,21 -20,29 -10,9 -24,14 -42,15 -17,2 -31,1 -43,-4 -12,-5 -20,-12 -26,-23 -6,-11 -10,-26 -12,-46l-12 -106 24 -3 12 107c2,16 5,27 8,35 4,7 10,12 18,15 7,4 16,5 27,4 18,-2 30,-8 37,-17 6,-9 8,-25 6,-48l-12 -106zm85 177l-20 -184 24 -3 10 91 82 -101 33 -4 -69 84 92 101 -32 3 -76 -86 -27 33 7 63 -24 3zm155 -108c-3,-30 3,-55 17,-74 15,-19 35,-30 61,-33 17,-2 33,0 48,7 14,7 26,17 35,31 8,13 14,29 16,48 2,19 0,36 -6,51 -6,16 -16,28 -29,37 -13,9 -27,15 -43,17 -18,1 -34,-1 -48,-8 -15,-7 -26,-17 -35,-31 -9,-14 -14,-29 -16,-45zm26 -2c2,22 10,39 23,50 14,12 29,17 47,15 19,-2 33,-10 44,-25 10,-14 14,-33 11,-56 -1,-15 -5,-28 -11,-39 -7,-10 -15,-18 -25,-23 -11,-6 -22,-7 -34,-6 -18,2 -32,9 -43,23 -11,13 -15,33 -12,61zm340 53l-23 3 -16 -145c-4,6 -11,12 -19,18 -9,6 -16,11 -23,15l-2 -22c12,-8 22,-16 31,-26 8,-9 14,-18 17,-26l15 -2 20 185z" />
                                <path class="fil60"
                                    d="M9789 6545l0 -186 70 0c14,0 25,2 34,6 8,3 15,9 20,17 5,8 7,16 7,25 0,8 -2,15 -6,22 -5,7 -11,13 -20,17 12,3 20,9 26,17 6,8 9,17 9,28 0,9 -2,17 -5,24 -4,8 -8,13 -14,17 -5,5 -12,8 -20,10 -8,2 -18,3 -30,3l-71 0zm25 -108l40 0c11,0 18,-1 23,-2 6,-2 11,-5 14,-9 3,-5 5,-10 5,-17 0,-6 -1,-11 -4,-16 -3,-5 -8,-8 -13,-10 -6,-1 -15,-2 -28,-2l-37 0 0 56zm0 86l46 0c8,0 13,0 17,-1 5,-1 10,-3 14,-5 4,-2 7,-6 9,-10 3,-5 4,-10 4,-16 0,-7 -2,-13 -6,-18 -3,-5 -8,-9 -14,-11 -7,-2 -16,-3 -27,-3l-43 0 0 64zm259 0l0 22 -122 0c-1,-6 0,-11 2,-16 3,-8 8,-17 15,-25 7,-8 17,-17 30,-28 20,-16 34,-29 41,-39 7,-10 11,-19 11,-28 0,-9 -3,-16 -10,-22 -6,-7 -15,-10 -25,-10 -11,0 -20,4 -27,10 -6,7 -10,16 -10,27l-23 -2c2,-17 8,-31 18,-40 11,-9 25,-14 42,-14 18,0 32,5 43,15 10,10 15,22 15,37 0,7 -1,15 -4,22 -3,7 -8,15 -16,23 -7,7 -18,18 -35,32 -13,12 -22,20 -26,24 -4,4 -7,8 -10,12l91 0z" />
                                <path class="fil60"
                                    d="M20174 7077l-20 -184 82 -9c16,-2 29,-2 38,1 9,2 16,7 22,15 6,8 10,17 11,27 1,13 -2,25 -9,34 -8,10 -20,17 -38,22 7,2 12,5 16,7 8,6 16,14 23,23l37 47 -30 3 -29 -36c-8,-10 -15,-18 -20,-23 -5,-6 -10,-9 -14,-11 -4,-2 -8,-3 -12,-4 -2,0 -7,0 -13,1l-28 3 8 82 -24 2zm13 -105l53 -6c11,-1 19,-4 25,-7 6,-2 11,-7 13,-12 3,-6 4,-11 4,-17 -1,-9 -5,-16 -12,-21 -7,-5 -17,-6 -31,-5l-58 6 6 62zm273 -113l25 -2 12 106c2,19 1,34 -2,45 -3,11 -10,21 -20,29 -10,8 -24,13 -42,15 -17,2 -31,1 -43,-4 -12,-5 -20,-13 -26,-23 -6,-11 -10,-26 -12,-46l-12 -107 25 -2 11 106c2,16 5,28 8,35 4,8 10,13 18,16 7,4 16,5 27,3 18,-1 30,-7 37,-16 7,-9 9,-25 6,-48l-12 -107zm85 178l-20 -185 24 -2 10 91 82 -101 33 -4 -69 83 92 101 -32 4 -76 -86 -27 32 7 64 -24 3zm156 -108c-4,-31 2,-55 16,-75 15,-19 35,-30 61,-33 17,-1 33,1 48,8 14,6 26,17 35,30 8,14 14,30 16,49 2,18 0,35 -6,51 -6,16 -15,28 -28,37 -13,9 -28,15 -44,16 -17,2 -33,0 -48,-7 -15,-7 -26,-17 -35,-31 -9,-14 -14,-29 -15,-45zm25 -2c2,22 10,39 23,50 14,12 30,16 48,14 18,-2 32,-10 43,-24 10,-14 14,-33 12,-57 -2,-15 -6,-28 -12,-38 -7,-11 -15,-19 -25,-24 -11,-5 -22,-7 -34,-5 -18,2 -32,9 -43,22 -11,13 -15,34 -12,62zm371 28l3 21 -122 14c-1,-6 -1,-11 1,-16 2,-9 6,-18 12,-27 6,-8 15,-19 27,-31 18,-18 30,-33 36,-43 6,-11 9,-20 8,-29 -1,-9 -5,-16 -13,-21 -7,-6 -15,-8 -26,-7 -11,1 -19,6 -25,13 -6,7 -8,16 -7,28l-23 0c-1,-17 4,-31 13,-41 10,-11 23,-17 41,-19 17,-2 32,2 43,10 12,9 18,21 20,35 1,8 0,15 -2,23 -3,7 -7,15 -13,24 -6,8 -16,21 -31,36 -13,13 -21,22 -24,26 -3,5 -6,9 -8,14l90 -10z" />
                                <path class="fil60"
                                    d="M8890 6543l0 -185 70 0c14,0 26,1 34,5 9,4 15,10 20,18 5,7 8,15 8,24 0,8 -3,15 -7,22 -4,7 -11,13 -19,17 11,4 20,9 26,17 6,8 9,18 9,28 0,9 -2,17 -6,25 -4,7 -8,13 -14,17 -5,4 -12,7 -20,9 -8,2 -18,3 -30,3l-71 0zm25 -107l40 0c11,0 19,-1 24,-3 6,-1 10,-5 14,-9 3,-4 4,-10 4,-16 0,-6 -1,-12 -4,-16 -3,-5 -7,-8 -13,-10 -5,-2 -15,-3 -28,-3l-37 0 0 57zm0 85l46 0c8,0 14,0 17,0 6,-1 10,-3 14,-6 4,-2 7,-5 10,-10 2,-4 3,-10 3,-16 0,-7 -2,-13 -5,-18 -4,-5 -9,-8 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm140 -27l23 -3c3,13 7,22 13,28 7,6 14,8 23,8 11,0 20,-3 28,-11 7,-7 11,-16 11,-27 0,-11 -4,-19 -11,-26 -6,-7 -15,-11 -26,-11 -4,0 -9,1 -16,3l3 -20c1,0 3,0 3,0 10,0 19,-2 27,-7 8,-5 11,-13 11,-24 0,-8 -2,-15 -8,-20 -6,-6 -13,-9 -22,-9 -9,0 -16,3 -22,9 -6,5 -10,14 -12,25l-22 -4c2,-15 9,-27 19,-36 9,-8 22,-12 36,-12 11,0 20,2 28,6 9,5 15,11 20,18 5,8 7,15 7,24 0,8 -2,15 -7,22 -4,6 -10,12 -19,15 11,3 20,8 26,16 6,8 9,18 9,30 0,16 -6,30 -18,41 -12,12 -27,17 -45,17 -16,0 -30,-5 -40,-14 -11,-10 -17,-23 -19,-38z" />
                                <path class="fil43"
                                    d="M8330 9456l0 -185 69 0c14,0 26,2 34,5 9,4 16,10 20,18 5,7 8,16 8,24 0,8 -2,16 -7,23 -4,7 -10,12 -19,17 11,3 20,8 26,16 6,8 9,18 9,29 0,8 -2,16 -6,24 -3,7 -8,13 -13,17 -6,4 -13,7 -21,9 -8,2 -18,3 -30,3l-70 0zm24 -107l40 0c11,0 19,-1 24,-2 6,-2 11,-5 14,-10 3,-4 5,-9 5,-16 0,-6 -2,-12 -5,-16 -3,-5 -7,-8 -12,-10 -6,-2 -15,-3 -29,-3l-37 0 0 57zm0 86l46 0c8,0 14,-1 17,-1 6,-1 11,-3 14,-5 4,-3 7,-6 10,-11 2,-4 3,-10 3,-15 0,-7 -1,-13 -5,-19 -3,-5 -8,-8 -15,-10 -6,-2 -15,-3 -27,-3l-43 0 0 64zm226 21l-23 0 0 -145c-5,5 -12,11 -21,16 -9,5 -17,9 -24,12l0 -23c12,-5 23,-13 33,-21 10,-9 16,-17 20,-25l15 0 0 186zm178 -21l0 21 -123 0c0,-5 1,-10 3,-16 3,-8 8,-16 15,-24 7,-8 17,-18 30,-28 20,-17 34,-30 41,-40 7,-9 11,-18 11,-27 0,-9 -4,-17 -10,-23 -7,-6 -15,-9 -25,-9 -11,0 -20,3 -27,10 -7,6 -10,15 -10,27l-23 -2c1,-18 7,-31 18,-40 10,-10 24,-14 42,-14 18,0 32,5 42,15 11,10 16,22 16,37 0,7 -2,14 -5,21 -3,8 -8,15 -15,23 -7,8 -19,19 -35,33 -14,11 -22,19 -26,23 -4,4 -7,8 -10,13l91 0z" />
                                <path class="fil60"
                                    d="M7993 6544l0 -185 70 0c14,0 25,2 34,5 8,4 15,10 20,18 5,7 7,16 7,24 0,8 -2,16 -6,23 -4,7 -11,12 -20,17 12,3 20,8 26,16 6,8 9,18 9,29 0,8 -2,16 -5,24 -4,7 -8,13 -14,17 -5,4 -12,7 -20,9 -8,2 -18,3 -30,3l-71 0zm25 -107l40 0c11,0 19,-1 23,-2 7,-2 11,-5 14,-10 4,-4 5,-9 5,-16 0,-6 -1,-12 -4,-16 -3,-5 -7,-8 -13,-10 -5,-2 -15,-3 -28,-3l-37 0 0 57zm0 86l46 0c8,0 13,-1 17,-1 5,-1 10,-3 14,-5 4,-3 7,-6 9,-11 3,-4 4,-10 4,-15 0,-7 -2,-13 -5,-19 -4,-5 -9,-8 -15,-10 -6,-2 -16,-3 -27,-3l-43 0 0 64zm213 21l0 -44 -81 0 0 -21 85 -120 19 0 0 120 25 0 0 21 -25 0 0 44 -23 0zm0 -65l0 -84 -58 84 58 0z" />
                                <path class="fil60"
                                    d="M18297 6924l51 -193 26 -2 96 176 -28 3 -27 -54 -78 9 -14 58 -26 3zm45 -82l63 -7 -25 -49c-8,-15 -13,-27 -18,-37 -1,12 -3,25 -6,37l-14 56zm223 53l-22 2 -16 -144c-5,5 -12,11 -20,18 -8,6 -16,10 -23,14l-2 -22c12,-7 22,-16 31,-25 8,-10 14,-19 17,-27l15 -2 20 186z" />
                                <path class="fil60"
                                    d="M7446 9455l0 -186 70 0c14,0 26,2 34,6 9,3 16,9 20,17 5,8 8,16 8,25 0,8 -2,15 -7,22 -4,7 -10,13 -19,17 11,3 20,9 26,17 6,8 9,17 9,28 0,9 -2,17 -6,24 -3,8 -8,13 -13,18 -6,4 -13,7 -21,9 -8,2 -18,3 -30,3l-71 0zm25 -108l40 0c11,0 19,-1 24,-2 6,-2 11,-5 14,-9 3,-5 5,-10 5,-17 0,-6 -2,-11 -5,-16 -3,-5 -7,-8 -13,-10 -5,-1 -14,-2 -28,-2l-37 0 0 56zm0 86l46 0c8,0 14,0 17,-1 6,-1 11,-3 14,-5 4,-2 7,-6 10,-10 2,-5 3,-10 3,-16 0,-7 -1,-13 -5,-18 -4,-5 -8,-9 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm226 22l-23 0 0 -146c-5,6 -13,11 -21,16 -9,5 -17,9 -24,12l0 -22c12,-6 23,-13 33,-22 10,-8 16,-17 20,-25l15 0 0 187zm59 -49l22 -4c3,13 8,23 14,28 6,6 14,9 23,9 11,0 20,-4 27,-11 8,-8 11,-17 11,-28 0,-10 -3,-19 -10,-26 -7,-7 -16,-10 -26,-10 -5,0 -10,1 -16,3l2 -20c2,0 3,0 4,0 10,0 18,-3 26,-8 8,-5 12,-13 12,-23 0,-8 -3,-15 -9,-21 -5,-5 -13,-8 -22,-8 -8,0 -16,3 -22,8 -6,6 -9,14 -11,26l-23 -4c3,-16 9,-28 19,-36 10,-8 22,-13 37,-13 10,0 19,3 28,7 8,4 15,10 19,18 5,7 7,15 7,23 0,8 -2,16 -6,22 -5,7 -11,12 -19,16 11,3 19,8 25,16 6,8 9,18 9,30 0,16 -6,30 -17,41 -12,11 -27,17 -45,17 -17,0 -30,-5 -41,-15 -11,-9 -17,-22 -18,-37z" />
                                <path class="fil60"
                                    d="M7111 6543l0 -186 70 0c14,0 26,2 34,6 9,4 15,9 20,17 5,8 8,16 8,25 0,8 -3,15 -7,22 -4,7 -11,13 -19,17 11,3 20,9 26,17 6,8 9,17 9,28 0,9 -2,17 -6,24 -4,8 -8,13 -14,18 -5,4 -12,7 -20,9 -8,2 -18,3 -30,3l-71 0zm25 -108l40 0c11,0 19,-1 24,-2 6,-2 11,-5 14,-9 3,-5 4,-10 4,-17 0,-6 -1,-11 -4,-16 -3,-5 -7,-8 -13,-9 -5,-2 -15,-3 -28,-3l-37 0 0 56zm0 86l46 0c8,0 14,0 17,-1 6,-1 10,-3 14,-5 4,-2 7,-6 10,-10 2,-5 3,-10 3,-16 0,-7 -2,-13 -5,-18 -4,-5 -9,-9 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm140 -27l24 -2c2,12 6,21 12,26 7,6 15,9 24,9 11,0 20,-4 28,-12 7,-8 11,-19 11,-33 0,-13 -4,-23 -11,-31 -7,-7 -16,-11 -28,-11 -8,0 -14,2 -20,5 -6,3 -11,8 -14,13l-22 -3 18 -96 92 0 0 22 -73 0 -10 50c11,-7 22,-11 35,-11 16,0 29,5 41,17 11,11 16,25 16,43 0,17 -5,31 -14,43 -12,15 -29,23 -49,23 -17,0 -31,-5 -41,-14 -11,-10 -17,-22 -19,-38z" />
                                <path class="fil43"
                                    d="M17398 7018l51 -192 27 -3 95 176 -28 3 -27 -53 -78 8 -14 58 -26 3zm45 -81l63 -7 -25 -49c-8,-15 -13,-28 -18,-37 -1,12 -3,24 -6,36l-14 57zm255 27l2 21 -122 14c-1,-6 -1,-11 1,-16 2,-9 6,-18 12,-27 6,-8 15,-19 27,-31 18,-18 30,-33 36,-43 6,-11 9,-20 8,-29 -1,-9 -5,-16 -12,-21 -7,-6 -16,-8 -27,-7 -10,1 -19,6 -25,13 -6,7 -8,16 -7,28l-23 0c-1,-17 4,-31 13,-42 10,-10 23,-16 41,-18 18,-2 32,2 44,10 11,9 18,21 19,35 1,8 0,15 -2,23 -2,7 -6,15 -13,24 -6,8 -16,21 -31,36 -12,13 -20,22 -24,26 -3,5 -6,9 -8,14l91 -10z" />
                                <path class="fil60"
                                    d="M6535 9456l0 -185 70 0c14,0 25,2 34,5 8,4 15,10 20,18 5,7 7,16 7,24 0,8 -2,16 -6,23 -5,7 -11,12 -20,17 11,3 20,8 26,16 6,8 9,18 9,29 0,8 -2,16 -5,24 -4,7 -9,13 -14,17 -5,4 -12,7 -20,9 -8,2 -18,3 -30,3l-71 0zm25 -107l40 0c11,0 18,-1 23,-2 6,-2 11,-5 14,-10 3,-4 5,-9 5,-16 0,-6 -1,-12 -4,-16 -3,-5 -8,-8 -13,-10 -6,-2 -15,-3 -28,-3l-37 0 0 57zm0 86l46 0c8,0 13,-1 17,-1 5,-1 10,-3 14,-5 4,-3 7,-6 9,-11 3,-4 4,-10 4,-15 0,-7 -2,-13 -6,-19 -3,-5 -8,-8 -14,-10 -7,-2 -16,-3 -27,-3l-43 0 0 64zm225 21l-22 0 0 -145c-6,5 -13,11 -22,16 -9,5 -17,9 -24,12l0 -23c13,-5 24,-13 33,-21 10,-9 17,-17 21,-25l14 0 0 186zm132 0l0 -44 -81 0 0 -21 85 -120 19 0 0 120 25 0 0 21 -25 0 0 44 -23 0zm0 -65l0 -84 -58 84 58 0z" />
                                <path class="fil60"
                                    d="M6185 6543l0 -185 69 0c15,0 26,1 35,5 8,4 15,10 20,18 5,7 7,15 7,24 0,8 -2,15 -7,22 -4,7 -10,13 -19,17 11,4 20,9 26,17 6,8 9,18 9,28 0,9 -2,17 -6,25 -3,7 -8,13 -13,17 -6,4 -12,7 -20,9 -9,2 -19,3 -30,3l-71 0zm24 -107l40 0c11,0 19,-1 24,-3 6,-1 11,-5 14,-9 3,-4 5,-10 5,-16 0,-6 -2,-12 -5,-16 -3,-5 -7,-8 -12,-10 -6,-2 -15,-3 -29,-3l-37 0 0 57zm0 85l47 0c8,0 13,0 16,0 6,-1 11,-3 15,-6 3,-2 6,-5 9,-10 2,-4 4,-10 4,-16 0,-7 -2,-13 -6,-18 -3,-5 -8,-8 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm259 -118l-22 2c-2,-9 -5,-16 -9,-20 -6,-6 -14,-10 -23,-10 -7,0 -14,2 -19,7 -8,5 -13,12 -17,22 -4,10 -7,25 -7,43 6,-8 12,-14 20,-18 8,-4 17,-6 25,-6 16,0 29,5 39,16 11,12 16,26 16,44 0,12 -2,22 -7,32 -5,10 -12,18 -21,23 -9,6 -19,8 -30,8 -19,0 -34,-7 -46,-21 -12,-14 -18,-37 -18,-69 0,-36 6,-62 20,-78 11,-14 27,-21 46,-21 15,0 27,4 36,12 10,8 15,19 17,34zm-93 80c0,8 1,15 5,23 3,7 8,12 14,16 6,4 12,6 19,6 9,0 18,-4 25,-12 6,-8 10,-18 10,-32 0,-13 -3,-23 -10,-30 -7,-7 -16,-11 -26,-11 -10,0 -19,4 -26,11 -8,7 -11,17 -11,29z" />
                                <path class="fil60"
                                    d="M16510 7118l51 -193 27 -3 95 177 -28 3 -27 -54 -78 9 -14 58 -26 3zm45 -82l63 -7 -25 -49c-7,-15 -13,-27 -17,-37 -2,12 -4,24 -7,37l-14 56zm133 13l22 -6c4,13 10,21 17,26 7,5 14,7 24,6 10,-1 19,-5 25,-14 7,-8 10,-17 8,-28 -1,-11 -5,-19 -13,-25 -7,-6 -16,-8 -27,-7 -4,0 -9,2 -15,4l0 -20c1,0 3,0 4,0 9,-1 18,-5 25,-11 7,-5 10,-14 9,-24 -1,-8 -4,-15 -11,-20 -6,-5 -13,-7 -22,-6 -9,1 -16,5 -22,11 -5,6 -8,15 -8,27l-23 -2c1,-16 6,-28 15,-38 9,-9 20,-14 35,-16 10,-1 20,0 29,3 9,4 16,9 21,16 5,7 8,15 9,23 1,8 0,15 -4,22 -3,7 -9,13 -17,18 11,1 20,6 27,13 7,7 11,17 12,29 2,16 -2,30 -13,43 -10,12 -25,19 -43,21 -16,2 -30,-1 -41,-10 -12,-8 -20,-20 -23,-35z" />
                                <path class="fil60"
                                    d="M5652 9455l0 -186 70 0c14,0 26,2 34,6 9,3 15,9 20,17 5,8 8,16 8,25 0,8 -3,15 -7,22 -4,7 -11,13 -19,17 11,3 20,9 26,17 6,8 9,17 9,28 0,9 -2,17 -6,24 -4,8 -8,13 -14,18 -5,4 -12,7 -20,9 -8,2 -18,3 -30,3l-71 0zm25 -108l40 0c11,0 19,-1 24,-2 6,-2 11,-5 14,-9 3,-5 4,-10 4,-17 0,-6 -1,-11 -4,-16 -3,-5 -7,-8 -13,-10 -5,-1 -15,-2 -28,-2l-37 0 0 56zm0 86l46 0c8,0 14,0 17,-1 6,-1 10,-3 14,-5 4,-2 7,-6 10,-10 2,-5 3,-10 3,-16 0,-7 -2,-13 -5,-18 -4,-5 -9,-9 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm226 22l-23 0 0 -146c-5,6 -13,11 -22,16 -8,5 -17,9 -24,12l0 -22c13,-6 24,-13 34,-22 9,-8 16,-17 20,-25l15 0 0 187zm59 -49l23 -2c2,12 6,21 13,26 6,6 14,9 23,9 11,0 20,-4 28,-12 8,-8 11,-19 11,-33 0,-13 -3,-23 -10,-31 -8,-7 -17,-11 -29,-11 -8,0 -14,2 -20,5 -6,3 -10,8 -14,13l-21 -3 18 -96 92 0 0 22 -74 0 -10 50c11,-7 23,-11 35,-11 16,0 30,5 41,16 11,12 16,26 16,44 0,17 -4,31 -14,43 -12,15 -28,23 -49,23 -17,0 -31,-5 -41,-14 -11,-10 -17,-22 -18,-38z" />
                                <path class="fil60"
                                    d="M5296 6544l0 -185 70 0c14,0 25,2 34,5 9,4 15,10 20,18 5,7 7,16 7,24 0,8 -2,16 -6,23 -4,7 -11,12 -19,17 11,3 19,8 25,16 6,8 9,18 9,29 0,8 -1,16 -5,24 -4,7 -8,13 -14,17 -5,4 -12,7 -20,9 -8,2 -18,3 -30,3l-71 0zm25 -107l40 0c11,0 19,-1 23,-2 7,-2 11,-5 15,-10 3,-4 4,-9 4,-16 0,-6 -1,-12 -4,-16 -3,-5 -7,-8 -13,-10 -5,-2 -15,-3 -28,-3l-37 0 0 57zm0 86l46 0c8,0 14,-1 17,-1 5,-1 10,-3 14,-5 4,-3 7,-6 9,-11 3,-4 4,-10 4,-15 0,-7 -2,-13 -5,-19 -4,-5 -9,-8 -15,-10 -6,-2 -15,-3 -27,-3l-43 0 0 64zm141 -140l0 -22 120 0 0 18c-11,12 -23,29 -35,50 -11,21 -20,42 -27,64 -4,16 -7,33 -8,51l-24 0c1,-14 3,-32 9,-53 5,-20 13,-40 24,-60 10,-19 21,-35 32,-48l-91 0z" />
                                <path class="fil42"
                                    d="M6187 5931l80 0c16,0 28,1 36,2 8,2 15,4 21,9 6,4 11,9 15,16 5,7 7,15 7,24 0,9 -3,18 -8,26 -5,8 -12,13 -21,17 13,4 22,10 29,19 6,8 9,18 9,30 0,9 -2,18 -6,27 -4,8 -10,15 -17,21 -8,5 -17,8 -28,9 -6,1 -23,1 -49,2l-68 0 0 -202zm41 34l0 46 26 0c16,0 26,0 30,-1 7,0 12,-3 16,-7 4,-4 6,-9 6,-15 0,-7 -2,-12 -5,-15 -4,-4 -9,-7 -15,-7 -4,-1 -16,-1 -35,-1l-23 0zm0 80l0 54 37 0c15,0 24,-1 28,-2 6,-1 11,-3 15,-8 4,-4 6,-10 6,-17 0,-6 -2,-11 -5,-15 -3,-4 -7,-8 -12,-10 -6,-1 -18,-2 -37,-2l-32 0zm163 88l0 -200 41 0 0 166 101 0 0 34 -142 0zm162 -100c0,-20 3,-38 9,-52 5,-10 11,-19 19,-27 8,-8 17,-14 26,-18 12,-6 27,-8 43,-8 30,0 54,9 72,27 17,19 26,44 26,77 0,33 -9,58 -26,77 -18,18 -42,27 -71,27 -30,0 -54,-9 -72,-27 -17,-19 -26,-44 -26,-76zm42 -1c0,23 5,40 16,52 10,11 24,17 40,17 16,0 29,-6 40,-17 10,-12 15,-29 15,-53 0,-23 -5,-40 -15,-51 -10,-12 -23,-17 -40,-17 -17,0 -31,5 -41,17 -10,11 -15,29 -15,52zm185 101l0 -202 41 0 0 89 82 -89 55 0 -76 79 80 123 -53 0 -55 -95 -33 34 0 61 -41 0zm281 -202l80 0c16,0 28,1 36,2 8,2 15,4 21,9 6,4 11,9 15,16 5,7 7,15 7,24 0,9 -3,18 -8,26 -5,8 -12,13 -21,17 13,4 22,10 29,19 6,8 9,18 9,30 0,9 -2,18 -6,27 -4,8 -10,15 -17,21 -8,5 -17,8 -28,9 -6,1 -23,1 -49,2l-68 0 0 -202zm41 34l0 46 26 0c16,0 26,0 30,-1 7,0 12,-3 16,-7 4,-4 6,-9 6,-15 0,-7 -2,-12 -5,-15 -4,-4 -9,-7 -15,-7 -4,-1 -16,-1 -35,-1l-23 0zm0 80l0 54 37 0c15,0 24,-1 28,-2 6,-1 11,-3 15,-8 4,-4 6,-10 6,-17 0,-6 -2,-11 -5,-15 -3,-4 -7,-8 -13,-10 -5,-1 -17,-2 -36,-2l-32 0z" />
                                <path class="fil43"
                                    d="M14720 6701l80 -10c16,-2 28,-2 35,-2 8,0 16,2 22,6 7,3 13,8 18,14 5,7 8,14 9,23 1,9 -1,18 -5,27 -4,8 -10,15 -18,20 13,2 23,7 30,14 8,8 12,18 14,29 1,9 0,18 -3,28 -4,9 -8,16 -15,22 -7,6 -16,11 -26,13 -7,2 -23,4 -49,7l-68 9 -24 -200zm45 28l5 46 27 -3c15,-2 25,-3 29,-4 6,-2 12,-5 15,-9 4,-5 5,-10 4,-17 -1,-6 -3,-10 -7,-14 -4,-3 -9,-5 -16,-5 -4,0 -15,1 -34,3l-23 3zm9 80l7 53 37 -5c15,-1 24,-3 28,-4 5,-2 10,-5 13,-10 4,-5 5,-10 4,-18 -1,-6 -3,-11 -6,-14 -4,-4 -8,-7 -14,-8 -6,-1 -18,-1 -36,2l-33 4zm173 67l-24 -198 40 -5 20 164 100 -12 5 34 -141 17zm149 -118c-3,-21 -2,-38 3,-53 3,-11 8,-20 15,-30 7,-9 15,-16 23,-21 12,-6 26,-11 43,-13 29,-3 54,3 74,19 19,16 31,40 35,73 4,32 -1,59 -17,79 -15,20 -37,32 -67,36 -29,4 -54,-3 -74,-19 -20,-16 -31,-39 -35,-71zm41 -7c3,23 10,39 22,50 12,10 26,14 42,12 16,-2 29,-9 38,-22 9,-13 12,-31 9,-54 -3,-23 -10,-39 -22,-49 -11,-10 -25,-14 -42,-12 -16,2 -29,9 -38,22 -9,12 -12,30 -9,53zm197 78l-25 -200 41 -5 10 88 71 -98 54 -7 -66 87 95 113 -52 6 -67 -87 -28 37 7 61 -40 5zm447 -55l-43 5 -23 -43 -80 10 -11 47 -43 5 53 -209 43 -5 104 190zm-83 -70l-37 -71 -18 77 55 -6z" />
                                <path class="fil42"
                                    d="M4333 8892l81 0c16,0 28,0 35,2 8,1 15,4 21,8 7,4 12,10 16,17 4,7 6,15 6,23 0,10 -2,18 -8,26 -5,8 -11,14 -20,18 12,3 21,9 28,18 7,9 10,19 10,30 0,10 -2,18 -6,27 -5,9 -11,16 -18,21 -7,5 -16,8 -27,9 -7,1 -23,2 -49,2l-69 0 0 -201zm41 33l0 46 27 0c15,0 25,0 29,0 7,-1 13,-3 17,-7 3,-4 5,-10 5,-16 0,-6 -1,-11 -5,-15 -3,-4 -8,-6 -15,-7 -4,-1 -16,-1 -35,-1l-23 0zm0 80l0 54 38 0c14,0 24,-1 28,-1 6,-1 11,-4 14,-8 4,-5 6,-10 6,-18 0,-6 -1,-11 -4,-15 -3,-4 -8,-7 -13,-9 -6,-2 -18,-3 -36,-3l-33 0zm163 88l0 -200 41 0 0 166 101 0 0 34 -142 0zm162 -100c0,-20 4,-37 10,-51 4,-10 10,-20 18,-28 8,-8 17,-14 26,-18 13,-5 27,-8 44,-8 29,0 53,9 71,28 18,18 27,44 27,77 0,32 -9,58 -27,76 -17,18 -41,27 -71,27 -30,0 -53,-9 -71,-27 -18,-18 -27,-43 -27,-76zm42 -1c0,23 6,40 16,52 11,12 24,18 40,18 16,0 30,-6 40,-18 11,-12 16,-29 16,-52 0,-24 -5,-41 -15,-52 -11,-11 -24,-17 -41,-17 -17,0 -30,6 -40,17 -11,12 -16,29 -16,52zm186 101l0 -201 41 0 0 89 82 -89 54 0 -76 78 80 123 -52 0 -56 -95 -32 34 0 61 -41 0zm280 -201l81 0c16,0 28,0 35,2 8,1 15,4 21,8 7,4 12,10 16,17 4,7 6,15 6,23 0,10 -2,18 -8,26 -5,8 -11,14 -20,18 12,3 21,9 28,18 7,9 10,19 10,30 0,10 -2,18 -6,27 -5,9 -11,16 -18,21 -7,5 -16,8 -27,9 -7,1 -23,2 -49,2l-69 0 0 -201zm41 33l0 46 27 0c15,0 25,0 29,0 7,-1 13,-3 16,-7 4,-4 6,-10 6,-16 0,-6 -1,-11 -5,-15 -3,-4 -8,-6 -15,-7 -4,-1 -16,-1 -35,-1l-23 0zm0 80l0 54 38 0c14,0 24,-1 28,-1 6,-1 11,-4 14,-8 4,-5 6,-10 6,-18 0,-6 -1,-11 -4,-15 -3,-4 -8,-7 -13,-9 -6,-2 -18,-3 -36,-3l-33 0z" />
                                <path class="fil42"
                                    d="M4283 10848l80 0c16,0 28,0 36,2 8,1 15,4 21,8 6,4 11,10 15,17 5,7 7,15 7,23 0,10 -3,18 -8,26 -5,8 -12,14 -21,18 13,3 22,9 29,18 6,9 9,19 9,31 0,9 -2,18 -6,26 -4,9 -10,16 -17,21 -8,5 -17,8 -28,10 -6,0 -23,1 -49,1l-68 0 0 -201zm41 33l0 47 26 0c16,0 26,-1 30,-1 7,-1 12,-3 16,-7 4,-4 6,-9 6,-16 0,-6 -2,-11 -5,-15 -4,-4 -9,-6 -15,-7 -4,-1 -16,-1 -35,-1l-23 0zm0 80l0 54 37 0c15,0 24,0 28,-1 6,-1 11,-4 15,-8 4,-5 6,-10 6,-17 0,-7 -2,-12 -5,-16 -3,-4 -7,-7 -13,-9 -5,-2 -17,-3 -36,-3l-32 0zm163 88l0 -200 41 0 0 166 100 0 0 34 -141 0zm162 -99c0,-21 3,-38 9,-52 5,-10 11,-20 19,-28 8,-8 16,-14 26,-18 12,-5 27,-8 43,-8 30,0 54,9 71,28 18,18 27,44 27,77 0,32 -9,58 -26,76 -18,18 -42,28 -71,28 -30,0 -54,-10 -72,-28 -17,-18 -26,-43 -26,-75zm42 -2c0,23 5,40 16,52 10,12 24,18 40,18 16,0 29,-6 40,-18 10,-11 15,-29 15,-52 0,-23 -5,-41 -15,-52 -10,-11 -23,-17 -40,-17 -17,0 -31,6 -41,17 -10,12 -15,29 -15,52zm185 101l0 -201 41 0 0 89 82 -89 55 0 -76 78 80 123 -53 0 -55 -95 -33 34 0 61 -41 0zm410 -74l39 12c-6,22 -16,38 -30,49 -14,11 -32,16 -54,16 -26,0 -48,-9 -66,-27 -17,-18 -25,-43 -25,-75 0,-33 8,-60 25,-78 18,-19 41,-28 69,-28 24,0 44,7 60,22 9,9 16,21 20,37l-40 10c-2,-11 -7,-19 -15,-25 -7,-6 -17,-9 -27,-9 -15,0 -27,5 -37,16 -9,11 -14,28 -14,52 0,25 5,44 14,54 9,11 21,16 36,16 11,0 20,-3 28,-10 8,-7 13,-17 17,-32z" />
                                <path class="fil42"
                                    d="M4544 13698l80 0c16,0 28,1 36,2 8,1 15,4 21,8 6,5 11,10 15,17 4,7 7,15 7,24 0,9 -3,18 -8,25 -5,8 -12,14 -21,18 13,4 22,10 29,18 6,9 9,19 9,31 0,9 -2,18 -6,26 -4,9 -10,16 -17,21 -8,5 -17,9 -28,10 -6,1 -23,1 -49,1l-68 0 0 -201zm41 33l0 47 26 0c16,0 26,0 30,-1 7,-1 12,-3 16,-7 4,-4 6,-9 6,-16 0,-6 -2,-11 -5,-15 -4,-4 -9,-6 -15,-7 -5,0 -16,-1 -35,-1l-23 0zm0 80l0 54 37 0c15,0 24,0 28,-1 6,-1 11,-4 15,-8 4,-4 6,-10 6,-17 0,-6 -2,-11 -5,-16 -3,-4 -7,-7 -13,-9 -5,-2 -17,-3 -36,-3l-32 0zm163 88l0 -199 41 0 0 165 100 0 0 34 -141 0zm162 -99c0,-21 3,-38 9,-52 5,-10 11,-19 19,-27 8,-9 16,-15 26,-19 12,-5 27,-8 43,-8 30,0 54,10 71,28 18,18 27,44 27,77 0,32 -9,58 -26,76 -18,19 -42,28 -71,28 -30,0 -54,-9 -72,-28 -17,-18 -26,-43 -26,-75zm42 -2c0,23 5,41 16,52 10,12 23,18 40,18 16,0 29,-6 40,-17 10,-12 15,-30 15,-53 0,-23 -5,-40 -15,-52 -10,-11 -23,-17 -40,-17 -17,0 -31,6 -41,17 -10,12 -15,29 -15,52zm185 101l0 -201 41 0 0 89 82 -89 55 0 -76 78 80 123 -53 0 -55 -94 -33 33 0 61 -41 0zm409 -74l40 12c-6,22 -16,39 -30,49 -14,11 -32,17 -54,17 -27,0 -48,-10 -66,-28 -17,-18 -26,-43 -26,-75 0,-33 9,-59 26,-78 18,-18 40,-28 69,-28 24,0 44,8 60,22 9,9 16,21 20,37l-40 10c-2,-10 -7,-19 -15,-25 -7,-6 -17,-9 -27,-9 -15,0 -27,6 -37,16 -9,11 -14,28 -14,52 0,26 5,44 14,55 9,10 21,16 36,16 11,0 20,-4 28,-11 7,-6 13,-17 16,-32z" />
                                <path class="fil43"
                                    d="M15600 7218l50 -193 27 -2 95 176 -27 3 -28 -54 -78 9 -14 58 -25 3zm44 -82l63 -7 -25 -49c-7,-15 -13,-27 -17,-37 -1,12 -3,25 -6,37l-15 56zm211 54l-5 -44 -80 9 -2 -21 71 -129 19 -2 13 119 25 -2 2 21 -25 2 5 44 -23 3zm-7 -65l-9 -83 -49 89 58 -6z" />
                                <path class="fil60"
                                    d="M4741 9455l0 -186 70 0c14,0 25,2 34,6 8,3 15,9 20,17 5,8 7,16 7,25 0,8 -2,15 -6,22 -4,7 -11,13 -20,17 12,3 20,9 26,17 6,8 9,17 9,28 0,9 -2,17 -5,24 -4,8 -8,13 -14,18 -5,4 -12,7 -20,9 -8,2 -18,3 -30,3l-71 0zm25 -108l40 0c11,0 19,-1 23,-2 7,-2 11,-5 14,-9 4,-5 5,-10 5,-17 0,-6 -1,-11 -4,-16 -3,-5 -7,-8 -13,-10 -5,-1 -15,-2 -28,-2l-37 0 0 56zm0 86l46 0c8,0 13,0 17,-1 5,-1 10,-3 14,-5 4,-2 7,-6 9,-10 3,-5 4,-10 4,-16 0,-7 -2,-13 -5,-18 -4,-5 -9,-9 -15,-11 -6,-2 -16,-3 -27,-3l-43 0 0 64zm226 22l-23 0 0 -146c-6,6 -13,11 -22,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 34,-22 9,-8 16,-17 20,-25l15 0 0 187zm177 -140l-23 1c-2,-9 -5,-15 -9,-19 -6,-7 -13,-10 -22,-10 -8,0 -14,2 -20,6 -7,5 -13,13 -17,23 -4,10 -6,24 -6,43 5,-8 12,-15 20,-19 8,-4 16,-6 25,-6 15,0 28,6 39,17 10,11 16,26 16,43 0,12 -3,23 -8,33 -5,10 -12,18 -20,23 -9,5 -19,8 -30,8 -19,0 -35,-7 -47,-21 -12,-14 -18,-37 -18,-69 0,-36 7,-62 20,-78 12,-15 27,-22 47,-22 15,0 27,4 36,13 9,8 15,19 17,34zm-94 80c0,8 2,15 5,22 4,7 8,13 14,17 6,3 13,5 19,5 10,0 18,-4 25,-11 7,-8 10,-19 10,-32 0,-13 -3,-23 -10,-30 -6,-8 -15,-12 -26,-12 -10,0 -19,4 -26,12 -7,7 -11,17 -11,29z" />
                                <path class="fil60"
                                    d="M4394 6543l0 -185 70 0c14,0 26,1 34,5 9,4 15,10 20,18 5,7 8,15 8,24 0,8 -3,15 -7,22 -4,7 -11,13 -19,17 11,4 20,9 26,17 6,8 9,18 9,28 0,9 -2,17 -6,25 -4,7 -8,13 -13,17 -6,4 -13,7 -21,9 -8,2 -18,3 -30,3l-71 0zm25 -107l40 0c11,0 19,-1 24,-3 6,-1 11,-5 14,-9 3,-4 5,-10 5,-16 0,-6 -2,-12 -5,-16 -3,-5 -7,-8 -13,-10 -5,-2 -15,-3 -28,-3l-37 0 0 57zm0 85l46 0c8,0 14,0 17,0 6,-1 10,-3 14,-6 4,-2 7,-5 10,-10 2,-4 3,-10 3,-16 0,-7 -1,-13 -5,-18 -4,-5 -9,-8 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm175 -78c-9,-4 -16,-9 -21,-15 -4,-7 -6,-14 -6,-23 0,-14 4,-25 14,-34 10,-10 23,-14 39,-14 16,0 29,4 39,14 10,9 15,21 15,34 0,9 -3,16 -7,23 -5,6 -11,11 -21,15 12,3 20,9 26,18 6,8 9,18 9,29 0,16 -5,29 -17,40 -11,11 -26,16 -44,16 -18,0 -33,-5 -44,-16 -11,-11 -17,-24 -17,-41 0,-12 3,-22 9,-30 6,-8 15,-14 26,-16zm-4 -39c0,9 3,16 8,21 6,6 13,9 22,9 9,0 16,-3 22,-9 6,-5 8,-12 8,-20 0,-8 -2,-15 -8,-21 -6,-6 -13,-9 -22,-9 -9,0 -16,3 -22,9 -5,5 -8,12 -8,20zm-8 86c0,6 2,12 5,19 3,6 8,10 14,14 6,3 12,5 19,5 11,0 20,-4 27,-11 7,-7 11,-16 11,-27 0,-11 -4,-20 -11,-27 -7,-7 -16,-11 -27,-11 -11,0 -20,4 -27,11 -7,7 -11,16 -11,27z" />
                                <path class="fil60"
                                    d="M14696 7317l50 -193 27 -3 96 177 -28 3 -28 -54 -77 9 -14 58 -26 3zm45 -82l62 -7 -24 -49c-8,-15 -14,-27 -18,-37 -1,12 -3,25 -6,37l-14 56zm133 13l23 -4c3,11 8,19 15,25 7,5 15,7 24,6 11,-1 20,-7 27,-16 6,-9 9,-20 8,-34 -2,-13 -7,-22 -15,-29 -8,-7 -17,-9 -29,-8 -8,1 -14,3 -19,7 -6,4 -10,9 -13,15l-22 -1 8 -97 91 -10 3 22 -74 8 -4 51c10,-9 21,-15 33,-16 17,-2 31,2 43,12 12,10 19,24 21,42 2,16 -1,31 -10,45 -10,16 -25,25 -46,27 -16,2 -31,-1 -42,-9 -12,-9 -19,-20 -22,-36z" />
                                <path class="fil60"
                                    d="M3848 9456l0 -185 70 0c14,0 26,2 34,5 9,4 15,10 20,18 5,7 8,16 8,24 0,8 -3,16 -7,23 -4,7 -11,12 -19,17 11,3 20,8 26,16 6,8 9,18 9,29 0,8 -2,16 -6,24 -4,7 -8,13 -13,17 -6,4 -13,7 -21,9 -8,2 -18,3 -30,3l-71 0zm25 -107l40 0c11,0 19,-1 24,-2 6,-2 11,-5 14,-10 3,-4 4,-9 4,-16 0,-6 -1,-12 -4,-16 -3,-5 -7,-8 -13,-10 -5,-2 -15,-3 -28,-3l-37 0 0 57zm0 86l46 0c8,0 14,-1 17,-1 6,-1 10,-3 14,-5 4,-3 7,-6 10,-11 2,-4 3,-10 3,-15 0,-7 -2,-13 -5,-19 -4,-5 -9,-8 -15,-10 -6,-2 -15,-3 -27,-3l-43 0 0 64zm226 21l-23 0 0 -145c-5,5 -13,11 -22,16 -8,5 -16,9 -24,12l0 -23c13,-5 24,-13 34,-21 9,-9 16,-17 20,-25l15 0 0 186zm60 -161l0 -22 120 0 0 18c-12,12 -24,29 -35,50 -12,21 -21,42 -27,64 -5,16 -8,33 -9,51l-23 0c0,-14 3,-32 8,-53 6,-20 14,-40 24,-60 10,-19 21,-35 33,-48l-91 0z" />
                                <path class="fil60"
                                    d="M3518 6543l0 -185 70 0c14,0 25,1 34,5 9,4 15,10 20,18 5,7 7,15 7,24 0,8 -2,15 -6,22 -4,7 -11,13 -19,17 11,4 19,9 25,17 6,8 10,18 10,28 0,9 -2,17 -6,25 -4,7 -8,13 -14,17 -5,4 -12,7 -20,9 -8,2 -18,3 -30,3l-71 0zm25 -107l40 0c11,0 19,-1 23,-3 7,-1 11,-5 15,-9 3,-4 4,-10 4,-16 0,-6 -1,-12 -4,-16 -3,-5 -7,-8 -13,-10 -5,-2 -15,-3 -28,-3l-37 0 0 57zm0 85l46 0c8,0 14,0 17,0 5,-1 10,-3 14,-6 4,-2 7,-5 9,-10 3,-4 4,-10 4,-16 0,-7 -2,-13 -5,-18 -4,-5 -9,-8 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm144 -21l21 -2c2,11 6,18 11,23 5,4 12,7 20,7 7,0 13,-2 19,-5 5,-3 9,-8 13,-13 3,-5 6,-13 8,-22 2,-9 3,-18 3,-28 0,-1 0,-2 0,-4 -4,7 -11,13 -18,17 -8,5 -17,7 -26,7 -15,0 -28,-5 -39,-17 -11,-11 -16,-25 -16,-44 0,-18 6,-34 17,-45 11,-11 25,-17 41,-17 12,0 23,3 34,10 10,6 17,15 22,27 5,12 8,30 8,53 0,23 -3,42 -8,56 -5,14 -12,25 -23,32 -10,8 -22,11 -35,11 -15,0 -27,-4 -36,-12 -9,-8 -15,-19 -16,-34zm93 -82c0,-13 -4,-23 -11,-31 -7,-7 -15,-11 -25,-11 -10,0 -19,4 -26,12 -8,8 -12,19 -12,32 0,12 4,22 11,29 7,7 16,11 26,11 11,0 20,-4 26,-11 7,-7 11,-18 11,-31z" />
                                <path class="fil60"
                                    d="M13819 7412l50 -192 27 -3 95 176 -27 3 -28 -53 -78 8 -14 58 -25 3zm44 -82l63 -6 -25 -50c-7,-14 -13,-27 -17,-37 -1,13 -3,25 -6,37l-15 56zm241 -90l-22 4c-3,-9 -7,-15 -11,-19 -7,-5 -15,-8 -24,-7 -7,1 -13,4 -18,8 -7,6 -11,15 -15,25 -3,10 -3,25 -1,43 4,-9 10,-15 18,-20 7,-5 15,-8 24,-9 15,-2 29,2 40,12 12,10 19,24 21,42 1,11 0,22 -4,33 -4,10 -10,19 -18,25 -8,6 -18,10 -29,11 -19,2 -35,-3 -48,-16 -14,-12 -22,-34 -26,-66 -4,-36 0,-63 12,-80 10,-16 24,-24 44,-26 14,-2 27,1 37,8 10,7 17,18 20,32zm-84 89c1,8 3,16 8,22 4,7 9,12 15,15 7,3 13,4 20,4 9,-1 17,-6 23,-15 6,-8 8,-19 7,-32 -1,-13 -6,-23 -13,-29 -8,-7 -17,-10 -27,-9 -11,2 -19,6 -25,14 -7,9 -9,19 -8,30z" />
                                <path class="fil60"
                                    d="M2941 9455l0 -186 70 0c14,0 26,2 34,6 9,3 16,9 20,17 5,8 8,16 8,25 0,8 -2,15 -7,22 -4,7 -11,13 -19,17 11,3 20,9 26,17 6,8 9,17 9,28 0,9 -2,17 -6,24 -3,8 -8,13 -13,18 -6,4 -13,7 -21,9 -8,2 -18,3 -30,3l-71 0zm25 -108l40 0c11,0 19,-1 24,-2 6,-2 11,-5 14,-9 3,-5 5,-10 5,-17 0,-6 -2,-11 -5,-16 -3,-5 -7,-8 -13,-10 -5,-1 -14,-2 -28,-2l-37 0 0 56zm0 86l46 0c8,0 14,0 17,-1 6,-1 10,-3 14,-5 4,-2 7,-6 10,-10 2,-5 3,-10 3,-16 0,-7 -1,-13 -5,-18 -4,-5 -8,-9 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm226 22l-23 0 0 -146c-5,6 -13,11 -21,16 -9,5 -17,9 -24,12l0 -22c12,-6 23,-13 33,-22 10,-8 16,-17 20,-25l15 0 0 187zm94 -101c-10,-3 -17,-8 -21,-15 -5,-6 -7,-14 -7,-23 0,-13 5,-25 14,-34 10,-9 23,-14 39,-14 16,0 29,5 39,14 10,10 15,21 15,35 0,8 -2,16 -7,22 -4,7 -11,12 -20,15 11,4 20,10 26,18 6,8 9,18 9,30 0,16 -6,29 -17,40 -12,11 -26,16 -45,16 -18,0 -33,-5 -44,-16 -11,-11 -17,-25 -17,-41 0,-12 3,-22 10,-30 6,-8 14,-14 26,-17zm-5 -39c0,9 3,16 9,22 5,6 13,8 22,8 9,0 16,-2 21,-8 6,-5 9,-12 9,-20 0,-9 -3,-16 -9,-21 -6,-6 -13,-9 -22,-9 -8,0 -16,3 -21,8 -6,6 -9,13 -9,20zm-7 86c0,7 1,13 4,19 3,6 8,11 14,14 6,4 13,5 20,5 11,0 20,-3 27,-10 7,-7 10,-16 10,-27 0,-11 -3,-20 -11,-27 -7,-7 -16,-11 -27,-11 -11,0 -20,4 -27,11 -7,7 -10,16 -10,26z" />
                                <path class="fil60"
                                    d="M2548 6543l0 -185 70 0c14,0 26,1 34,5 9,4 15,10 20,18 5,7 8,15 8,24 0,8 -3,15 -7,22 -4,7 -11,13 -19,17 11,4 20,9 26,17 6,8 9,18 9,28 0,9 -2,17 -6,25 -4,7 -8,13 -13,17 -6,4 -13,7 -21,9 -8,2 -18,3 -30,3l-71 0zm25 -107l40 0c11,0 19,-1 24,-3 6,-1 11,-5 14,-9 3,-4 4,-10 4,-16 0,-6 -1,-12 -4,-16 -3,-5 -7,-8 -13,-10 -5,-2 -15,-3 -28,-3l-37 0 0 57zm0 85l46 0c8,0 14,0 17,0 6,-1 10,-3 14,-6 4,-2 7,-5 10,-10 2,-4 3,-10 3,-16 0,-7 -2,-13 -5,-18 -4,-5 -9,-8 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm226 22l-23 0 0 -145c-5,5 -13,10 -22,16 -8,5 -16,9 -24,11l0 -22c13,-6 24,-13 34,-21 9,-9 16,-17 20,-25l15 0 0 186zm59 -91c0,-22 2,-40 6,-53 5,-14 12,-24 20,-31 9,-8 20,-11 34,-11 10,0 19,2 26,6 8,4 14,10 19,17 5,8 8,17 11,28 3,11 4,25 4,44 0,21 -2,39 -6,52 -5,14 -11,24 -20,31 -9,8 -20,11 -34,11 -18,0 -32,-6 -42,-19 -12,-15 -18,-41 -18,-75zm23 0c0,30 3,51 11,61 7,10 16,15 26,15 10,0 19,-5 26,-15 8,-11 11,-31 11,-61 0,-31 -3,-51 -11,-61 -7,-10 -16,-15 -26,-15 -11,0 -19,4 -25,13 -8,11 -12,32 -12,63z" />
                                <path class="fil60"
                                    d="M12925 7511l51 -192 27 -3 95 176 -28 3 -27 -53 -78 8 -14 58 -26 3zm45 -82l63 -6 -25 -49c-8,-15 -13,-28 -17,-38 -2,13 -4,25 -7,37l-14 56zm122 -99l-2 -21 119 -13 2 17c-10,14 -20,32 -30,54 -9,22 -15,44 -19,67 -3,16 -4,33 -4,52l-23 2c-1,-14 0,-32 3,-53 3,-22 9,-42 17,-63 8,-20 17,-37 27,-52l-90 10z" />
                                <path class="fil60"
                                    d="M2054 9455l0 -186 70 0c14,0 26,2 34,6 9,3 15,9 20,17 5,8 8,16 8,25 0,8 -3,15 -7,22 -4,7 -11,13 -19,17 11,3 20,9 26,17 6,8 9,17 9,28 0,9 -2,17 -6,24 -4,8 -8,13 -13,18 -6,4 -13,7 -21,9 -8,2 -18,3 -30,3l-71 0zm25 -108l40 0c11,0 19,-1 24,-2 6,-2 11,-5 14,-9 3,-5 4,-10 4,-17 0,-6 -1,-11 -4,-16 -3,-5 -7,-8 -13,-10 -5,-1 -15,-2 -28,-2l-37 0 0 56zm0 86l46 0c8,0 14,0 17,-1 6,-1 10,-3 14,-5 4,-2 7,-6 10,-10 2,-5 3,-10 3,-16 0,-7 -2,-13 -5,-18 -4,-5 -9,-9 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm226 22l-23 0 0 -146c-5,6 -13,11 -22,16 -8,5 -16,9 -24,12l0 -22c13,-6 24,-13 34,-22 9,-8 16,-17 20,-25l15 0 0 187zm62 -43l22 -2c2,10 5,18 10,22 6,5 12,7 20,7 7,0 14,-1 19,-5 5,-3 10,-7 13,-12 3,-6 6,-13 8,-22 3,-9 4,-19 4,-28 0,-1 0,-3 0,-5 -5,8 -11,14 -19,18 -8,5 -16,7 -26,7 -15,0 -28,-6 -39,-17 -10,-11 -15,-26 -15,-44 0,-19 5,-34 16,-45 11,-12 25,-18 42,-18 12,0 23,4 33,10 10,7 17,16 23,28 5,12 7,29 7,52 0,24 -2,43 -7,57 -5,14 -13,25 -23,32 -10,7 -22,11 -36,11 -14,0 -26,-4 -36,-12 -9,-8 -14,-20 -16,-34zm93 -82c0,-13 -3,-24 -10,-31 -7,-8 -16,-12 -25,-12 -11,0 -19,4 -27,13 -7,8 -11,19 -11,32 0,12 3,21 10,28 8,8 16,12 27,12 10,0 19,-4 26,-12 7,-7 10,-17 10,-30z" />
                                <path class="fil60"
                                    d="M1666 6545l0 -186 69 0c15,0 26,2 35,6 8,3 15,9 20,17 5,8 7,16 7,25 0,8 -2,15 -7,22 -4,7 -10,13 -19,17 11,3 20,9 26,17 6,8 9,17 9,28 0,9 -2,17 -6,24 -3,8 -8,13 -13,17 -6,5 -12,8 -20,10 -9,2 -19,3 -30,3l-71 0zm24 -108l41 0c10,0 18,-1 23,-2 6,-2 11,-5 14,-9 3,-5 5,-10 5,-17 0,-6 -2,-11 -5,-16 -3,-5 -7,-8 -12,-10 -6,-1 -15,-2 -29,-2l-37 0 0 56zm0 86l47 0c8,0 13,0 16,-1 6,-1 11,-3 15,-5 3,-2 6,-6 9,-10 2,-5 4,-10 4,-16 0,-7 -2,-13 -6,-18 -3,-5 -8,-9 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm226 22l-23 0 0 -146c-5,6 -12,11 -21,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 33,-22 10,-8 17,-17 21,-25l14 0 0 187zm125 0l-23 0 0 -146c-5,6 -12,11 -21,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 33,-22 10,-8 17,-17 21,-25l14 0 0 187z" />
                                <path class="fil43"
                                    d="M12008 7611l51 -192 27 -3 95 176 -28 3 -27 -54 -78 9 -14 58 -26 3zm45 -82l63 -7 -25 -49c-7,-15 -13,-27 -17,-37 -1,13 -3,25 -6,37l-15 56zm163 -42c-10,-2 -18,-7 -23,-12 -5,-6 -8,-14 -9,-23 -2,-13 2,-25 10,-35 9,-10 21,-16 37,-18 17,-2 30,2 41,10 11,8 17,19 18,32 1,9 0,17 -4,24 -4,6 -10,12 -19,16 12,3 21,8 28,15 7,8 11,18 12,29 2,16 -2,30 -12,42 -10,11 -24,18 -43,20 -18,2 -33,-1 -45,-11 -13,-9 -20,-22 -22,-38 -1,-12 1,-23 6,-32 6,-8 14,-15 25,-19zm-9 -38c1,9 4,16 11,21 6,5 13,7 22,6 9,-1 16,-5 21,-11 5,-6 7,-13 6,-21 -1,-9 -4,-15 -11,-20 -6,-5 -14,-7 -22,-6 -9,1 -16,4 -21,10 -5,6 -7,13 -6,21zm2 86c0,7 3,13 6,18 4,6 9,10 15,13 7,3 14,4 20,3 11,-1 20,-6 26,-14 6,-7 9,-16 8,-27 -1,-11 -6,-20 -14,-26 -8,-6 -17,-9 -28,-8 -11,1 -20,6 -26,14 -6,7 -8,17 -7,27z" />
                                <path class="fil60"
                                    d="M1172 9455l0 -186 69 0c15,0 26,2 34,6 9,3 16,9 21,17 4,8 7,16 7,25 0,8 -2,15 -7,22 -4,7 -10,13 -19,17 11,3 20,9 26,17 6,8 9,17 9,28 0,9 -2,17 -6,24 -3,8 -8,13 -13,18 -6,4 -12,7 -21,9 -8,2 -18,3 -30,3l-70 0zm24 -108l40 0c11,0 19,-1 24,-2 6,-2 11,-5 14,-9 3,-5 5,-10 5,-17 0,-6 -2,-11 -5,-16 -3,-5 -7,-8 -12,-10 -6,-1 -15,-2 -29,-2l-37 0 0 56zm0 86l47 0c7,0 13,0 16,-1 6,-1 11,-3 14,-5 4,-2 7,-6 10,-10 2,-5 4,-10 4,-16 0,-7 -2,-13 -6,-18 -3,-5 -8,-9 -15,-11 -6,-2 -15,-3 -27,-3l-43 0 0 64zm260 0l0 22 -123 0c0,-6 1,-11 3,-16 3,-8 8,-17 15,-25 7,-8 17,-17 30,-28 20,-16 34,-29 41,-39 7,-10 11,-19 11,-28 0,-9 -4,-16 -10,-22 -7,-7 -15,-10 -26,-10 -11,0 -19,4 -26,10 -7,7 -10,16 -10,27l-23 -2c1,-17 7,-31 18,-40 10,-9 24,-14 42,-14 18,0 32,5 42,15 11,10 16,22 16,37 0,7 -2,15 -5,22 -3,7 -8,15 -15,23 -7,8 -19,18 -35,32 -14,12 -22,20 -26,24 -4,4 -7,8 -10,12l91 0zm25 -70c0,-22 2,-39 7,-53 4,-13 11,-24 20,-31 9,-7 20,-11 33,-11 10,0 19,2 26,6 8,4 14,10 19,18 5,7 9,16 11,27 3,11 5,26 5,44 0,22 -3,40 -7,53 -4,13 -11,24 -20,31 -9,7 -20,11 -34,11 -18,0 -32,-6 -42,-19 -12,-16 -18,-41 -18,-76zm23 0c0,31 4,51 11,61 7,10 16,15 26,15 11,0 20,-5 27,-15 7,-10 10,-30 10,-61 0,-30 -3,-51 -10,-61 -7,-10 -16,-15 -27,-15 -10,0 -19,5 -25,14 -8,11 -12,32 -12,62z" />
                                <path class="fil43"
                                    d="M1372 11358l25 6c-5,20 -14,36 -28,46 -13,11 -29,16 -49,16 -20,0 -36,-4 -49,-12 -12,-8 -22,-20 -28,-35 -7,-16 -10,-32 -10,-50 0,-19 4,-36 11,-51 8,-14 18,-25 32,-32 13,-8 28,-12 45,-12 18,0 34,5 46,14 13,10 22,23 27,40l-24 6c-4,-13 -11,-23 -19,-29 -8,-7 -18,-10 -31,-10 -14,0 -26,4 -35,11 -10,6 -17,16 -21,27 -4,12 -5,24 -5,36 0,16 2,29 6,41 5,12 12,21 22,26 9,6 20,9 31,9 14,0 26,-4 35,-12 10,-8 16,-19 19,-35zm50 22l21 -2c2,11 6,18 11,23 5,4 12,7 20,7 7,0 13,-2 19,-5 5,-3 9,-8 13,-13 3,-6 6,-13 8,-22 2,-9 4,-18 4,-28 0,-1 -1,-2 -1,-4 -4,7 -10,13 -18,17 -8,5 -17,7 -26,7 -15,0 -28,-5 -39,-17 -10,-11 -16,-25 -16,-44 0,-19 6,-34 17,-45 11,-12 25,-17 42,-17 12,0 23,3 33,9 10,7 17,16 22,28 6,12 8,30 8,52 0,24 -2,43 -7,57 -6,14 -13,25 -23,32 -11,8 -23,11 -36,11 -15,0 -27,-4 -36,-12 -9,-8 -14,-19 -16,-34zm93 -82c0,-13 -4,-23 -11,-31 -6,-8 -15,-11 -25,-11 -10,0 -19,4 -26,12 -8,8 -11,19 -11,32 0,12 3,21 10,29 7,7 16,11 27,11 10,0 19,-4 26,-11 6,-8 10,-18 10,-31z" />
                                <path class="fil43"
                                    d="M1241 14245l24 7c-5,20 -14,35 -28,46 -13,10 -29,16 -49,16 -19,0 -36,-4 -48,-12 -13,-9 -22,-20 -29,-36 -6,-15 -10,-32 -10,-50 0,-19 4,-36 11,-50 8,-15 18,-26 32,-33 14,-7 29,-11 45,-11 18,0 34,5 47,14 12,9 21,23 26,40l-24 6c-4,-14 -11,-24 -19,-30 -8,-6 -18,-9 -31,-9 -14,0 -26,3 -35,10 -10,7 -17,16 -20,28 -4,11 -6,23 -6,35 0,16 2,30 7,42 4,11 11,20 21,26 10,6 20,9 31,9 14,0 26,-4 35,-12 10,-8 16,-20 20,-36zm165 44l0 22 -123 0c0,-6 1,-11 3,-16 3,-9 8,-17 15,-25 7,-8 17,-17 30,-28 20,-16 34,-30 41,-39 7,-10 11,-19 11,-28 0,-9 -4,-16 -10,-23 -7,-6 -15,-9 -26,-9 -11,0 -19,3 -26,10 -7,6 -10,16 -10,27l-23 -2c1,-18 7,-31 18,-40 10,-9 24,-14 42,-14 18,0 32,5 42,15 11,10 16,22 16,37 0,7 -2,15 -5,22 -3,7 -8,14 -15,22 -7,8 -19,19 -35,33 -14,12 -23,19 -26,23 -4,5 -7,9 -10,13l91 0zm110 22l-22 0 0 -146c-6,6 -13,11 -22,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 33,-22 10,-9 17,-17 21,-25l14 0 0 187z" />
                                <path class="fil43"
                                    d="M9273 14245l24 7c-5,20 -14,35 -28,46 -13,10 -29,16 -49,16 -19,0 -36,-4 -48,-12 -13,-9 -22,-20 -29,-36 -6,-15 -10,-32 -10,-50 0,-19 4,-36 11,-50 8,-15 18,-26 32,-33 14,-7 29,-11 45,-11 18,0 34,5 47,14 12,9 21,23 26,40l-24 6c-4,-14 -11,-24 -19,-30 -8,-6 -18,-9 -31,-9 -14,0 -26,3 -35,10 -10,7 -17,16 -20,28 -4,11 -6,23 -6,35 0,16 2,30 7,42 4,11 11,20 21,26 10,6 20,9 31,9 14,0 26,-4 35,-12 10,-8 16,-20 20,-36zm131 66l-23 0 0 -146c-5,6 -12,11 -21,16 -9,5 -17,9 -24,12l0 -22c12,-6 24,-13 33,-22 10,-9 16,-17 20,-25l15 0 0 187zm178 -22l0 22 -123 0c0,-6 1,-11 3,-16 3,-9 8,-17 15,-25 7,-8 17,-17 30,-28 20,-16 34,-30 41,-39 7,-10 11,-19 11,-28 0,-9 -4,-16 -10,-23 -6,-6 -15,-9 -25,-9 -11,0 -20,3 -27,10 -6,6 -10,16 -10,27l-23 -2c1,-18 7,-31 18,-40 10,-9 24,-14 42,-14 18,0 32,5 42,15 11,10 16,22 16,37 0,7 -1,15 -5,22 -3,7 -8,14 -15,22 -7,8 -18,19 -35,33 -13,12 -22,19 -26,23 -4,5 -7,9 -10,13l91 0z" />
                                <path class="fil43"
                                    d="M2256 11358l24 6c-5,20 -14,36 -28,46 -13,11 -29,16 -49,16 -19,0 -36,-4 -48,-12 -13,-8 -22,-20 -29,-35 -6,-16 -10,-32 -10,-50 0,-19 4,-36 11,-51 8,-14 18,-25 32,-32 14,-8 29,-12 45,-12 18,0 34,5 47,14 12,10 21,23 26,40l-24 6c-4,-13 -11,-23 -19,-29 -8,-7 -18,-10 -31,-10 -14,0 -26,4 -35,11 -10,6 -17,16 -20,27 -4,12 -6,24 -6,36 0,16 2,29 7,41 4,12 11,21 21,26 10,6 20,9 31,9 14,0 26,-4 35,-12 10,-8 16,-19 20,-35zm81 -36c-10,-3 -17,-8 -21,-14 -5,-7 -7,-15 -7,-23 0,-14 5,-25 14,-35 10,-9 23,-13 39,-13 16,0 29,4 39,14 10,9 15,21 15,34 0,9 -2,16 -7,23 -4,6 -11,11 -20,14 11,4 20,10 26,18 5,9 8,19 8,30 0,16 -5,29 -16,40 -12,11 -26,16 -45,16 -18,0 -33,-5 -44,-16 -11,-11 -17,-24 -17,-41 0,-12 3,-22 9,-30 7,-8 15,-14 27,-17zm-5 -38c0,9 3,16 9,21 5,6 13,9 22,9 8,0 16,-3 21,-9 6,-5 9,-12 9,-20 0,-8 -3,-15 -9,-21 -6,-6 -13,-9 -22,-9 -8,0 -16,3 -21,9 -6,5 -9,12 -9,20zm-7 86c0,6 1,12 4,18 3,7 8,11 14,15 6,3 13,5 20,5 11,0 20,-4 27,-11 7,-7 10,-16 10,-27 0,-11 -4,-20 -11,-27 -7,-7 -16,-11 -27,-11 -11,0 -20,4 -27,11 -7,7 -10,16 -10,27z" />
                                <path class="fil43"
                                    d="M2113 14245l24 7c-5,20 -14,35 -28,46 -13,10 -29,16 -49,16 -19,0 -36,-4 -48,-12 -13,-9 -22,-20 -29,-36 -6,-15 -10,-32 -10,-50 0,-19 4,-36 11,-50 8,-15 18,-26 32,-33 14,-7 29,-11 45,-11 18,0 34,5 47,14 12,9 21,23 26,40l-24 6c-4,-14 -11,-24 -19,-30 -8,-6 -18,-9 -31,-9 -14,0 -26,3 -35,10 -10,7 -17,16 -20,28 -4,11 -6,23 -6,35 0,16 2,30 7,42 4,11 11,20 21,26 10,6 20,9 31,9 14,0 26,-4 35,-12 10,-8 16,-20 20,-36zm165 44l0 22 -123 0c0,-6 1,-11 3,-16 3,-9 8,-17 15,-25 7,-8 17,-17 30,-28 20,-16 34,-30 41,-39 7,-10 11,-19 11,-28 0,-9 -4,-16 -10,-23 -7,-6 -15,-9 -26,-9 -11,0 -19,3 -26,10 -7,6 -10,16 -10,27l-23 -2c1,-18 7,-31 18,-40 10,-9 24,-14 42,-14 18,0 32,5 42,15 11,10 16,22 16,37 0,7 -2,15 -5,22 -3,7 -8,14 -15,22 -7,8 -19,19 -35,33 -14,12 -23,19 -26,23 -4,5 -7,9 -10,13l91 0zm25 -70c0,-22 2,-40 7,-53 4,-13 11,-24 20,-31 9,-7 20,-11 33,-11 10,0 19,2 26,6 8,4 14,10 19,18 5,7 9,16 11,27 3,11 5,26 5,44 0,22 -3,39 -7,53 -5,13 -11,24 -20,31 -9,7 -20,11 -34,11 -18,0 -32,-7 -42,-19 -12,-16 -18,-41 -18,-76zm23 0c0,31 4,51 11,61 7,10 16,15 26,15 11,0 19,-5 27,-15 7,-10 10,-30 10,-61 0,-30 -3,-51 -10,-61 -7,-10 -16,-15 -27,-15 -11,0 -19,5 -25,13 -8,12 -12,33 -12,63z" />
                                <path class="fil43"
                                    d="M10213 14245l24 7c-5,20 -14,35 -27,46 -14,10 -30,16 -49,16 -20,0 -37,-4 -49,-12 -13,-9 -22,-20 -29,-36 -6,-15 -10,-32 -10,-50 0,-19 4,-36 12,-50 7,-15 17,-26 31,-33 14,-7 29,-11 45,-11 19,0 34,5 47,14 12,9 21,23 26,40l-24 6c-4,-14 -10,-24 -19,-30 -8,-6 -18,-9 -30,-9 -15,0 -27,3 -36,10 -10,7 -16,16 -20,28 -4,11 -6,23 -6,35 0,16 2,30 7,42 4,11 12,20 21,26 10,6 20,9 32,9 13,0 25,-4 34,-12 10,-8 16,-20 20,-36zm131 66l-23 0 0 -146c-5,6 -12,11 -21,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 33,-22 10,-9 17,-17 21,-25l14 0 0 187zm125 0l-23 0 0 -146c-5,6 -12,11 -21,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 33,-22 10,-9 17,-17 21,-25l14 0 0 187z" />
                                <path class="fil43"
                                    d="M3143 11358l25 6c-6,20 -15,36 -28,46 -14,11 -30,16 -49,16 -20,0 -36,-4 -49,-12 -12,-8 -22,-20 -28,-35 -7,-16 -10,-32 -10,-50 0,-19 3,-36 11,-51 7,-14 18,-25 31,-32 14,-8 29,-12 45,-12 19,0 34,5 47,14 13,10 22,23 26,40l-24 6c-4,-13 -10,-23 -18,-29 -9,-7 -19,-10 -31,-10 -14,0 -26,4 -36,11 -9,6 -16,16 -20,27 -4,12 -6,24 -6,36 0,16 2,29 7,41 5,12 12,21 21,26 10,6 21,9 32,9 14,0 25,-4 35,-12 9,-8 16,-19 19,-35zm47 -96l0 -22 120 0 0 17c-12,13 -23,30 -35,51 -11,20 -20,42 -27,64 -4,16 -7,33 -9,51l-23 0c0,-14 3,-32 9,-53 5,-21 13,-41 23,-60 11,-19 21,-35 33,-48l-91 0z" />
                                <path class="fil43"
                                    d="M3011 14245l24 7c-5,20 -14,35 -27,46 -14,10 -30,16 -49,16 -20,0 -37,-4 -49,-13 -13,-8 -22,-19 -29,-35 -6,-15 -10,-32 -10,-50 0,-19 4,-36 12,-50 7,-15 17,-26 31,-33 14,-7 29,-11 45,-11 19,0 34,5 47,14 12,9 21,23 26,40l-24 6c-4,-14 -10,-24 -19,-30 -8,-6 -18,-9 -30,-9 -15,0 -27,3 -36,10 -10,7 -16,16 -20,28 -4,11 -6,23 -6,35 0,16 2,30 7,42 4,11 11,20 21,26 10,6 20,9 32,9 13,0 25,-4 34,-12 10,-8 16,-20 20,-36zm131 66l-23 0 0 -146c-5,6 -12,11 -21,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 33,-22 10,-9 17,-17 21,-25l14 0 0 187zm62 -43l22 -2c2,10 5,17 11,22 5,5 12,7 20,7 7,0 13,-2 18,-5 6,-3 10,-7 13,-13 4,-5 6,-12 9,-21 2,-10 3,-19 3,-28 0,-1 0,-3 0,-5 -5,7 -11,13 -19,18 -8,4 -16,7 -25,7 -16,0 -29,-6 -39,-17 -11,-11 -16,-26 -16,-44 0,-19 5,-34 17,-46 11,-11 24,-17 41,-17 12,0 23,3 33,10 10,6 18,16 23,28 5,12 8,29 8,52 0,24 -3,43 -8,57 -5,14 -13,24 -23,32 -10,7 -22,11 -36,11 -14,0 -26,-4 -35,-12 -9,-8 -15,-20 -17,-34zm93 -82c0,-13 -3,-24 -10,-31 -7,-8 -15,-12 -25,-12 -10,0 -19,4 -27,12 -7,9 -11,19 -11,33 0,11 4,21 11,28 7,8 16,11 26,11 11,0 19,-3 26,-11 7,-7 10,-17 10,-30z" />
                                <path class="fil43"
                                    d="M11082 14245l25 7c-6,20 -15,35 -28,46 -13,10 -30,16 -49,16 -20,0 -36,-4 -49,-12 -12,-9 -22,-20 -28,-36 -7,-15 -10,-32 -10,-50 0,-19 3,-36 11,-50 7,-15 18,-26 31,-33 14,-7 29,-11 45,-11 19,0 34,5 47,14 13,9 22,23 26,40l-24 6c-4,-14 -10,-24 -18,-30 -9,-6 -19,-9 -31,-9 -14,0 -26,3 -36,10 -9,7 -16,16 -20,28 -4,11 -6,23 -6,35 0,16 2,30 7,42 5,11 12,20 21,26 10,6 21,9 32,9 14,0 25,-4 35,-12 9,-8 16,-20 19,-36zm132 66l-23 0 0 -146c-6,6 -13,11 -22,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 33,-22 10,-9 17,-17 21,-25l15 0 0 187zm58 -92c0,-22 2,-40 7,-53 4,-13 11,-24 20,-31 9,-7 20,-11 34,-11 10,0 18,2 26,6 7,4 14,10 18,18 5,7 9,16 12,27 3,11 4,26 4,44 0,22 -2,39 -7,53 -4,13 -11,24 -20,31 -9,7 -20,11 -33,11 -18,0 -32,-7 -43,-19 -12,-16 -18,-41 -18,-76zm23 0c0,31 4,51 11,61 7,10 16,15 27,15 10,0 19,-5 26,-15 7,-10 11,-30 11,-61 0,-30 -4,-51 -11,-61 -7,-10 -16,-15 -27,-15 -10,0 -19,5 -25,13 -8,12 -12,33 -12,63z" />
                                <path class="fil43"
                                    d="M4049 11358l25 6c-5,20 -14,36 -28,46 -13,11 -29,16 -49,16 -20,0 -36,-4 -48,-12 -13,-8 -22,-20 -29,-35 -7,-16 -10,-32 -10,-50 0,-19 4,-36 11,-51 8,-14 18,-25 32,-32 13,-8 28,-12 45,-12 18,0 34,5 47,14 12,10 21,23 26,40l-24 6c-4,-13 -11,-23 -19,-29 -8,-7 -18,-10 -31,-10 -14,0 -26,4 -35,11 -10,6 -17,16 -21,27 -3,12 -5,24 -5,36 0,16 2,29 6,41 5,12 12,21 22,26 10,6 20,9 31,9 14,0 26,-4 35,-12 10,-8 16,-19 19,-35zm165 -75l-23 2c-2,-9 -5,-16 -8,-20 -6,-6 -14,-10 -23,-10 -8,0 -14,2 -20,6 -7,6 -12,13 -17,23 -4,10 -6,25 -6,43 5,-8 12,-14 20,-18 8,-4 16,-6 25,-6 15,0 28,5 39,16 11,12 16,26 16,44 0,11 -2,22 -7,32 -6,10 -12,18 -21,23 -9,6 -19,8 -30,8 -19,0 -35,-7 -47,-21 -12,-14 -18,-37 -18,-69 0,-36 7,-62 20,-78 12,-14 27,-21 47,-21 15,0 27,4 36,12 9,8 15,19 17,34zm-93 80c0,8 1,15 5,23 3,7 8,12 14,16 5,4 12,6 18,6 10,0 19,-4 25,-12 7,-8 11,-18 11,-32 0,-13 -4,-23 -10,-30 -7,-8 -16,-11 -26,-11 -11,0 -19,3 -27,11 -7,7 -10,17 -10,29z" />
                                <path class="fil43"
                                    d="M3927 14245l25 7c-5,20 -14,35 -28,46 -13,10 -30,16 -49,16 -20,0 -36,-4 -49,-12 -12,-9 -22,-20 -28,-36 -7,-15 -10,-32 -10,-50 0,-19 4,-36 11,-50 7,-15 18,-26 32,-33 13,-7 28,-11 45,-11 18,0 34,5 46,14 13,9 22,23 27,40l-24 6c-5,-14 -11,-24 -19,-30 -8,-6 -18,-9 -31,-9 -14,0 -26,3 -36,10 -9,7 -16,16 -20,28 -4,11 -6,23 -6,35 0,16 3,30 7,42 5,11 12,20 22,26 9,6 20,9 31,9 14,0 25,-4 35,-12 9,-8 16,-20 19,-36zm132 66l-23 0 0 -146c-6,6 -13,11 -22,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 34,-22 9,-9 16,-17 20,-25l15 0 0 187zm94 -101c-10,-4 -17,-8 -21,-15 -5,-6 -7,-14 -7,-23 0,-13 5,-25 14,-34 10,-9 23,-14 39,-14 16,0 29,5 39,14 10,10 15,21 15,35 0,8 -2,16 -7,22 -4,7 -11,11 -20,15 11,4 20,10 25,18 6,8 9,18 9,30 0,15 -5,29 -16,40 -12,10 -26,16 -45,16 -18,0 -33,-6 -44,-17 -11,-10 -17,-24 -17,-40 0,-12 3,-22 9,-30 7,-9 15,-14 27,-17zm-5 -39c0,9 3,16 8,22 6,5 13,8 23,8 8,0 16,-3 21,-8 6,-6 8,-12 8,-20 0,-9 -2,-16 -8,-22 -6,-5 -13,-8 -22,-8 -9,0 -16,3 -21,8 -6,6 -9,12 -9,20zm-7 86c0,7 1,13 4,19 3,6 8,11 14,14 6,3 12,5 19,5 11,0 20,-3 27,-10 7,-7 11,-16 11,-27 0,-11 -4,-20 -11,-27 -7,-8 -16,-11 -27,-11 -11,0 -20,3 -27,10 -7,8 -10,16 -10,27z" />
                                <path class="fil43"
                                    d="M4942 11358l24 6c-5,20 -14,36 -27,46 -14,11 -30,16 -49,16 -20,0 -37,-4 -49,-12 -13,-8 -22,-20 -29,-35 -6,-16 -10,-32 -10,-50 0,-19 4,-36 11,-51 8,-14 18,-25 32,-32 14,-8 29,-12 45,-12 18,0 34,5 47,14 12,10 21,23 26,40l-24 6c-4,-13 -11,-23 -19,-29 -8,-7 -18,-10 -31,-10 -14,0 -26,4 -35,11 -10,6 -17,16 -20,27 -4,12 -6,24 -6,36 0,16 2,29 7,41 4,12 11,21 21,26 10,6 20,9 31,9 14,0 26,-4 35,-12 10,-8 16,-19 20,-35zm46 16l23 -1c2,11 6,20 13,26 6,6 14,9 23,9 11,0 21,-5 28,-13 8,-8 11,-19 11,-33 0,-13 -3,-23 -10,-31 -8,-7 -17,-11 -29,-11 -7,0 -14,2 -20,5 -6,4 -10,8 -14,13l-21 -3 18 -95 92 0 0 22 -74 0 -10 50c11,-8 23,-12 35,-12 16,0 30,6 41,17 11,11 17,25 17,43 0,17 -5,31 -15,44 -12,15 -28,22 -49,22 -17,0 -30,-5 -41,-14 -11,-9 -17,-22 -18,-38z" />
                                <path class="fil43"
                                    d="M4817 14245l25 7c-5,20 -15,35 -28,46 -13,10 -30,16 -49,16 -20,0 -36,-4 -49,-12 -12,-9 -22,-20 -28,-36 -7,-15 -10,-32 -10,-50 0,-19 4,-36 11,-50 7,-15 18,-26 31,-33 14,-7 29,-11 45,-11 19,0 35,5 47,14 13,9 22,23 27,40l-24 6c-5,-14 -11,-24 -19,-30 -8,-6 -19,-9 -31,-9 -14,0 -26,3 -36,10 -9,7 -16,16 -20,28 -4,11 -6,23 -6,35 0,16 3,30 7,42 5,11 12,20 22,26 9,6 20,9 31,9 14,0 25,-4 35,-12 9,-8 16,-20 19,-36zm132 66l-23 0 0 -146c-6,6 -13,11 -22,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 34,-22 9,-9 16,-17 20,-25l15 0 0 187zm60 -162l0 -22 120 0 0 18c-12,12 -24,29 -35,50 -12,21 -21,42 -27,65 -5,15 -8,32 -9,51l-23 0c0,-15 3,-33 8,-53 6,-21 13,-41 24,-60 10,-20 21,-36 32,-49l-90 0z" />
                                <path class="fil43"
                                    d="M5855 11358l24 6c-5,20 -14,36 -27,46 -14,11 -30,16 -50,16 -19,0 -36,-4 -48,-12 -13,-8 -22,-20 -29,-35 -6,-16 -10,-32 -10,-50 0,-19 4,-36 11,-51 8,-14 18,-25 32,-32 14,-8 29,-12 45,-12 18,0 34,5 47,14 12,10 21,23 26,40l-24 6c-4,-13 -11,-23 -19,-29 -8,-7 -18,-10 -31,-10 -14,0 -26,4 -35,11 -10,6 -17,16 -20,27 -4,12 -6,24 -6,36 0,16 2,29 7,41 4,12 11,21 21,26 10,6 20,9 31,9 14,0 26,-4 35,-12 10,-8 16,-19 20,-35zm118 65l0 -44 -80 0 0 -21 85 -121 18 0 0 121 25 0 0 21 -25 0 0 44 -23 0zm0 -65l0 -84 -58 84 58 0z" />
                                <path class="fil43"
                                    d="M5689 14245l24 7c-5,20 -14,35 -27,46 -14,10 -30,16 -49,16 -20,0 -37,-4 -49,-12 -13,-9 -22,-20 -29,-36 -6,-15 -10,-32 -10,-50 0,-19 4,-36 11,-50 8,-15 18,-26 32,-33 14,-7 29,-11 45,-11 19,0 34,5 47,14 12,9 21,23 26,40l-24 6c-4,-14 -10,-24 -19,-30 -8,-6 -18,-9 -30,-9 -15,0 -27,3 -36,10 -10,7 -16,16 -20,28 -4,11 -6,23 -6,35 0,16 2,30 7,42 4,11 11,20 21,26 10,6 20,9 32,9 13,0 25,-4 34,-12 10,-8 16,-20 20,-36zm131 66l-23 0 0 -146c-5,6 -12,11 -21,16 -9,5 -17,9 -24,12l0 -22c12,-6 24,-13 33,-22 10,-9 17,-17 21,-25l14 0 0 187zm177 -141l-22 2c-2,-9 -5,-15 -9,-19 -6,-7 -14,-10 -23,-10 -7,0 -14,2 -19,6 -7,5 -13,13 -17,23 -4,10 -6,24 -7,43 6,-9 13,-15 21,-19 8,-4 16,-6 25,-6 15,0 28,6 38,17 11,11 16,25 16,43 0,12 -2,23 -7,33 -5,10 -12,17 -21,23 -9,5 -19,8 -30,8 -19,0 -34,-7 -46,-21 -12,-14 -18,-37 -18,-69 0,-36 6,-62 20,-79 11,-14 27,-21 47,-21 14,0 26,4 36,12 9,9 15,20 16,34zm-93 80c0,8 2,16 5,23 3,7 8,13 14,16 6,4 12,6 19,6 10,0 18,-4 25,-12 7,-7 10,-18 10,-31 0,-13 -3,-23 -10,-31 -7,-7 -15,-11 -26,-11 -10,0 -19,4 -26,11 -7,8 -11,17 -11,29z" />
                                <path class="fil43"
                                    d="M6736 11358l24 6c-5,20 -14,36 -27,46 -14,11 -30,16 -49,16 -20,0 -37,-4 -49,-12 -13,-8 -22,-20 -29,-35 -6,-16 -9,-32 -9,-50 0,-19 3,-36 11,-51 7,-14 17,-25 31,-32 14,-8 29,-12 45,-12 19,0 34,5 47,14 13,10 21,23 26,40l-24 6c-4,-13 -10,-23 -19,-29 -8,-7 -18,-10 -30,-10 -15,0 -27,4 -36,11 -10,6 -16,16 -20,27 -4,12 -6,24 -6,36 0,16 2,29 7,41 4,12 12,21 21,26 10,6 20,9 32,9 13,0 25,-4 34,-12 10,-8 16,-19 20,-35zm46 16l23 -3c2,13 7,22 13,28 6,5 14,8 23,8 11,0 20,-3 27,-11 8,-7 11,-16 11,-27 0,-11 -3,-20 -10,-26 -7,-7 -16,-11 -26,-11 -4,0 -10,1 -16,3l2 -20c2,0 3,0 4,0 10,0 18,-2 26,-7 8,-5 12,-13 12,-24 0,-8 -3,-15 -9,-20 -5,-6 -13,-9 -21,-9 -9,0 -17,3 -23,9 -6,5 -9,14 -11,25l-23 -4c3,-15 9,-27 19,-36 10,-8 22,-12 37,-12 10,0 19,2 28,6 8,5 15,10 20,18 4,7 6,15 6,24 0,8 -2,15 -6,22 -4,6 -11,11 -19,15 11,3 19,8 25,16 6,8 9,18 9,30 0,16 -6,30 -17,41 -12,12 -27,17 -45,17 -17,0 -30,-5 -41,-14 -11,-10 -17,-23 -18,-38z" />
                                <path class="fil43"
                                    d="M6615 14245l25 7c-5,20 -15,35 -28,46 -13,10 -30,16 -49,16 -20,0 -36,-4 -49,-12 -12,-9 -22,-20 -28,-36 -7,-15 -10,-32 -10,-50 0,-19 3,-36 11,-50 7,-15 18,-26 31,-33 14,-7 29,-11 45,-11 19,0 34,5 47,14 13,9 22,23 27,40l-25 6c-4,-14 -10,-24 -18,-30 -8,-6 -19,-9 -31,-9 -14,0 -26,3 -36,10 -9,7 -16,16 -20,28 -4,11 -6,23 -6,35 0,16 2,30 7,42 5,11 12,20 21,26 10,6 21,9 32,9 14,0 25,-4 35,-12 9,-8 16,-20 19,-36zm132 66l-23 0 0 -146c-6,6 -13,11 -22,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 34,-22 9,-9 16,-17 20,-25l15 0 0 187zm58 -49l24 -2c2,12 6,20 12,26 7,6 15,9 24,9 11,0 20,-4 28,-12 7,-9 11,-20 11,-33 0,-13 -4,-24 -11,-31 -7,-8 -17,-11 -28,-11 -8,0 -14,1 -20,5 -6,3 -11,7 -14,13l-22 -3 18 -96 92 0 0 22 -74 0 -9 50c11,-8 22,-12 34,-12 17,0 30,6 41,17 12,12 17,26 17,44 0,16 -5,31 -15,43 -11,15 -28,23 -48,23 -17,0 -31,-5 -42,-14 -10,-10 -16,-22 -18,-38z" />
                                <path class="fil43"
                                    d="M7649 11358l24 6c-5,20 -14,36 -27,46 -14,11 -30,16 -49,16 -20,0 -37,-4 -49,-12 -13,-8 -22,-20 -29,-35 -6,-16 -9,-32 -9,-50 0,-19 3,-36 11,-51 7,-14 17,-25 31,-32 14,-8 29,-12 45,-12 19,0 34,5 47,14 13,10 21,23 26,40l-24 6c-4,-13 -10,-23 -19,-29 -8,-7 -18,-10 -30,-10 -15,0 -27,4 -36,11 -10,6 -16,16 -20,27 -4,12 -6,24 -6,36 0,16 2,29 7,41 4,12 12,21 21,26 10,6 20,9 32,9 13,0 25,-4 34,-12 10,-8 16,-19 20,-35zm165 43l0 22 -123 0c0,-5 1,-11 3,-16 3,-8 8,-16 15,-24 7,-9 17,-18 30,-28 20,-17 34,-30 41,-40 7,-9 11,-19 11,-27 0,-9 -4,-17 -10,-23 -7,-6 -15,-9 -25,-9 -11,0 -20,3 -27,9 -6,7 -10,16 -10,28l-23 -3c1,-17 7,-30 18,-40 10,-9 24,-13 42,-13 18,0 32,5 42,14 11,10 16,23 16,37 0,8 -1,15 -5,22 -3,7 -8,15 -15,23 -7,8 -18,19 -35,33 -14,11 -22,19 -26,23 -4,4 -7,8 -10,12l91 0z" />
                                <path class="fil43"
                                    d="M7477 14245l25 7c-5,20 -14,35 -28,46 -13,10 -30,16 -49,16 -20,0 -36,-4 -49,-12 -12,-9 -22,-20 -28,-36 -7,-15 -10,-32 -10,-50 0,-19 4,-36 11,-50 7,-15 18,-26 32,-33 13,-7 28,-11 45,-11 18,0 34,5 46,14 13,9 22,23 27,40l-24 6c-5,-14 -11,-24 -19,-30 -8,-6 -18,-9 -31,-9 -14,0 -26,3 -36,10 -9,7 -16,16 -20,28 -4,11 -6,23 -6,35 0,16 3,30 7,42 5,11 12,20 22,26 9,6 20,9 31,9 14,0 25,-4 35,-12 9,-8 16,-20 19,-36zm132 66l-23 0 0 -146c-5,6 -13,11 -22,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 34,-22 9,-9 16,-17 20,-25l15 0 0 187zm131 0l0 -45 -80 0 0 -21 84 -120 19 0 0 120 25 0 0 21 -25 0 0 45 -23 0zm0 -66l0 -83 -58 83 58 0z" />
                                <path class="fil43"
                                    d="M8548 11358l24 6c-5,20 -14,36 -27,46 -14,11 -30,16 -49,16 -20,0 -37,-4 -49,-12 -13,-8 -22,-20 -29,-35 -6,-16 -10,-32 -10,-50 0,-19 4,-36 12,-51 7,-14 17,-25 31,-32 14,-8 29,-12 45,-12 19,0 34,5 47,14 12,10 21,23 26,40l-24 6c-4,-13 -10,-23 -19,-29 -8,-7 -18,-10 -30,-10 -15,0 -27,4 -36,11 -10,6 -16,16 -20,27 -4,12 -6,24 -6,36 0,16 2,29 7,41 4,12 11,21 21,26 10,6 20,9 32,9 13,0 25,-4 34,-12 10,-8 16,-19 20,-35zm131 65l-23 0 0 -145c-5,5 -12,10 -21,16 -9,5 -17,9 -24,11l0 -22c13,-6 24,-13 33,-22 10,-8 17,-16 21,-24l14 0 0 186z" />
                                <path class="fil43"
                                    d="M8396 14245l25 7c-5,20 -15,35 -28,46 -13,10 -30,16 -49,16 -20,0 -36,-4 -49,-12 -12,-9 -22,-20 -28,-36 -7,-15 -10,-32 -10,-50 0,-19 3,-36 11,-50 7,-15 18,-26 31,-33 14,-7 29,-11 45,-11 19,0 35,5 47,14 13,9 22,23 27,40l-25 6c-4,-14 -10,-24 -18,-30 -8,-6 -19,-9 -31,-9 -14,0 -26,3 -36,10 -9,7 -16,16 -20,28 -4,11 -6,23 -6,35 0,16 3,30 7,42 5,11 12,20 21,26 10,6 21,9 32,9 14,0 25,-4 35,-12 9,-8 16,-20 19,-36zm132 66l-23 0 0 -146c-6,6 -13,11 -22,16 -9,5 -17,9 -24,12l0 -22c13,-6 24,-13 34,-22 9,-9 16,-17 20,-25l15 0 0 187zm58 -50l23 -3c3,13 7,23 13,28 7,6 14,9 23,9 11,0 20,-4 28,-11 7,-8 11,-17 11,-28 0,-10 -4,-19 -11,-26 -6,-7 -15,-10 -26,-10 -4,0 -9,1 -16,2l3 -20c1,1 3,1 3,1 10,0 19,-3 27,-8 8,-5 11,-13 11,-23 0,-9 -2,-15 -8,-21 -6,-5 -13,-8 -22,-8 -9,0 -16,3 -22,8 -6,6 -10,14 -12,26l-22 -5c2,-15 9,-27 19,-35 9,-9 22,-13 36,-13 11,0 20,2 28,7 9,4 16,10 20,17 5,8 7,16 7,24 0,8 -2,16 -7,22 -4,7 -10,12 -19,16 11,2 20,8 26,16 6,8 9,18 9,30 0,16 -6,30 -18,41 -12,11 -27,17 -45,17 -16,0 -30,-5 -40,-15 -11,-10 -17,-22 -19,-38z" />
                                <polygon class="fil28 str0" points="19971,8716 20054,8875 20242,8857 20156,8696 " />
                                <path class="fil60"
                                    d="M20047 8821l-5 -51 -19 2 -1 -6 46 -5 0 6 -18 2 5 51 -8 1zm35 -4l-7 -57 22 -3c4,0 7,0 9,0 3,0 5,1 7,2 2,1 4,3 5,5 2,2 3,5 3,8 1,4 -1,9 -3,12 -3,4 -8,6 -17,7l-14 2 2 23 -7 1zm4 -31l15 -1c5,-1 8,-2 10,-4 2,-2 3,-5 2,-8 0,-3 -1,-5 -2,-6 -2,-2 -3,-3 -5,-3 -2,0 -4,0 -8,0l-14 2 2 20zm45 7l7 -1c0,3 1,5 3,7 1,1 3,3 6,3 3,1 6,1 9,1 3,0 5,-1 7,-2 3,-1 4,-2 5,-4 1,-2 1,-3 1,-5 0,-2 -1,-3 -2,-5 -1,-1 -3,-2 -6,-2 -1,-1 -5,-1 -10,-2 -5,-1 -9,-2 -11,-3 -3,-1 -6,-2 -7,-4 -2,-2 -3,-4 -3,-7 0,-3 0,-6 2,-8 1,-3 3,-5 6,-7 3,-2 7,-3 10,-3 5,-1 9,0 12,1 3,1 6,2 8,5 2,2 3,5 4,9l-7 1c-1,-4 -3,-6 -5,-8 -3,-1 -6,-2 -10,-1 -5,0 -8,1 -10,3 -2,2 -3,4 -3,7 1,2 1,3 3,4 2,2 6,3 12,3 6,1 11,2 13,3 3,1 6,2 8,5 2,2 3,4 3,7 1,3 0,6 -1,9 -2,3 -4,6 -7,7 -3,2 -7,3 -11,4 -5,0 -10,0 -13,-1 -4,-1 -7,-3 -9,-6 -3,-3 -4,-6 -4,-10z" />
                            </g>
                        </svg>
                        {{-- <div class="row mb-4">
                            <div
                                class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                            </div>
                            <div
                                class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination" id="kt_table_paginate">
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        <!--end::Pagination-->
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