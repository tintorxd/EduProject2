import "./bootstrap";

import "../css/app.scss";

import * as bootstrap from "bootstrap";

// import { popper } from "@popperjs/core";

import Swal from "sweetalert2";

// Habilitacion de horarios y dias para Cursos
$(".calendar-check").on("click", function () {
    var dia = $(this).data("day");
    if ($(this).is(":checked")) {
        $("#hora-" + dia).prop("disabled", false);
        $("#fin-" + dia).prop("disabled", false);
    } else {
        $("#hora-" + dia).prop("disabled", true);
        $("#fin-" + dia).prop("disabled", true);
    }
});
$("#check-mismo-horario").on("click", function () {
    if ($(this).is(":checked")) {
        $("#mismo-horario").prop("disabled", false);
        $("#mismo-finhorario").prop("disabled", false);
    } else {
        $("#mismo-horario").prop("disabled", true);
        $("#mismo-finhorario").prop("disabled", true);
    }
});
$("#mismo-horario").on("change", function () {
    let valorActual = $(this).val();
    let dias = [
        "lunes",
        "martes",
        "miercoles",
        "jueves",
        "viernes",
        "sabado",
        "domingo",
    ];

    dias.forEach((dia) => {
        if ($("#check-" + dia).is(":checked")) {
            $("#hora-" + dia).val(valorActual);
        }
    });
});
$("#mismo-finhorario").on("change", function () {
    let valorActual = $(this).val();
    let dias = [
        "lunes",
        "martes",
        "miercoles",
        "jueves",
        "viernes",
        "sabado",
        "domingo",
    ];

    dias.forEach((dia) => {
        if ($("#check-" + dia).is(":checked")) {
            $("#fin-" + dia).val(valorActual);
        }
    });
});
