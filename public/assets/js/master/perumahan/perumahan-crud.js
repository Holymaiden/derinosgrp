$(document).ready(function () {
    var url_name = "perumahan-list";

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
    var modal = $("#kt_modal_add_perumahan");
    var modal_title = $("#kt_modal_add_perumahan .form-title-modal");
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
            kode: {
                validators: {
                    notEmpty: {
                        message: "Kode is required",
                    },
                },
            },
            panjang: {
                validators: {
                    notEmpty: {
                        message: "Panjang is required",
                    },
                },
            },
            lebar: {
                validators: {
                    notEmpty: {
                        message: "Lebar is required",
                    },
                },
            },
            luas: {
                validators: {
                    notEmpty: {
                        message: "Luas is required",
                    },
                },
            },
            harga_permeter: {
                validators: {
                    notEmpty: {
                        message: "Harga per meter is required",
                    },
                },
            },
            harga_jual: {
                validators: {
                    notEmpty: {
                        message: "Harga jual is required",
                    },
                },
            },
            status_blok_id: {
                validators: {
                    notEmpty: {
                        message: "Status blok is required",
                    },
                },
            },
            status_bayar_id: {
                validators: {
                    notEmpty: {
                        message: "Status bayar is required",
                    },
                },
            },
            keterangan: {
                validators: {
                    notEmpty: {
                        message: "Keterangan is required",
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
                    $("#input-kode").val(data.kode);
                    $("#input-panjang").val(data.panjang);
                    $("#input-lebar").val(data.lebar);
                    $("#input-luas").val(data.luas);
                    $("#input-harga-permeter").val(data.harga_permeter);
                    $("#input-harga-jual").val(data.harga_jual);
                    $("#input-status-blok-id")
                        .val(data.status_blok_id)
                        .trigger("change");
                    $("#input-status-bayar-id")
                        .val(data.status_bayar_id)
                        .trigger("change");
                    $("#input-keterangan")
                        .val(data.keterangan)
                        .trigger("change");
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

        if (cek_method == "post" || cek_method == "POST") {
            let data_form = form_modal.serializeArray();
            data_form.push({
                name: "perumahan",
                value: localStorage.getItem("perumahan"),
            });
            $.ajax({
                url: url_name,
                method: "POST",
                data: data_form,
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
                    Swal.fire({
                        title: "Error!",
                        html: data.responseJSON.message,
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
                data: form_modal.serialize(),
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
                    Swal.fire({
                        title: "Error!",
                        html: data.responseJSON.message,
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
