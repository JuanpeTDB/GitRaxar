$(document).ready(function() {
    var cod_viaje = $("#cod_viaje").val();

    $("#metodoPago").change(function() {
        var tarjeta = " ";
        if ($(this).val() === "4") {
            $("#opcionesTarjeta").show();
        } else {
            $("#opcionesTarjeta").hide();
        }
    });

    $("#btnContinuar").click(function() {
        var metodoPago = $("#metodoPago").val();
        var MP = " ";
        var tipoTarjeta = $("input[name='tipoTarjeta']:checked").val();

        if (metodoPago === null || metodoPago === "") {
            alert("Por favor, seleccione un método de pago.");
        } else if (metodoPago === "4" && (tipoTarjeta === undefined || tipoTarjeta === null)) {
            alert("Por favor, seleccione un tipo de tarjeta.");
        } else if (metodoPago === "4" && (tipoTarjeta === "debito")) {
            MP = "debito";
            almacenarViaje(cod_viaje, MP);
            abrirPopup();
        } else if (metodoPago === "4" && (tipoTarjeta === "credito")) {
            MP = "credito";
            almacenarViaje(cod_viaje, MP);
            abrirPopup();
        } else if (metodoPago === "1") {
            MP = "efectivo";
            almacenarViaje(cod_viaje, MP);
            abrirPopup();
        } else if (metodoPago === "2") {
            MP = "transferencia";
            almacenarViaje(cod_viaje, MP);
            abrirPopup();
        } else if (metodoPago === "3") {
            MP = "cta_corriente";
            almacenarViaje(cod_viaje, MP);
            abrirPopup();
        }
    });
});


function almacenarViaje(cod_viaje, MP) {
    $.ajax({
        url: 'almacenarFp.php',
        type: 'POST',
        data: {
            res: 1,
            cod_viaje: cod_viaje,
            MP: MP
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