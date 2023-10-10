$(document).ready(function() {
    $("#salir").click(abrirPopup);
});

function abrirPopup() {
    var cont1 = $("<div>").css({
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

    var botonCancelar = $("<button>").attr("id", "btnCancelar").text("CANCELAR").css({
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
        "font-size": "25px",
        "color": "#20A144",
        "margin-top": "50px"

    });

    var botonAceptar = $("<button>").attr("id", "btnAceptar").text("ACEPTAR").css({
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
        "font-size": "25px",
        "color": "#20A144",
        "margin-top": "50px"
    });

    div.append(botonAceptar).append(botonCancelar);
    contenido.append("<p class='parrafoElim'>¿Seguro que deseas cerrar sesión?</p>");
    contenido.append(div);

    cont1.append(contenido);

    $("body").append(cont1);

    cont1.fadeIn();

    $("#btnCancelar").click(function() {
        cont1.remove();
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