$(document).ready(function () {
    var url_name = "marketing-list";

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
        load_data(1, search, 5, filter);
    });

    // filter
    var filter = { status: "", bayar: "" };
    var filter_btn = $("#apply-filter");
    filter_btn.on("click", function (e) {
        e.preventDefault();
        filter.status = $("#filter_status").val();
        filter.bayar = $("#filter_bayar").val();
        load_data(1, search, 5, filter);
    });

    function load_data(
        page = 1,
        search = "",
        length = 5,
        filter = { status: "", bayar: "" }
    ) {
        $.ajax({
            url: url_name,
            method: "GET",
            data: {
                page: page,
                search: search,
                length: length,
                status: filter.status,
                bayar: filter.bayar,
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
                            load_data(page, search, length, filter);
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
    var modal = $("#kt_modal_add_marketing");
    var modal_title = $("#kt_modal_add_marketing .form-title-modal");
    var modal_submit = modal.find('[data-kt-users-modal-action="submit"]');
    var modal_cancel = modal.find('[data-kt-users-modal-action="cancel"]');
    var modal_close = modal.find('[data-kt-users-modal-action="close"]');
    var table = $("#kt_datatable_transaction").DataTable({
        scrollX: true,
        scrollY: "120px",
        responsive: true,
        paging: false,
        info: false,
    });

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
            customer: {
                validators: {
                    notEmpty: {
                        message: "Customer name is required",
                    },
                },
            },
            blok: {
                validators: {
                    notEmpty: {
                        message: "Blok is required",
                    },
                },
            },
            count: {
                validators: {
                    notEmpty: {
                        message: "Count is required",
                    },
                },
            },
            transaction: {
                validators: {
                    notEmpty: {
                        message: "Transaction is required",
                    },
                    numeric: {
                        message: "The value is not valid",
                    },
                },
            },
            transaction_date: {
                validators: {
                    notEmpty: {
                        message: "Transaction date is required",
                    },
                    date: {
                        format: "YYYY-MM-DD",
                        message: "The date is not valid",
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
        form_modal.attr("action", "PUT");
        form_modal.trigger("reset");
        form_modal.find("[name='id']").val("");
        table.clear().draw();

        var blok = $(e.relatedTarget).data("id").split("-")[0];
        var marketing_id = $(e.relatedTarget).data("id").split("-")[1];
        modal_title.html("Transaksi Marketing " + blok);

        $.ajax({
            url: url_name + "/marketing",
            method: "GET",
            dataType: "json",
            data: {
                blok: blok,
                marketing: marketing_id,
            },
            success: function (data) {
                var transaction = data.data.transaction;
                var marketing = data.data.marketing;
                form_modal.find("[name='kode']").val(marketing.blok);
                form_modal.find("[name='count']").val(marketing.count);
                form_modal.find("[name='marketing_id']").val(marketing_id);

                transaction.forEach((t) => {
                    table.row
                        .add([
                            t.count,
                            new Date(t.transaction_date).toLocaleDateString(
                                "id-ID"
                            ),
                            `Rp. ${t.transaction.toLocaleString("id-ID")}`,
                            `
                            <a onclick="edit({id: ${t.id},count: ${t.count},transaction:${t.transaction},transaction_date:'${t.transaction_date}'})" data-toggle="tooltip" class="btn btn-icon btn-warning btn-sm">
                                <span class="fa fa-edit"></span>
                            </a>

                            <a href="javascript:void(0)" data-id="${t.id}" data-toggle="tooltip" class="btn btn-icon btn-danger btn-sm" id="btn-delete">
                                <span class="fa fa-trash"></span>
                            </a>`,
                        ])
                        .draw();
                });
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
        $.ajax({
            url: url_name,
            method: "POST",
            data: {
                _token: form_modal.find("[name='_token']").val(),
                id: form_modal.find("[name='id']").val(),
                perumahan: localStorage.getItem("perumahan"),
                marketing: form_modal.find("[name='marketing_id']").val(),
                blok: form_modal.find("[name='kode']").val(),
                count: form_modal.find("[name='count']").val(),
                transaction: form_modal.find("[name='transaction']").val(),
                transaction_date: form_modal
                    .find("[name='transaction_date']")
                    .val(),
            },
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
                                modal.modal("hide");
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

function edit(data) {
    var form_modal = $("#form-create-edit");
    form_modal.find("[name='id']").val(data.id);
    form_modal.find("[name='count']").val(data.count);
    form_modal.find("[name='transaction']").val(data.transaction);
    console.log(data.transaction_date);
    var tanggal = new Date(data.transaction_date);
    var tahun = tanggal.getFullYear();
    var bulan = String(tanggal.getMonth() + 1).padStart(2, "0");
    var tanggalnya = String(tanggal.getDate()).padStart(2, "0");
    var tanggalFormat = tahun + "-" + bulan + "-" + tanggalnya;
    form_modal
        .find("[name='transaction_date']")
        .val(tanggalFormat)
        .trigger("change");
}
