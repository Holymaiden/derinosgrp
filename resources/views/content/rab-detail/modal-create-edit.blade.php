<div class="modal fade" id="kt_modal_add_perumahan" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_perumahans_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold"><span class="form-title-modal"></span> RAB</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor" />
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
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Master RAB</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="master_rab_id" id="input-master-rab-id" class="form-select mb-3 mb-lg-0"
                                data-control="select2" data-dropdown-parent="#kt_modal_add_perumahan">
                                <option value="">Pilih Status</option>
                                @foreach (Helper::getData('master_rab') as $rab)
                                    <option value="{{ $rab->id }}">{{ $rab->name }}</option>
                                @endforeach
                            </select>
                            <!--end::Select-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row row mb-7">
                            <div class="col-4">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Jumlah</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="amount" id="input-amount"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Jumlah" />
                                <!--end::Input-->
                            </div>
                            <div class="col-4">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Satuan</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select name="unit" id="input-unit" class="form-select mb-3 mb-lg-0"
                                    data-control="select2" data-dropdown-parent="#kt_modal_add_perumahan">
                                    <option value="">Pilih Satuan</option>
                                    <option value="buah">Buah</option>
                                    <option value="unit">Unit</option>
                                    <option value="kubik">Kubik</option>
                                    <option value="batang">Batang</option>
                                    <option value="rol">Rol</option>
                                    <option value="dos">Dos</option>
                                    <option value="zak">Zak</option>
                                    <option value="lembar">Lembar</option>
                                    <option value="pcs">Pcs</option>
                                    <option value="pail">Pail</option>
                                    <option value="meter">Meter</option>
                                    <option value="kg">Kg</option>
                                    <option value="m2">M2 (Meter Persegi)</option>
                                    <option value="m3">M3 (Meter Kubik)</option>
                                    <option value="m1">M1</option>
                                    <option value="m">M</option>
                                    <option value="liter">Liter</option>
                                    <option value="cm">Cm</option>
                                    <option value="paket">Paket</option>
                                    <option value="box">Box</option>
                                    <option value="lusin">Lusin</option>
                                    <option value="gram">Gram</option>
                                    <option value="ton">Ton</option>
                                    <option value="set">Set</option>
                                    <option value="karung">Karung</option>
                                    <option value="tas">Tas</option>
                                    <option value="galon">Galon</option>
                                    <option value="kaleng">Kaleng</option>
                                    <option value="botol">Botol</option>
                                    <option value="roll">Roll</option>
                                    <option value="tabung">Tabung</option>
                                    <option value="balok">Balok</option>
                                    <option value="sak">Sak</option>
                                    <option value="bungkus">Bungkus</option>
                                    <option value="pak">Pak</option>
                                    <option value="ons">Ons</option>
                                    <option value="tandan">Tandan</option>
                                    <option value="sekop">Sekop</option>
                                    <option value="drum">Drum</option>
                                    <option value="kotak">Kotak</option>
                                    <option value="panel">Panel</option>
                                    <option value="frame">Frame</option>
                                    <option value="ampul">Ampul</option>
                                    <option value="strip">Strip</option>
                                    <option value="case">Case</option>
                                    <option value="toples">Toples</option>
                                    <option value="kalung">Kalung</option>
                                    <option value="tablet">Tablet</option>
                                    <option value="karat">Karat</option>
                                    <option value="batch">Batch</option>
                                    <option value="blok">Blok</option>
                                    <option value="galon_us">Galon (AS)</option>
                                    <option value="koli">Koli</option>
                                    <option value="pak">Pak</option>
                                    <option value="eksemplar">Eksemplar</option>
                                    <option value="keping">Keping</option>
                                    <option value="kodi">Kodi</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Harga</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="price" id="input-price"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Harga" />
                                <!--end::Input-->
                            </div>

                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row row mb-7">
                            <div class="col-12">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Total Harga</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="total" id="input-total"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Total Jual" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row row mb-7">
                            <!--begin::Label-->
                            <label class="fw-semibold fs-6 mb-2">Keterangan</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="noted" id="input-noted" class="form-control form-control-solid mb-3 mb-lg-0"></textarea>
                            <!--end::Input-->
                        </div>
                        <!--End::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-users-modal-action="cancel">Discard</button>
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
