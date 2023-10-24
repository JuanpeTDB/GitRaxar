<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_editar_chofer.css">
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
    </header>


    <?php
    require_once '../../conexion.php';
    $ci = $_GET['ci'];

    $query = "SELECT *  FROM chofer c WHERE ci = '$ci'";
    $result = mysqli_query($conn, $query);
    $json = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ci = $row['ci'];
            $new_ci = $row['ci'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $telefono = $row['telefono'];
            $de_la_casa = $row['de_la_casa'];
            $fecha_vnto_libreta = $row['fecha_vnto_libreta'];
        }
    }
    ?>

    <div class="contenedor">

        <h1>EDITAR CHOFER</h1>

        <form id="edicion" action="editarChofer.php" method="POST">
            <input type="hidden" name="ci" value="<?php echo $ci; ?>">
            <div class="cont2">

                <table>
                    <tr>
                        <td>
                            <h2>Nombre</h2>
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>"></input>
                        </td>
                        <td>
                            <h2>Apellido</h2>
                            <input type="text" name="apellido" value="<?php echo $apellido; ?>"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Telefono</h2>
                            <input type="number" id="tel" name="telefono" value="<?php echo $telefono; ?>"></input>
                        </td>
                        <td>
                            <h2>Tipo de chofer</h2>
                            <select id="tipo_chof" name="de_la_casa">
                                <option value="1" <?php if ($de_la_casa == 1)
                                    echo 'selected'; ?>>De la casa</option>
                                <option value="0" <?php if ($de_la_casa == 0)
                                    echo 'selected'; ?>>Externo</option>
                            </select>
                        </td>

                    </tr>
                </table>
                <table hidden id="vnto_libreta">
                    <tr>
                        <td>
                            <h2>Vencimiento de Licencia</h2>
                            <input type="date" name="fecha_vnto_libreta"
                                value="<?php echo $fecha_vnto_libreta; ?>"></input>
                        </td>
                    </tr>
                </table>

            </div>


        </form>
        <button id="btnAtras">ATRAS</button>
        <button id="btnGuardar">GUARDAR</button>

        <br><br><br><br><br>
        <div class="footer">

        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            if ($("#tipo_chof").val() === "1") {
                $("#vnto_libreta").show();
            }
            $("#tipo_chof").change(function () {
                if ($("#tipo_chof").val() === "1") {
                    $("#vnto_libreta").show();
                } else {
                    $("#vnto_libreta").hide();
                }
            });
        });
        $("#btnAtras").click(function () {
            if (confirm("¿Estás seguro de que deseas volver atrás sin guardar los cambios?")) {
                window.history.back();
            }
        });
        $("#btnGuardar").click(function () {
            $("#edicion").submit();
        });

        $("#tel").on("input", function () {
            var inputValue = $(this).val();

            if (inputValue.length == 2 && inputValue !== "09") {
                $(this).val("09" + inputValue);

            }

            if (inputValue.length > 9) {
                $(this).val(inputValue.slice(0, 9)); // Limita la longitud a 8 caracteres
            }
        });
    </script>
</body>