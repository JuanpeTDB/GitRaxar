$(document).ready(function() {
    var cod_viaje = $("#cod_viaje").val();

    $("#emp, #par").hide();
    $('input[name="tipoCC"]').change(function() {
        MP = "cuenta_corriente";
        tipoCC = $(this).val();
        cod_cuenta = "";
        console.log(tipoCC);

        if ($(this).val() === "1") {
            $('#emp').hide();
            $('#par').show();
            $("#par").change(function() {
                cod_cuenta = $("#par").val();
                console.log(cod_cuenta);
                $("#btnContinuar").click(function() {
                    almacenarViajeCC(cod_viaje, cod_cuenta);
                    wpp(MP);
                    abrirPopup();
                });
            });
        } else if ($(this).val() === "2") {
            $('#par').hide();
            $('#emp').show();
            $("#emp").change(function() {
                cod_cuenta = $("#emp").val();
                console.log(cod_cuenta);
                $("#btnContinuar").click(function() {
                    almacenarViajeCC(cod_viaje, cod_cuenta);
                    wpp(MP);
                    abrirPopup();
                });
            });
        } else {
            $('#emp, #par').hide();
            $("#btnContinuar").click(function() {
                alert("Por favor, seleccione una cuenta corriente.");
            });
        }
    });

    $("#btnAtras").click(function() {
        var cod_viaje2 = $("#cod_viaje").val();
        $.ajax({
            url: 'cancelarViaje2.php',
            type: 'POST',
            data: {
                res: 1,
                cod_viaje2: cod_viaje2,
            },
            success: function(response) {
                console.log("Entro al ajax");
            }
        });
    });

    $("#metodoPago").change(function() {
        var tarjeta = " ";
        if ($(this).val() === "4") {
            $("#emp, #par").hide();
            $("#opcionesTarjeta").show();
        } else {
            $("#opcionesTarjeta").hide();
            $("#emp, #par").hide();
        }
        if ($(this).val() === "3") {
            $("#opcionesCC").show();
        } else {
            $("#opcionesCC").hide();
        }
    });

    $("#btnContinuar").click(function() {
        var metodoPago = $("#metodoPago").val();
        var MP = " ";
        var tipoTarjeta = $("input[name='tipoTarjeta']:checked").val();
        var tipoCC = $("input[name='tipoCC']:checked").val();

        if (metodoPago === null || metodoPago === "") {
            alert("Por favor, seleccione un método de pago.");
        } else if (metodoPago === "4" && (tipoTarjeta === undefined || tipoTarjeta === null)) {
            $("#emp, #par").hide();
            console.log("tarjeta");
            alert("Por favor, seleccione un tipo de tarjeta.");
        } else if (metodoPago === "4" && (tipoTarjeta === "debito")) {
            MP = "debito";
            almacenarViaje(cod_viaje, MP);
            wpp(MP);
            abrirPopup();
        } else if (metodoPago === "4" && (tipoTarjeta === "credito")) {
            MP = "credito";
            almacenarViaje(cod_viaje, MP);
            wpp(MP);
            abrirPopup();
        } else if (metodoPago === "1") {
            $("#emp, #par").hide();
            console.log("contado");
            MP = "contado";
            almacenarViaje(cod_viaje, MP);
            wpp(MP);
            abrirPopup();
        } else if (metodoPago === "2") {
            $("#emp, #par").hide();
            console.log("transferencia");
            MP = "transferencia";
            almacenarViaje(cod_viaje, MP);
            wpp(MP);
            abrirPopup();
        } else if (metodoPago === "3" && (tipoCC === undefined || tipoCC === null)) {
            console.log("cta_corriente");
            alert("Por favor, seleccione un tipo de cuenta corriente.");
        }
    });
});

