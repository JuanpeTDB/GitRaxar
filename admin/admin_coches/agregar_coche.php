<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_coche.css">
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
        <a id="btnAtras" href="adm_coches.php" class="btnatras">ATRAS</a>
    </header>

    <div class="contenedor">

        <h1>AGREGAR COCHE</h1>

        <form action="agregarCoche.php" method="POST">
            <div class="cont2">

                <table>
                    <tr>
                        <td>
                            <h2>Marca</h2>
                            <input type="text" name="marca"></input>
                        </td>
                        <td>
                            <h2>Modelo</h2>
                            <input type="text" name="modelo"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Matricula</h2>
                            <input type="text" id="matricula" name="matricula"></input>
                        </td>
                        <td>
                            <h2>Año</h2>
                            <input id="anio" type="text" name="anio"></input>
                        </td>
                    </tr>
                </table>

            </div>

        </form>


    </div>

    <div class="divGuardar">
        <button id="btnGuardar">GUARDAR</button>
    </div>
    <br><br><br><br><br>
    <div class="footer">

    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#anio").on("input", function () {
            var regex = /[^0-9]/g;
            if ($(this).val().match(regex)) {
                $(this).addClass("invalid");
                $(this).val($(this).val().replace(regex, ""));
            } else {
                $(this).removeClass("invalid");
            }
            if ($(this).val().length > 4) {
                $(this).val($(this).val().slice(0, 4));
            }
        });
    });
    $("#btnAtras").click(function () {
        if (confirm("¿Estás seguro de que deseas volver atrás sin guardar los cambios?")) {
            window.history.back();
        }
    });
    $("#btnGuardar").click(function () {
        if ($("#matricula").val() == "" || $("#anio").val() == "" || $("#marca").val() == "" || $("#modelo").val() == "") {
            alert("Por favor, rellene todos los campos");
        } else {
            if (confirm("¿Estás seguro de que deseas guardar los cambios?")) {
                $("form").submit();
            }
        }
    }
    $("#matricula").on("input", function () {
        var regex = /^SRE \d{0,4}$/;
        var inputValue = $(this).val();

        if (!regex.test(inputValue)) {
            $(this).addClass("invalid");
        } else {
            $(this).removeClass("invalid");
        }

        // Add "SRE" before the input value
        inputValue = "SRE " + inputValue.replace(/\D/g, "");

        if (inputValue.length > 8) {
            inputValue = inputValue.slice(0, 8);
        }

        $(this).val(inputValue);
    });
</script>

</html>