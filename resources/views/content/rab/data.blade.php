@forelse($data as $v)
    <!--begin::Table row-->
    <tr>
        <!--begin::Checkbox-->
        <td>
            <span class="text-gray-800">{{ ++$i }}</span>
        </td>
        <!--end::Checkbox-->
        <!--begin::Kode-->
        <td>
            <div class="badge badge-light fw-bold">{{ ucfirst($v->kode) }}</div>
        </td>
        <!--end::Kode=-->
        <!--begin::status_blok=-->
        <td>
            <span
                class="badge badge-{{ $v->count > 0 ? 'success' : 'primary' }}">{{ $v->count > 0 ? 'Terisi' : 'Belum Terisi' }}</span>
        </td>
        <!--end::status_blok=-->
        <!--begin::Count=-->
        <td>
            <div class="text-gray-800 text-hover-primary">{{ Helper::tranformToIDR($v->total_price ?? 0) }}</div>
        </td>
        <!--end::Count=-->
        <!--begin::Action=-->
        <td class="text-end">
            <a href="{{ route('rab-detail-management', $v->kode) }}"
                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"">
                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M572.5 241.4C518.3 135.6 410.9 64 288 64S57.7 135.6 3.5 241.4a32.4 32.4 0 0 0 0 29.2C57.7 376.4 165.1 448 288 448s230.3-71.6 284.5-177.4a32.4 32.4 0 0 0 0-29.2zM288 400a144 144 0 1 1 144-144 143.9 143.9 0 0 1 -144 144zm0-240a95.3 95.3 0 0 0 -25.3 3.8 47.9 47.9 0 0 1 -66.9 66.9A95.8 95.8 0 1 0 288 160z" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
        </td>
        <!--end::Action=-->
    </tr>
    <!--end::Table row-->
@empty
    <tr>
        <td colspan="11" class="d-flex align-items-center">No data available</td>
    </tr>
@endforelse
