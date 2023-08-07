@foreach($data as $v)
<!--begin::Table row-->
<tr>
        <!--begin::Checkbox-->
        <td>
                <span class="text-gray-800">{{ ++$i }}</span>
        </td>
        <!--end::Checkbox-->
        <!--begin::User=-->
        <td class="d-flex align-items-center">
                <!--begin:: Avatar -->
                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                        <a href="../../demo1/dist/apps/user-management/users/view.html">
                                <div class="symbol-label">
                                        <img src="assets/media/avatars/300-6.jpg" alt="{{ $v['name'] }}" class="w-100" />
                                </div>
                        </a>
                </div>
                <!--end::Avatar-->
                <!--begin::User details-->
                <div class="d-flex flex-column">
                        <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">{{ $v['name'] }}</a>
                        <span>{{ $v['email'] }}</span>
                </div>
                <!--begin::User details-->
        </td>
        <!--end::User=-->
        <!--begin::Role=-->
        <td>
                <div class="badge badge-light fw-bold">Administrator</div>
        </td>
        <!--end::Role=-->
        <!--begin::Action=-->
        <td class="text-end">
                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                        <span class="svg-icon svg-icon-5 m-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                </svg>
                        </span>
                        <!--end::Svg Icon--></a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                        </div>
                        <!--end::Menu item-->
                </div>
                <!--end::Menu-->
        </td>
        <!--end::Action=-->
</tr>
<!--end::Table row-->
@endforeach