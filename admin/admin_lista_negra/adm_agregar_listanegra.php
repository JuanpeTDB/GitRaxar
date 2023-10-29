<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_agregar_listanegra.css">
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
        <a id="btnAtras" href="adm_listanegra.php" class="btnatras">ATRAS</a>
    </header>

    <div class="contenedor">

        <h1>LISTA NEGRA</h1>
        <form action="agregar_listanegra.php" id="LN" method="POST">
            <table>
                <tr>
                    <td>
                        <h2>Nombre cliente</h2>
                        <input id="nombre_cliente" name="nombre_cliente" type="text"></input>
                    </td>
                    <td>
                        <h2>Apellido cliente</h2>
                        <input id="apellido_cliente" name="apellido_cliente" type="text"></input>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h2>Motivo</h2>
                        <input name="comentario" type="text"></input>
                    </td>
                </tr>

            </table>

        </form>

    </div>
    <div class="divGuardar">
        <button id="btnGuardar">GUARDAR</button>
    </div>

    <br><br><br>
    <div class="footer">

    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#nombre_cliente").on("input", function () {
            var regex = /[^a-zA-ZñÑçÇ ]/g;
            if ($(this).val().match(regex)) {
                $(this).addClass("invalid");
                $(this).val($(this).val().replace(regex, ""));
            } else {
                $(this).removeClass("invalid");
            }
        });
        $("#apellido_cliente").on("input", function () {
            var regex = /[^a-zA-ZñÑçÇ ]/g;
            if ($(this).val().match(regex)) {
                $(this).addClass("invalid");
                $(this).val($(this).val().replace(regex, ""));
            } else {
                $(this).removeClass("invalid");
            }
        });

    });
    $("#btnGuardar").click(function () {
        $("#LN").submit();
        window.history.back();
    });
    $("#btnAtras").click(function () {
        if (confirm("¿Estás seguro de que deseas volver atrás sin guardar los cambios?")) {
            window.history.back();
        }
    });
</script>

</html>