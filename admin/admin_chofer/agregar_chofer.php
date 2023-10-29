<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_chofer.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>

<?php
require_once '../../conexion.php';

$query = "SELECT a.matricula, a.marca, a.modelo
FROM auto a
LEFT JOIN conduce c ON a.matricula = c.matricula
WHERE c.ci IS NULL and activo = 1;";
$result = mysqli_query($conn, $query);
$json = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {

        $marca = $row['marca'];
        $modelo = $row['modelo'];
        $matricula = $row['matricula'];

        $json[] = array(
            'marca' => $marca,
            'modelo' => $modelo,
            'matricula' => $matricula
        );
    }
}
?>

<body>
    <header>
        <a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a id="btnAtras" href="adm_choferes.php" class="btnatras">ATRAS</a>
    </header>

    <div class="contenedor">

        <h1>AGREGAR CHOFER</h1>

        <form action="agregarChofer.php" id="agregarChof" method="POST">
            <div class="cont2">

                <table>
                    <tr>
                        <td>
                            <h2>Nombre</h2>
                            <input type="text" name="nombre" id="nombre"></input>
                        </td>
                        <td>
                            <h2>Apellido</h2>
                            <input type="text" name="apellido" id="apellido"></input>
                        </td>
                        <td>
                            <h2>Telefono</h2>
                            <input type="text" name="telefono" id="tel"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Cedula de Identidad</h2>
                            <input type="text" name="ci" id="ci"></input>
                        </td>
                        <td>
                            <h2>Coche que conduce</h2>
                            <select id="auto" name="matricula">
                                <?php if (empty($json)) { ?>
                                    <option value="" disabled selected>No hay coches disponibles</option>
                                <?php } else { ?>
                                    <option value="" disabled selected>Seleccione un coche</option>
                                    <?php foreach ($json as $auto) { ?>
                                        <option value="<?php echo $auto['matricula']; ?>">
                                            <?php echo $auto['marca'] . ' ' . $auto['modelo'] . ' ' . $auto['matricula']; ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <h2>Tipo de chofer</h2>
                            <select id="tipo_chof" name="de_la_casa">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="1">De la casa 🏠</option>
                                <option value="0">Externo</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <table hidden id="vnto_libreta">
                    <tr>
                        <td>
                            <h2>Vencimiento de Licencia</h2>
                            <input type="date" name="fecha_vnto_libreta" min="<?php echo date('Y-m-d'); ?>"></input>
                        </td>
                    </tr>
                </table>


            </div>


        </form>
        <button id="btnGuardar">GUARDAR</button>

    </div>
    <br><br>
    <div class="footer">

    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
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
            $("#agregarChof").submit();
        }
    });
    $("#tipo_chof").change(function () {
        if ($(this).val() === "1") {
            $("#vnto_libreta").show();
        } else {
            $("#vnto_libreta").hide();
        }
    });
</script>

</html>