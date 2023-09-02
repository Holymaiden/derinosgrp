$(document).ready(function () {
    const url_name = "cavling-list";

    getCavlingData();
    getCustomerData();
    getMarketingData();
    function changeColorCss(id, color) {
        var element = document.querySelector(`[data-id="${id}"]`);
        element.style.fill = `var(--kt-${color})`;
    }

    function getCavlingData() {
        $.ajax({
            type: "GET",
            url: "cavling-data",
            data: {
                perumahan: localStorage.getItem("perumahan"),
            },
            dataType: "JSON",
            success: function (response) {
                $(".cavling-data").html(response.html);
                getColors();
                polygonClick();
            },
        });
    }

    function getColors() {
        $.ajax({
            type: "GET",
            url: url_name,
            data: {
                perumahan: localStorage.getItem("perumahan"),
            },
            dataType: "JSON",
            success: function (response) {
                var data = response.data;
                data.forEach(function (element) {
                    changeColorCss(element.kode, element.status_blok.warna);
                });
            },
        });
    }

    function polygonClick() {
        //get tag polygon
        var polygon = document.querySelectorAll("polygon");
        $.ajax({
            type: "GET",
            url: "cavling-kode",
            data: {
                perumahan: localStorage.getItem("perumahan"),
            },
            dataType: "JSON",
            success: function (response) {
                var data = response.data;
                let kode = [];
                data.forEach(function (element) {
                    kode.push(element.kode);
                });
                polygon.forEach(function (element) {
                    var id = element.getAttribute("data-id");
                    if (kode.includes(id)) {
                        element.style.cursor = "pointer";
                        element.addEventListener("click", function () {
                            $("#input-id").val(id);
                            modal.modal("show");
                        });
                    }
                });
            },
        });

        //get data-d ketika d clik
        // polygon.forEach(function (element) {
        //     element.addEventListener("click", function () {
        //         var id = element.getAttribute("data-id");
        //         $("#input-id").val(id);
        //         modal.modal("show");
        //     });
        // });
    }

    function getCustomerData() {
        $.ajax({
            type: "GET",
            url: "cavling-customer",
            data: {
                perumahan: localStorage.getItem("perumahan"),
            },
            dataType: "JSON",
            success: function (response) {
                var data = response.data;
                $("#input-customer").append(
                    `<option value="">Pilih Customer</option>`
                );
                data.forEach(function (element) {
                    $("#input-customer").append(
                        `<option value="${element.id}">${element.nik} - ${element.nama}</option>`
                    );
                });
            },
        });
    }

    function getMarketingData() {
        $.ajax({
            type: "GET",
            url: "cavling-marketing",
            dataType: "JSON",
            success: function (response) {
                var data = response.data;
                $("#input-marketing").append(
                    `<option value="">Pilih Marketing</option>`
                );
                data.forEach(function (element) {
                    $("#input-marketing").append(
                        `<option value="${element.id}">${element.nama}</option>`
                    );
                });
            },
        });
    }

    // Initiate modal
    var form_modal = $("#form-create-edit");
    var modal = $("#kt_modal_show");
    var modal_title = $("#kt_modal_show .form-title-modal");
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

    // Show modal
    modal.on("show.bs.modal", function (e) {
        form_modal.attr("action", "POST");
        form_modal.trigger("reset");

        var id = $("#input-id").val();

        $.ajax({
            url: url_name + "/" + id,
            method: "GET",
            data: {
                perumahan: localStorage.getItem("perumahan"),
            },
            dataType: "json",
            success: function (data) {
                data = data.data;
                modal_title.html("Blok " + data.kode.toUpperCase());
                $("#input-status").val(data.status_blok_id).trigger("change");
                $("#input-customer").val(data.customer_id).trigger("change");
            },
            error: function (data) {
                Swal.fire({
                    text: data.responseJSON.message,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                }).then(function () {
                    modal.modal("hide");
                });
            },
        });
    });

    // Validation
    var validation_form = FormValidation.formValidation(form_modal[0], {
        fields: {
            status: {
                validators: {
                    notEmpty: {
                        message: "Status is required",
                    },
                },
            },
            customer: {
                validators: {
                    notEmpty: {
                        message: "Customer is required",
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

    // Submit form
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
                              updateProses();
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

    function updateProses() {
        let formData = $("#form-create-edit").serializeArray();
        formData.push({
            name: "perumahan",
            value: localStorage.getItem("perumahan"),
        });
        $.ajax({
            url: url_name,
            method: "PUT",
            data: formData,
            dataType: "json",
            success: function (data) {
                modal.modal("hide");
                getCavlingData();
                Swal.fire({
                    text: "Data berhasil diupdate",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
            },
            error: function (data) {
                modal.modal("hide");
                Swal.fire({
                    text: data.responseJSON.message,
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                });
            },
        });
    }
});
