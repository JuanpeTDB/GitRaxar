$(document).ready(function() {
    $("#metodoPago").change(function() {
        if ($(this).val() === "4") {
            $("#opcionesTarjeta").show();
        } else {
            $("#opcionesTarjeta").hide();
        }
    });

    $("#btnContinuar").click(function() {

        $("#metodoPago").change(function() {
            if ($(this).val() != "") {
                abrirPopup();
            } else {
                alert("Por favor seleccione una opcion");
            }
        });
    });

});

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

    var contenido = $("<div>").css({
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
        "padding-top": "60px",
        "display": "flex",
        "justify-content": "center",
        "align-items": "center"
    });

    var agendarOtro = $("<button>").attr("id", "agendarOtro").text("AGENDAR OTRO VIAJE").css({
        "width": "190px",
        "height": "100px",
        "position": "absolute",
        "left": "0px",
        "text-align": "center",
        "background-color": "#9ED4AE",
        "border-color": "#20A144",
        "border-style": "solid",
        "border-width": "3px",
        "border-radius": "15px",
        "font-family": "nexa",
        "font-size": "25px",
        "color": "#20A144",
    });

    var volverInicio = $("<button>").attr("id", "volverInicio").text("VOLVER A INICIO").css({
        "width": "190px",
        "height": "100px",
        "position": "absolute",
        "left": "350px",
        "right": "0px",
        "text-align": "center",
        "background-color": "#9ED4AE",
        "border-color": "#20A144",
        "border-style": "solid",
        "border-width": "3px",
        "border-radius": "15px",
        "font-family": "nexa",
        "font-size": "25px",
        "color": "#20A144",

    });

    div.append(volverInicio).append(agendarOtro);
    contenido.append("<p>Viaje confirmado, que deseas hacer ahora?</p>");
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