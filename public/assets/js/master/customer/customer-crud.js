$(document).ready(function () {
    var url_name = "customer-list";

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
    var search = $("#kt_table_search");
    search.on("keyup change", function () {
        var search = $(this).val();
        load_data(1, search);
    });

    function load_data(page = 1, search = "", length = 5) {
        $.ajax({
            url: url_name,
            method: "GET",
            data: {
                page: page,
                search: search,
                length: length,
                perumahan: localStorage.getItem("perumahan"),
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
                            load_data(page, search);
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
    var modal = $("#kt_modal_add_customer");
    var modal_title = $("#kt_modal_add_customer .form-title-modal");
    var modal_submit = modal.find('[data-kt-users-modal-action="submit"]');
    var modal_cancel = modal.find('[data-kt-users-modal-action="cancel"]');
    var modal_close = modal.find('[data-kt-users-modal-action="close"]');

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
    var validation_form = FormValidation.formValidation(form_modal[0], {
        fields: {
            nik: {
                validators: {
                    notEmpty: { message: "NIK is required" },
                },
            },
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
            telepon: {
                validators: {
                    notEmpty: {
                        message: "Phone number is required",
                    },
                    numeric: {
                        message: "The value is not a valid number",
                    },
                    phone: {
                        country: "ID",
                        message: "The value is not a valid phone number",
                    },
                },
            },
            alamat: {
                validators: {
                    notEmpty: {
                        message: "Address is required",
                    },
                },
            },
            tempat_lahir: {
                validators: {
                    notEmpty: {
                        message: "Place of birth is required",
                    },
                },
            },
            tanggal_lahir: {
                validators: {
                    notEmpty: {
                        message: "Date of birth is required",
                    },
                },
            },
            jenis_kelamin: {
                validators: {
                    notEmpty: {
                        message: "Gender is required",
                    },
                },
            },
            pekerjaaan: {
                validators: {
                    notEmpty: {
                        message: "Job is required",
                    },
                },
            },
            ktp: {
                validators: {
                    file: {
                        extension: "jpg,jpeg,png",
                        type: "image/jpeg,image/png",
                        message:
                            "Please upload a valid file with jpg, jpeg, png extension",
                    },
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
                    $("#input-nik").val(data.nik);
                    $("#input-name").val(data.nama);
                    $("#input-email").val(data.email);
                    $("#input-telepon").val(data.telepon);
                    $("#input-alamat").val(data.alamat);
                    $("#input-tempat-lahir").val(data.tempat_lahir);
                    $("#input-tanggal-lahir")
                        .val(data.tanggal_lahir)
                        .trigger("change");
                    $("#input-jenis-kelamin")
                        .val(data.jenis_kelamin)
                        .trigger("change");
                    $("#input-pekerjaan").val(data.pekerjaan);
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
    });

    // Modal Submit
    modal_submit.on("click", function (e) {
        e.preventDefault();
        validation_form &&
            validation_form.validate().then(function (e) {
                "Valid" == e
                    ? (modal_submit.attr("data-kt-indicator", "on"),
                      (modal_submit.disabled = !0),
                      setTimeout(function () {
                          modal_submit.removeAttr("data-kt-indicator"),
                              (modal_submit.disabled = !1),
                              create_edit();
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
    });

    // Create and Edit
    function create_edit() {
        var cek_method = form_modal.attr("action");
        var form_data = new FormData(form_modal[0]);
        form_data.append("ktp", $("#input-ktp")[0].files[0]);
        form_data.append("perumahan", localStorage.getItem("perumahan"));

        if (cek_method == "post" || cek_method == "POST") {
            $.ajax({
                url: url_name,
                method: "POST",
                data: form_data,
                processData: false,
                contentType: false,
                success: function (data) {
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
        } else if (cek_method == "put" || cek_method == "PUT") {
            var id = $("#input-id").val();
            $.ajax({
                url: url_name + "/" + id,
                method: "PUT",
                data: form_data,
                processData: false,
                contentType: false,
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
        } else {
            Swal.fire({
                title: "Error!",
                text: "Method not found",
                icon: "error",
                confirmButtonText: "Ok",
            });
        }
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
