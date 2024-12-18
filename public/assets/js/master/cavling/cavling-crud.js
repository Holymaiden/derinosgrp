var myDefaultAllowList = bootstrap.Tooltip.Default.allowList;

myDefaultAllowList["kt-tooltip"] = true;
myDefaultAllowList["kt-popover"] = true;

$(document).ready(function () {
    const url_name = "cavling-list";
    console.log(url_name);
    getCavlingData();
    getCustomerData();
    getMarketingData();

    function changeColorCss(data) {
        let {
            id,
            color,
            status,
            harga,
            customer,
            customer_telepon,
            marketing,
        } = data;
        // console.log(data);
        var element = document.querySelector(`[data-id="${id}"]`);
        // console.log('id = ', id);
        // console.log('element = ', element);
        // console.log('color = ', color);
        var colorHex = getComputedStyle(element).getPropertyValue(
            "--kt-" + color
        );
        element.style.fill = colorHex;
        new bootstrap.Popover(element, {
            html: true,
            container: "body",
            trigger: "hover",
            placement: "top",
            title:
                "Blok " +
                element.getAttribute("data-id").charAt(0).toUpperCase() +
                element.getAttribute("data-id").slice(1),
            content: () => {
                let html = document.createElement("div");
                html.classList.add("table-responsive");
                html.innerHTML = `
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Customer</td>
                                <td>: ${customer}</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>: ${customer_telepon}</td>
                            </tr>
                            <tr>
                                <td>Marketing</td>
                                <td>: ${marketing}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>: Rp. ${harga
                                    .toString()
                                    .replace(/\B(?=(\d{3})+(?!\d))/g, ".")}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: ${status}</td>
                            </tr>
                        </tbody>
                    </table>
                `;
                html.cloneNode(true);
                return html;
            },

            sanitize: true,
        });
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
                    changeColorCss({
                        id: element.kode,
                        color: element.status_blok?.warna,
                        status: element.status_blok?.status,
                        harga: element.harga_jual,
                        customer: element.customer?.nama ?? "-",
                        customer_telepon: element.customer?.telepon ?? "-",
                        marketing: element.customer?.marketing?.nama ?? "-",
                    });
                });
            },
        });
    }

    function polygonClick() {
        var polygon = document.querySelectorAll("polygon");
        var path = document.querySelectorAll("path[data-id]");
        polygon = [...polygon, ...path];
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
    }

    function getCustomerData() {
        $.ajax({
            type: "GET",
            url: "cavling-customer",
            data: {
                perumahan: localStorage.getItem("perumahan"),
                length: 999,
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
            data: {
                length: 999,
            },
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
                $("#input-marketing")
                    .val(data.customer?.marketing_id)
                    .trigger("change");
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
            marketing: {
                validators: {
                    notEmpty: {
                        message: "Marketing is required",
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

// SVG
function downloadSVG() {
    let svg_cavling = document.querySelector("#svg_cavling");
    let ket_cavling =
        "<svg id='ket_cavling' xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' style='shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd'> <!-- Background rectangle --><rect width='100%' height='100%' fill='white' /><!-- Text --><text x='10' y='40' font-family='Arial' font-size='18' fill='black' font-weight='bold'>Keterangan :</text><!-- Rectangles --><rect x='10' y='60' width='30' height='30' fill='rgb(245, 248, 250)' /><text x='50' y='85' font-family='Arial' font-size='14' fill='black'>Kosong</text><rect x='110' y='60' width='30' height='30' fill='rgb(80, 205, 137)' /><text x='150' y='85' font-family='Arial' font-size='14' fill='black'>Booking</text><rect x='210' y='60' width='30' height='30' fill='rgb(0, 158, 247)' /><text x='250' y='85' font-family='Arial' font-size='14' fill='black'>Proses Berkas</text><rect x='350' y='60' width='30' height='30' fill='rgb(241, 65, 108)' /><text x='390' y='85' font-family='Arial' font-size='14' fill='black'>Sudah Akad</text><rect x='480' y='60' width='30' height='30' fill='rgb(255, 199, 0)' /><text x='520' y='85' font-family='Arial' font-size='14' fill='black'>Cash/Lunas</text><rect x='610' y='60' width='30' height='30' fill='rgb(114, 57, 234)' /><text x='650' y='85' font-family='Arial' font-size='14' fill='black'>SP3K</text></svg>";

    // Create a new SVG element
    let combinedSVG = document.createElementNS(

        "http://www.w3.org/2000/svg",
        "svg"
    );

    // Set attributes for the combined SVG (adjust width and height as needed)
    combinedSVG.setAttribute("width", "400");
    combinedSVG.setAttribute("height", "200");

    // Append the content of the first SVG
    combinedSVG.innerHTML = svg_cavling.outerHTML;

    // Append the content of the second SVG
    combinedSVG.innerHTML += ket_cavling;

    // Add the content of the combined SVG to the DOM
    document.body.appendChild(combinedSVG);
    // console.log(document.body.appendChild(combinedSVG));

    document.body.appendChild(combinedSVG);


    var svgBlob = new Blob([combinedSVG.outerHTML], {
        type: "image/svg+xml",
    });
    var svgUrl = URL.createObjectURL(svgBlob);
    var a = document.createElement("a");
    a.href = svgUrl;
    var tgl = new Date();
    a.download =
        "Denah-Cavling-" +
        tgl.getDate() +
        "-" +
        (tgl.getMonth() + 1) +
        "-" +
        tgl.getFullYear() +
        ".svg";
    a.click();
}

// function downloadPNG() {
//     // dom-to-image library

//     let svgElement = document.getElementsByClassName("cavling-data")[0];

//     let ket_cavling =
//         "<svg id='ket_cavling' xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' style='shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd'> <!-- Background rectangle --><rect width='100%' height='100%' fill='white' /><!-- Text --><text x='10' y='40' font-family='Arial' font-size='18' fill='black' font-weight='bold'>Keterangan :</text><!-- Rectangles --><rect x='10' y='60' width='30' height='30' fill='rgb(245, 248, 250)' /><text x='50' y='85' font-family='Arial' font-size='14' fill='black'>Kosong</text><rect x='110' y='60' width='30' height='30' fill='rgb(80, 205, 137)' /><text x='150' y='85' font-family='Arial' font-size='14' fill='black'>Booking</text><rect x='210' y='60' width='30' height='30' fill='rgb(0, 158, 247)' /><text x='250' y='85' font-family='Arial' font-size='14' fill='black'>Proses Berkas</text><rect x='350' y='60' width='30' height='30' fill='rgb(241, 65, 108)' /><text x='390' y='85' font-family='Arial' font-size='14' fill='black'>Sudah Akad</text><rect x='480' y='60' width='30' height='30' fill='rgb(255, 199, 0)' /><text x='520' y='85' font-family='Arial' font-size='14' fill='black'>Cash/Lunas</text><rect x='610' y='60' width='30' height='30' fill='rgb(114, 57, 234)' /><text x='650' y='85' font-family='Arial' font-size='14' fill='black'>SP3K</text></svg>";

//     // Add ket cavling to bottom of svg
//     svgElement.innerHTML += ket_cavling;
//     svgElement.style.backgroundColor = "white";

//     domtoimage
//         .toPng(svgElement, {
//             height: 1200,
//             width: 1200,
//         })
//         .then((dataUrl) => {
//             // set background to white
//             let imgData = dataUrl;
//             let a = document.createElement("a");
//             a.href = imgData;
//             let tgl = new Date();
//             a.download =
//                 "Denah-Cavling-" +
//                 tgl.getDate() +
//                 "-" +
//                 (tgl.getMonth() + 1) +
//                 "-" +
//                 tgl.getFullYear() +
//                 ".png";
//             a.click();

//             // Remove ket cavling from bottom of svg
//             document.getElementById("ket_cavling").remove();
//         })
//         .catch((error) => {
//             console.error("oops, something went wrong", error);
//         });
function downloadWhatsApp() {
    var svg = document.querySelector("#svg_cavling");
    var svg_blob = new Blob([svg.outerHTML], {
        type: "image/svg+xml",
    });
    var svg_url = URL.createObjectURL(svg_blob);
    const img = new Image();

    // convert to png
    img.onload = function () {
        const canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;

        canvg(canvas, svg.outerHTML);

        canvas.toBlob(function (blob) {
            // To WhatsApp
            window.open(
                `https://api.whatsapp.com/send?text=${encodeURIComponent(
                    "Denah Blok 3"
                )}&image=${encodeURIComponent(blob)}`
            );
        }, "image/png");
    };

    img.src = svg_url;
}
