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
        <a style="text-decoration: none;" href="../../empleado.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_pagos_cli.php" id="btnAtras" class="btnatras">ATRAS</a>
    </header>

    <div class="contenedor">

        <h1>AGREGAR CLIENTE</h1>

        <div class="cont2">
            <form action="agregar_cli.php" method="POST" id="agregarForm">
                <table>
                    <tr>
                        <td>
                            <h2>Nombre</h2>
                            <input id="nombre" name="nombre_cli" type="text"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Apellido</h2>
                            <input id="apellido" name="apellido_cli" type="text"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Numero de telefono</h2>
                            <input id="tel" name="telefono" type="text"></input> <button id="btnTel">+</button>
                            <input id="tel2" name="telefono2" type="text"></input> <button id="btnTel2">-</button>
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
        });
        $("#btnAtras").click(function () {
            if (confirm("¿Estás seguro de que deseas volver atrás sin guardar los cambios?")) {
                window.history.back();
            }
        });
        $("#btnGuardar").click(function () {
            var camposVacios = false;
            $("input[type='text'], input[type='time'], input[type='date']").each(function () {
                if ($(this).val() === "" && $(this).is(":visible")) {
                    camposVacios = true;
                    return false;
                }
            });

            if (camposVacios) {
                alert("Por favor, complete todos los campos antes de continuar");
            } else {
                $("#agregarForm").submit();
                window.location.href = "adm_pagos_cli.php";
            }
        });
    </script>
</body>

</html>