$(document).ready(function () {
    var url_name = "user-list";

    // Pagination config
    var $pagination = $("#kt_table_paginate");
    var defaultOpts = {
        totalPages: 1,
        hideOnlyOnePage: false,

        prev: '<i class="previous"></i>',
        next: '<i class="next"></i>',

        paginationClass: "pagination",
        pageClass: "paginate_button page-item",
        nextClass: "next",
        prevClass: "previous",
    };
    $pagination.twbsPagination(defaultOpts);

    // Search
    var search_input = $("#kt_table_search");
    var search = "";
    search_input.on("keyup change", function () {
        search = $(this).val();
        load_data(1, search, 5, filter_role);
    });

    // Filter
    var filter_role = "";
    var filter_btn = $("#apply-filter");
    filter_btn.on("click", function (e) {
        e.preventDefault();
        filter_role = $("#filter_role").val();
        load_data(1, search, 5, filter_role);
    });

    function load_data(page = 1, search = "", length = 5, role = "") {
        $.ajax({
            url: url_name,
            method: "GET",
            data: {
                page: page,
                search: search,
                length: length,
                role: role,
            },
            dataType: "json",
            success: function (data) {
                // Pagination
                var total_page = data.total_page;
                var current_page = $pagination.twbsPagination("getCurrentPage");
                $pagination.twbsPagination("destroy");
                $pagination.twbsPagination(
                    $.extend({}, defaultOpts, {
                        startPage: current_page,
                        totalPages: total_page,
                        visiblePages: 4,
                        initiateStartPageClick: false,
                        onPageClick: function (event, page) {
                            load_data(page, search, length, role);
                        },
                    })
                );

                $(".data-ajax-table").html(data.html);
            },
        });
    }

    load_data();

    // Initiate modal
    var form_modal = $("#form-create-edit");
    var modal = $("#kt_modal_add_user");
    var modal_title = $("#kt_modal_add_user .form-title-modal");
    var modal_submit = modal.find('[data-kt-users-modal-action="submit"]');
    var modal_cancel = modal.find('[data-kt-users-modal-action="cancel"]');
    var modal_close = modal.find('[data-kt-users-modal-action="close"]');

    function changeVisiblePerumahan() {
        var div_perumahan = $("#input-status-blok-id");
        var input_perumahan = $("input[name='role']:checked").val();
        if (input_perumahan == "admin" || input_perumahan == undefined)
            div_perumahan.hide();
        else div_perumahan.show();
    }

    // Modal Close
    modal_close.on("click", function (e) {
        e.preventDefault();
        Swal.fire({
            text: "Are you sure you would like to cancel?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light",
            },
        }).then(function (t) {
            t.value
                ? (modal.modal("hide"), form_modal.trigger("reset"))
                : "cancel" === t.dismiss &&
                  Swal.fire({
                      text: "Your form has not been cancelled!.",
                      icon: "error",
                      buttonsStyling: !1,
                      confirmButtonText: "Ok, got it!",
                      customClass: {
                          confirmButton: "btn btn-primary",
                      },
                  });
        });
    });

    // Modal Cancel
    modal_cancel.on("click", function (e) {
        e.preventDefault();
        Swal.fire({
            text: "Are you sure you would like to cancel?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light",
            },
        }).then(function (t) {
            t.value
                ? (modal.modal("hide"), form_modal.trigger("reset"))
                : "cancel" === t.dismiss &&
                  Swal.fire({
                      text: "Your form has not been cancelled!.",
                      icon: "error",
                      buttonsStyling: !1,
                      confirmButtonText: "Ok, got it!",
                      customClass: {
                          confirmButton: "btn btn-primary",
                      },
                  });
        });
    });

    // Validation
    var validation_POST = FormValidation.formValidation(form_modal[0], {
        fields: {
            name: {
                validators: {
                    notEmpty: { message: "Full name is required" },
                },
            },
            email: {
                validators: {
                    notEmpty: {
                        message: "Valid email address is required",
                    },
                    emailAddress: {
                        message: "The value is not a valid email address",
                    },
                },
            },
            password: {
                validators: {
                    notEmpty: { message: "Password is required" },
                    stringLength: {
                        min: 8,
                        message:
                            "The password must be more than 8 characters long",
                    },
                },
            },
            role: {
                validators: {
                    notEmpty: { message: "Role is required" },
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: "",
            }),
        },
    });

    var validation_PUT = FormValidation.formValidation(form_modal[0], {
        fields: {
            name: {
                validators: {
                    notEmpty: { message: "Full name is required" },
                },
            },
            email: {
                validators: {
                    notEmpty: {
                        message: "Valid email address is required",
                    },
                    emailAddress: {
                        message: "The value is not a valid email address",
                    },
                },
            },
            role: {
                validators: {
                    notEmpty: { message: "Role is required" },
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: "",
            }),
        },
    });

    // Show modal
    modal.on("show.bs.modal", function (e) {
        var method = $(e.relatedTarget).data("id").split("-")[0];

        if (method == "create") {
            modal_title.html("Add");
            form_modal.attr("action", "POST");
            form_modal.trigger("reset");
            changeVisiblePerumahan();
        } else if ((method = "update")) {
            modal_title.html("Edit");
            form_modal.attr("action", "PUT");
            form_modal.trigger("reset");

            var id = $(e.relatedTarget).data("id").split("-")[1];

            $.ajax({
                url: url_name + "/" + id,
                method: "GET",
                dataType: "json",
                success: function (data) {
                    data = data.data;
                    $("#input-id").val(data.id);
                    $("#input-name").val(data.name);
                    $("#input-email").val(data.email);
                    $("input[name='role'][value='" + data.role + "']").prop(
                        "checked",
                        true
                    );
                    $("#input-perumahan")
                        .val(data.perumahan_id)
                        .trigger("change");
                    changeVisiblePerumahan();
                },
                error: function (data) {
                    var errorsString = "";
                    $.each(data.responseJSON.message, function (key, value) {
                        errorsString += value + "<br>";
                    });
                    Swal.fire({
                        title: "Error!",
                        html: errorsString,
                        icon: "error",
                        confirmButtonText: "Ok",
                    });
                },
            });
        }

        $("input[name='role']").on("change", function () {
            changeVisiblePerumahan();
        });
    });

    // Create and Edit
    modal_submit.on("click", function (e) {
        e.preventDefault();
        var cek_method = form_modal.attr("action");
        if (cek_method == "post" || cek_method == "POST") {
            validation_POST.validate().then(function (status) {
                status == "Valid"
                    ? (modal_submit.attr("data-kt-indicator", "on"),
                      (modal_submit.disabled = !0),
                      setTimeout(function () {
                          modal_submit.removeAttr("data-kt-indicator"),
                              (modal_submit.disabled = !1),
                              create_data();
                      }, 2e3))
                    : Swal.fire({
                          text: "Sorry, looks like there are some errors detected, please try again.",
                          icon: "error",
                          buttonsStyling: !1,
                          confirmButtonText: "Ok, got it!",
                          customClass: {
                              confirmButton: "btn btn-primary",
                          },
                      });
            });
        } else if (cek_method == "put" || cek_method == "PUT") {
            validation_PUT.validate().then(function (status) {
                status == "Valid"
                    ? (modal_submit.attr("data-kt-indicator", "on"),
                      (modal_submit.disabled = !0),
                      setTimeout(function () {
                          modal_submit.removeAttr("data-kt-indicator"),
                              (modal_submit.disabled = !1),
                              update_data();
                      }, 2e3))
                    : Swal.fire({
                          text: "Sorry, looks like there are some errors detected, please try again.",
                          icon: "error",
                          buttonsStyling: !1,
                          confirmButtonText: "Ok, got it!",
                          customClass: {
                              confirmButton: "btn btn-primary",
                          },
                      });
            });
        } else {
            Swal.fire({
                title: "Error!",
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
                confirmButtonText: "Ok",
            });
        }
    });

    function create_data() {
        $.ajax({
            url: url_name,
            method: "POST",
            data: form_modal.serialize(),
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.code >= 200) {
                    Swal.fire({
                        title: "Success!",
                        text: data.message,
                        icon: "success",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        modal.modal("hide");
                        load_data();
                    });
                }
            },
            error: function (data) {
                var errorsString = "";
                $.each(data.responseJSON.message, function (key, value) {
                    errorsString += value + "<br>";
                });
                Swal.fire({
                    title: "Error!",
                    html: errorsString,
                    icon: "error",
                    confirmButtonText: "Ok",
                });
            },
        });
    }

    function update_data() {
        var id = $("#input-id").val();
        $.ajax({
            url: url_name + "/" + id,
            method: "PUT",
            data: form_modal.serialize(),
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.code >= 200) {
                    Swal.fire({
                        title: "Success!",
                        text: data.message,
                        icon: "success",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        modal.modal("hide");
                        load_data();
                    });
                }
            },
            error: function (data) {
                var errorsString = "";
                $.each(data.responseJSON.message, function (key, value) {
                    errorsString += value + "<br>";
                });
                Swal.fire({
                    title: "Error!",
                    html: errorsString,
                    icon: "error",
                    confirmButtonText: "Ok",
                });
            },
        });
    }

    // Delete
    $("body").on("click", "#btn-delete", function (e) {
        var id = $(this).data("id");
        Swal.fire({
            title: "Are you sure?",
            text: "You will delete this data!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: url_name + "/" + id,
                    method: "DELETE",
                    data: {
                        _token: $('input[name="_token"]').val(),
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data.code >= 200) {
                            Swal.fire({
                                title: "Success!",
                                text: data.message,
                                icon: "success",
                                confirmButtonText: "Ok",
                            }).then((result) => {
                                load_data();
                            });
                        }
                    },
                    error: function (data) {
                        var errorsString = "";
                        $.each(
                            data.responseJSON.message,
                            function (key, value) {
                                errorsString += value + "<br>";
                            }
                        );
                        Swal.fire({
                            title: "Error!",
                            html: errorsString,
                            icon: "error",
                            confirmButtonText: "Ok",
                        });
                    },
                });
            }
        });
    });
});
