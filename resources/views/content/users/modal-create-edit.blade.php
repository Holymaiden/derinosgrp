<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_add_user_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Add User</h2>
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
                                        <input type="hidden" name="id" />
                                        <input type="hidden" name="_method" value="POST" />
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Password</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-5">Role</label>
                                                        <!--end::Label-->
                                                        <!--begin::Roles-->
                                                        <!--begin::Input row-->
                                                        <div class="d-flex fv-row">
                                                                <!--begin::Radio-->
                                                                <div class="form-check form-check-custom form-check-solid">
                                                                        <!--begin::Input-->
                                                                        <input class="form-check-input me-3" name="user_role" type="radio" value="0" id="kt_modal_update_role_option_0" checked='checked' />
                                                                        <!--end::Input-->
                                                                        <!--begin::Label-->
                                                                        <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                                                <div class="fw-bold text-gray-800">Administrator</div>
                                                                                <div class="text-gray-600">Best for business owners and company administrators</div>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                </div>
                                                                <!--end::Radio-->
                                                        </div>
                                                        <!--end::Roles-->
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