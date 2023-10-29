<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_empleado.css">
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
        <a id="btnAtras" href="adm_empleados.php" class="btnatras">ATRAS</a>
    </header>

    <form action="agregarEmpleado.php" method="POST">
        <div class="contenedor">

            <h1>AGREGAR EMPLEADO</h1>

            <div class="cont2">

                <table>
                    <tr>
                        <td>
                            <h2>Nombre</h2>
                            <input id="nombre" type="text" name="nombre"></input>
                        </td>
                        <td>
                            <h2>Apellido</h2>
                            <input id="apellido" type="text" name="apellido"></input>
                        </td>
                        <td>
                            <h2>Cedula</h2>
                            <input id="ci" type="text" name="ci"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Telefono</h2>
                            <input id="tel" type="text" name="telefono"></input>
                        </td>
                        <td>
                            <h2>Nombre de usuario</h2>
                            <input type="text" name="nombre_usuario"></input>
                        </td>
                        <td>
                            <h2>Contraseña</h2>
                            <input id="contrasenia" type="text" name="contrasenia"></input>
                            <p id="msj"
                                style="display: none; font-family:nexa; color: red; padding: 0px; position: absolute; font-size: 12px;">
                                La contraseña debe tener al menos 8 caracteres.
                                Una mayúscula, una minúscula y un número.</p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <h2>Rol</h2>
                            <select name="rol">
                                <option value="" disabled selected>Seleccione un rol</option>
                                <option value="administrador">Administrador</option>
                                <option value="administrativo">Usuario</option>
                            </select>
                        </td>
                    </tr>
                </table>

            </div>

    </form>

    </div>
    <div class="divGuardar">
        <button id="btnGuardar">GUARDAR</button>
    </div>
    <br>
    <div class="footer">

    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#contrasenia").on("input", function () {
            var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            if (!regex.test($(this).val())) {
                $(this).addClass("invalid");
                $("#msj").show();
                $("#msj2").show();
            } else {
                $(this).removeClass("invalid");
                $("#msj").hide();
            }
        });
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
        $("#ci").on("input", function () {
            var regex = /[^0-9]/g;
            if ($(this).val().match(regex)) {
                $(this).addClass("invalid");
                $(this).val($(this).val().replace(regex, ""));
            } else {
                $(this).removeClass("invalid");
            }
            if ($(this).val().length > 8) {
                $(this).val($(this).val().slice(0, 8));
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
        $("#btnGuardar").click(function () {
            if ($("#nombre").val() == "" || $("#apellido").val() == "" || $("#ci").val() == "" || $("#tel").val() == "" || $("#contrasenia").val() == "" || $("#rol").val() == "") {
                alert("Por favor, rellene todos los campos.");
            } else if ($("#contrasenia").hasClass("invalid")) {
                alert("Por favor, ingrese una contraseña válida.");
            } else {
                $("#edicion").submit();
            }
        });
    });
    $("#btnAtras").click(function () {
        if (confirm("¿Estás seguro de que deseas volver atrás sin guardar los cambios?")) {
            window.history.back();
        }
    });
</script>

</html>