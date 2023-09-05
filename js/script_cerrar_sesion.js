$(document).ready(function() {
    $("#salir").click(abrirPopup);
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
        "width": "30%",
        "padding": "50px",
        "padding-bottom": "100px",
        "height": "25%",
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
        "padding-top": "20px",
        "display": "flex",
        "justify-content": "center",
        "align-items": "center"
    });

    var botonCancelar = $("<button>").attr("id", "btnCancelar").text("CANCELAR").css({
        "width": "150px",
        "height": "40px",
        "position": "absolute",
        "left": "0px",
        "text-align": "center",
        "background-color": "#9ED4AE",
        "border-color": "#20A144",
        "border-style": "solid",
        "border-width": "3px",
        "border-radius": "15px",
        "font-family": "nexa",
        "font-size": "22px",
        "color": "#20A144",
        "margin-left": "30px"
    });

    var botonAceptar = $("<button>").attr("id", "btnAceptar").text("ACEPTAR").css({
        "width": "150px",
        "height": "40px",
        "position": "absolute",
        "right": "0px",
        "text-align": "center",
        "background-color": "#9ED4AE",
        "border-color": "#20A144",
        "border-style": "solid",
        "border-width": "3px",
        "border-radius": "15px",
        "font-family": "nexa",
        "font-size": "22px",
        "color": "#20A144",
        "margin-right": "30px"
    });

    div.append(botonAceptar).append(botonCancelar);
    contenido.append("<p>¿Seguro que deseas cerrar sesion?</p>");
    contenido.append(div);

    contenedor.append(contenido);

    $("body").append(contenedor);

    contenedor.fadeIn();

    $("#btnCancelar").click(function() {
        contenedor.remove();
    });

    $("#btnAceptar").click(function() {
        $.ajax({
            url: "cerrar_sesion.php",
            method: "POST",
            success: function(response) {
                window.location.href = "login.php";
            }
        });
    });
}