function wpp(MP) {
    var fecha = $("#fecha").val();
    var hora = $("#hora_inicio").val();
    var origen = $("#origen").val();
    var destino = $("#destino").val();
    var nombre_viajero = $("#nombre_viajero").val();
    var apellido_viajero = $("#apellido_viajero").val();
    var importe = $("#importe").val();
    var comentario = $("#comentario").val();
    var msg = "*Viaje:* " + fecha + "\n" +
        "*Hora:* " + hora + " hs\n" +
        "*Origen:* " + origen + "\n" +
        "*Destino:* " + destino + "\n" +
        "*Cliente:* " + nombre_viajero + " " + apellido_viajero + "\n" +
        "*Forma de pago:* " + MP + "\n" +
        "*Importe:* " + importe + "\n" +
        "*Comentario:* " + comentario;
    var tel = "+598" + $("#telefono").val();
    console.log(tel);

    var url = "whatsapp://send?text=" + encodeURIComponent(msg) + "&phone=" + encodeURIComponent(tel);

    window.open(url);
}



function almacenarViaje(cod_viaje, MP) {
    console.log(cod_viaje);
    console.log(MP);
    $.ajax({
        url: 'almacenarFp.php',
        type: 'POST',
        data: {
            res: 1,
            cod_viaje: cod_viaje,
            MP: MP,
        },
        success: function(response) {
            console.log(response);
        }
    });
}

function almacenarViajeCC(cod_viaje, cod_cuenta) {
    console.log(cod_viaje);
    console.log(cod_cuenta);
    $.ajax({
        url: 'almacenarFpCc.php',
        type: 'POST',
        data: {
            res: 1,
            cod_viaje: cod_viaje,
            cod_cuenta: cod_cuenta,
        },
        success: function(response) {
            console.log(response);
        }
    });
}


function abrirPopup() {
    var contenedor = $("<div>").css({
        "position": "fixed",
        "top": "0",
        "left": "0",
        "width": "100%",
        "height": "100%",
        "background-color": "rgba(0, 0, 0, 0.5)",
        "display": "flex",
        "justify-content": "center",
        "align-items": "center"
    });

    var contenido = $("<div>").addClass("contElim").css({
        "width": "40%",
        "padding": "80px",
        "height": "40%",
        "position": "fixed",
        "text-align": "center",
        "background-color": "#F5F5F5",
        "border-color": "#20A144",
        "border-style": "solid",
        "border-width": "3px",
        "border-radius": "15px",
        "font-family": "nexa",
        "font-size": "35px",
        "color": "#20A144",
        "box-shadow": "0 2px 4px rgba(0, 0, 0, 0.2)"

    });

    var div = $("<div>").css({
        "width": "100%",
        "position": "relative",
        "padding": "0",
        /* "padding-top": "60px", */
        "display": "flex",
        "justify-content": "center",
        "align-items": "center"
    });

    var agendarOtro = $("<button>").attr("id", "agendarOtro").text("Agendar otro").css({
        "width": "180px",
        "height": "60px",
        "position": "relative",
        "left": "10%",
        "text-align": "center",
        "background-color": "#9ED4AE",
        "border-color": "#20A144",
        "border-style": "solid",
        "border-width": "3px",
        "border-radius": "15px",
        "font-family": "nexa",
        "font-size": "22px",
        "color": "#20A144",
        "margin-top": "50px"
    });

    var volverInicio = $("<button>").attr("id", "volverInicio").text("Volver a inicio").css({
        "width": "180px",
        "height": "60px",
        "position": "relative",
        "right": "10%",
        "text-align": "center",
        "background-color": "#9ED4AE",
        "border-color": "#20A144",
        "border-style": "solid",
        "border-width": "3px",
        "border-radius": "15px",
        "font-family": "nexa",
        "font-size": "22px",
        "color": "#20A144",
        "margin-top": "50px"

    });

    div.append(volverInicio).append(agendarOtro);
    contenido.append("<p class='parrafoElim'>Viaje confirmado, que deseas hacer ahora?</p>");
    contenido.append(div);

    contenedor.append(contenido);

    $("body").append(contenedor);

    contenedor.fadeIn();

    $("#agendarOtro").click(function() {
        window.location.href = 'adm_agendar_viaje.php';
    });

    $("#volverInicio").click(function() {
        console.log("Hoal");
        window.location.href = '../../admin.php';
    });
}