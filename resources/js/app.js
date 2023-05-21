import "./bootstrap";

import "../css/app.scss";

// import * as bootstrap from "bootstrap";

// import { popper } from "@popperjs/core";

import Swal from "sweetalert2";

// Activar todos los popovers
// var popoverTriggerList = [].slice.call(
//     document.querySelectorAll('[data-bs-toggle="popover"]')
// );
// var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
//     return new bootstrap.Popover(popoverTriggerEl);
// });

var varPop = "";
$(".card-curso")
    .on("mouseenter", function () {
        let contenedor = $(this).parent().find(".popercard");
        // console.log(contenedor.html());
        varPop = new bootstrap.Popover($(this), {
            container: "body",
            html: true,
            content: function () {
                return contenedor.html();
            },
        });
        varPop.show();
    })
    .on("mouseleave", function () {
        varPop.hide();
    });

$("#button-show-password").on("click", function (event) {
    event.stopPropagation();
    if ($("#login_password").attr("type") == "password") {
        $("#login_password").attr("type", "text");
        $("#icon-eye").removeClass("fa-eye");
        $("#icon-eye").addClass("fa-sharp  fa-eye-slash");
        return;
    } else {
        $("#login_password").attr("type", "password");
        $("#icon-eye").addClass("fa-eye");
        $("#icon-eye").remove("fa-sharp  fa-eye-slash");
    }
});
$("#log_button").on("click", function (event) {
    event.stopPropagation();
});

$(document).on("click", ".openLogin", function () {
    // alert("hgola");
    $("#alert_ins_log").removeClass("d-none");
    $("#alert_ins_log").addClass("show");
    $("#dropdownMenuButton1").trigger("click");
    setTimeout(() => {
        $("#alert_ins_log").removeClass("show");
        $("#alert_ins_log").addClass("d-none");
    }, 5000);
});
