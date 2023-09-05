$(document).ready(function() {
    $("#btneliminar").click(abrirPopup);
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

    var botonCancelar = $("<button>").attr("id", "btnCancelar").text("CANCELAR").css({
        "width": "180px",
        "height": "60px",
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
        "margin-left": "50px"
    });

    var botonAceptar = $("<button>").text("ACEPTAR").css({
        "width": "180px",
        "height": "60px",
        "position": "absolute",
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
        "margin-right": "50px"
    });

    div.append(botonAceptar).append(botonCancelar);
    contenido.append("<p>¿Seguro que deseas eliminar al empleado del sistema?</p>");
    contenido.append(div);

    contenedor.append(contenido);

    $("body").append(contenedor);

    contenedor.fadeIn();

    $("#btnCancelar").click(function() {
        contenedor.remove();
    });
}