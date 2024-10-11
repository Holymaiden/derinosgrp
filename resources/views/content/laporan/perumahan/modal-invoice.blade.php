<div class="modal fade" id="kt_modal_invoice_perumahan" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_add_perumahans_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold"><span class="form-title-modal"></span></h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-5">
                                <!--begin::Form-->
                                <form id="form-create-edit" class="form" action="POST">
                                        @csrf
                                        <input type="hidden" name="id" id="input-id" />
                                        <input type="hidden" name="_method" value="POST" />
                                        <input type="hidden" name="customer_id" />
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                <!--begin::Table-->
                                                <label class="fw-semibold fs-6 mb-2">Riwayat Transaksi</label>
                                                <div class="fv-row row">
                                                        <table id="kt_datatable_transaction" class="table table-striped table-row-bordered gy-5 gs-7">
                                                                <thead>
                                                                        <tr class="fw-semibold fs-6 text-muted">
                                                                                <th>No</th>
                                                                                <th>Tanggal</th>
                                                                                <th>Transaksi</th>
                                                                                <th>Action</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                        </table>
                                                </div>
                                                <!--end::Table-->
                                                <div class="separator my-5"></div>
                                                <!--begin::Input group-->
                                                <div class="fv-row row mb-7">
                                                        <div class="col-6">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Kode</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" name="kode" id="input-kode" class="form-control form-control-solid mb-3 mb-lg-0" disabled />
                                                                <!--end::Input-->
                                                        </div>
                                                        <div class="col-6">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">No Transaksi</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" name="count" id="input-count" class="form-control form-control-solid mb-3 mb-lg-0" disabled />
                                                                <!--end::Input-->
                                                        </div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row row mb-7">
                                                        <div class="col-6">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Tanggal</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="date" name="transaction_date" id="input-tanggal" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tanggal" />
                                                                <!--end::Input-->
                                                        </div>
                                                        <div class="col-6">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Transaksi</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="number" name="transaction" id="input-tansaksi" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Transaksi" />
                                                                <!--end::Input-->
                                                        </div>

                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row row mb-7">
                                                        <div class="col-9">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Bukti Transfer</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="file" name="bukti_transfer" id="input-bukti_transfer" class="form-control form-control-solid mb-3 mb-lg-0" />
                                                                <!--end::Input-->
                                                        </div>
                                                        <div class="col-3">
                                                                <!--begin::Button Lihat-->
                                                                <a href="#" class="btn btn-light-primary mt-8" id="btn-lihat-bukti" target="_blank">
                                                                        <span class="svg-icon svg-icon-2">
                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M14.4 20V4L19.5 9.5H14Z" fill="currentColor" />
                                                                                </svg>
                                                                        </span>
                                                                        Lihat
                                                                </a>
                                                                <!--end::Button Lihat-->
                                                        </div>
                                                </div>
                                                <!--end::Input group-->
                                        </div>
                                        <!--end::Scroll-->
                                        <!--begin::Actions-->
                                        <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                        </div>
                                        <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                        </div>
                        <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
</div>