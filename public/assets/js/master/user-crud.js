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
    var modal = $("#kt_modal_add_user");

    // Show modal
    modal.on("show.bs.modal", function (e) {
        var method = $(e.relatedTarget).data("id").split("-")[0];

        if (method == "create") {
            form_modal.attr("action", "POST");
            form_modal.trigger("reset");
        } else if ((method = "update")) {
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

    // Create and Edit
    form_modal.on("submit", function (e) {
        e.preventDefault();
        var cek_method = $(this).attr("action");
        if (cek_method == "post" || cek_method == "POST") {
            $.ajax({
                url: url_name,
                method: "POST",
                data: $(this).serialize(),
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
        } else if (cek_method == "put" || cek_method == "PUT") {
            var id = $("#input-id").val();
            $.ajax({
                url: url_name + "/" + id,
                method: "PUT",
                data: $(this).serialize(),
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
        } else {
            Swal.fire({
                title: "Error!",
                text: "Method not found",
                icon: "error",
                confirmButtonText: "Ok",
            });
        }
    });

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
