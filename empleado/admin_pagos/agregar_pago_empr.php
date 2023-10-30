<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_pago.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>

<body>
    <header>
        <a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_pagos_empr.php" class="btnatras" id="btnAtras">ATRAS</a>
    </header>
    <div class="contenedor">

        <h1>AGREGAR EMPRESA</h1>

        <form action="agregar_empr.php" method="POST" id="agregarForm">
            <div class="cont2">
                <table>
                    <tr>
                        <td>
                            <h2>Nombre</h2>
                            <input id="nombre_emp" name="nombre_empresa" type="text"></input>
                        </td>
                        <td>
                            <h2>Razon Social</h2>
                            <input id="razon_s" name="razon_social" type="text"></input>
                        </td>
                        <td>
                            <h2>Rut</h2>
                            <input id="rut" name="rut" type="text"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Nombre de Encargado</h2>
                            <input id="nombre" name="nombre_cli" type="text"></input>
                        </td>
                        <td>
                            <h2>Apellido de Encargado</h2>
                            <input id="apellido" name="apellido_cli" type="text"></input>
                        </td>
                        <td>
                            <h2>Numero de telefono</h2>
                            <input id="tel" name="telefono" type="text"></input> <button type="button"
                                id="btnTel">+</button>
                            <input id="tel2" name="telefono2" type="text"></input> <button type="button"
                                id="btnTel2">-</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

    <div class="divGuardar">
        <button id="btnGuardar">GUARDAR</button>
    </div>
    <br><br>
    <div class="footer">

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script_funciones.js"></script>
    <script>
        $("#btnTel").click(function (event) {
            event.preventDefault();
            $("#tel2").css("display", "inline");
            $("#btnTel2").css("display", "inline");
        });
        $("#btnTel2").click(function (event) {
            event.preventDefault();
            $("#tel2").hide();
            $("#btnTel2").hide();
            $("#tel2").val("");
        });
        $(document).ready(function () {
            $("#nombre").on("input", function () {
                var regex = /[^a-zA-ZñÑçÇ ]/g;
                if ($(this).val().match(regex)) {
                    $(this).addClass("invalid");
                    $(this).val($(this).val().replace(regex, ""));
                } else {
                    $(this).removeClass("invalid");
                }
            });
            $("#apellido").on("input", function () {
                var regex = /[^a-zA-ZñÑçÇ ]/g;
                if ($(this).val().match(regex)) {
                    $(this).addClass("invalid");
                    $(this).val($(this).val().replace(regex, ""));
                } else {
                    $(this).removeClass("invalid");
                }
            });
            $("#tel").on("input", function () {
                var regex = /[^0-9]/g;
                if ($(this).val().match(regex)) {
                    $(this).addClass("invalid");
                    $(this).val($(this).val().replace(regex, ""));
                } else {
                    $(this).removeClass("invalid");
                }
                var inputValue = $(this).val();

                if (inputValue.length == 2 && inputValue !== "09") {
                    $(this).val("09" + inputValue);

                }

                if (inputValue.length > 9) {
                    $(this).val(inputValue.slice(0, 9)); // Limita la longitud a 8 caracteres
                }
            });
            $("#tel2").on("input", function () {
                var regex = /[^0-9]/g;
                if ($(this).val().match(regex)) {
                    $(this).addClass("invalid");
                    $(this).val($(this).val().replace(regex, ""));
                } else {
                    $(this).removeClass("invalid");
                }
                var inputValue = $(this).val();

                if (inputValue.length == 2 && inputValue !== "09") {
                    $(this).val("09" + inputValue);

                }

                if (inputValue.length > 9) {
                    $(this).val(inputValue.slice(0, 9)); // Limita la longitud a 8 caracteres
                }
            });
            $("#rut").on("input", function () {
                var regex = /[^0-9]/g;
                if ($(this).val().match(regex)) {
                    $(this).addClass("invalid");
                    $(this).val($(this).val().replace(regex, ""));
                } else {
                    $(this).removeClass("invalid");
                }
                var inputValue = $(this).val();

                if (inputValue.length > 11) {
                    $(this).val(inputValue.slice(0, 11)); // Limita la longitud a 8 caracteres
                }
            });
        });
        $("#btnAtras").click(function () {
            if (confirm("¿Estás seguro de que deseas volver atrás sin guardar los cambios?")) {
                window.history.back();
            }
        });
        $("#btnGuardar").click(function () {
            var camposVacios = false;
            $("input").each(function () {
                if ($(this).val() === "" && $(this).is(":visible")) {
                    mensaje = "Por favor, complete todos los campos antes de continuar";
                    camposVacios = true;
                    return false;
                } else if ($(this).hasClass("invalid")) {
                    mensaje = "Por favor, revise los campos en rojo antes de continuar";
                    camposVacios = true;
                    return false;
                } else if ($(this).attr("id") === "tel" && $(this).val().length < 9) {
                    mensaje = "Por favor, ingrese al menos un número de teléfono válido antes de continuar";
                    camposVacios = true;
                    return false;
                } else if ($(this).attr("id") === "tel2" && $(this).val().length < 9 && $(this).val() !== "") {
                    mensaje = "Por favor, ingrese al menos un número de teléfono válido antes de continuar";
                    camposVacios = true;
                    return false;
                } else if ($(this).attr("id") === "rut" && $(this).val().length < 11) {
                    mensaje = "Por favor, ingrese un rut válido antes de continuar";
                    camposVacios = true;
                    return false;
                }
            });

            if (camposVacios) {
                alert(mensaje);
            } else {
                $("#agregarForm").submit();
            }
        });
    </script>
</body>

</html>