<div class="modal fade" id="kt_modal_add_perumahan" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_add_perumahans_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold"><span class="form-title-modal"></span> Perumahan</h2>
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
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="form-create-edit" class="form" action="POST">
                                        @csrf
                                        <input type="hidden" name="id" id="input-id" />
                                        <input type="hidden" name="_method" value="POST" />
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Kode</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="kode" id="input-kode" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Kode" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row row mb-7">
                                                        <div class="col-4">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Panjang</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="number" name="panjang" id="input-panjang" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Panjang" />
                                                                <!--end::Input-->
                                                        </div>
                                                        <div class="col-4">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Lebar</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="number" name="lebar" id="input-lebar" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Lebar" />
                                                                <!--end::Input-->
                                                        </div>
                                                        <div class="col-4">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Luas</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="number" name="luas" id="input-luas" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Luas" />
                                                                <!--end::Input-->
                                                        </div>

                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row row mb-7">
                                                        <div class="col-12">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Harga Jual</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="number" name="harga_jual" id="input-harga-jual" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Harga Jual" />
                                                                <!--end::Input-->
                                                        </div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row row mb-7">
                                                        <div class="col-6">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Status</label>
                                                                <!--end::Label-->
                                                                <!--begin::Select-->
                                                                <select name="status_blok_id" id="input-status-blok-id" class="form-select form-select-solid mb-3 mb-lg-0">
                                                                        <option value="">Pilih Status</option>
                                                                        @foreach(Helper::getData('status_bloks') as $status)
                                                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                                                        @endforeach
                                                                </select>
                                                                <!--end::Select-->
                                                        </div>
                                                        <div class="col-6">
                                                                <!--begin::Label-->
                                                                <label class="required fw-semibold fs-6 mb-2">Bayar</label>
                                                                <!--end::Label-->
                                                                <!--begin::Select-->
                                                                <select name="status_bayar" id="input-status-bayar" class="form-select form-select-solid mb-3 mb-lg-0">
                                                                        <option value="">Pilih Status</option>
                                                                        <option value="ya">Ya</option>
                                                                        <option value="tidak">Tidak</option>
                                                                </select>
                                                                <!--end::Select-->
                                                        </div>

                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Keterangan</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <textarea name="keterangan" id="input-keterangan" class="form-control form-control-solid mb-3 mb-lg-0"></textarea>
                                                        <!--end::Input-->
                                                </div>
                                                <!--End::Input group-->
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