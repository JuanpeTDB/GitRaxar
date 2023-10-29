<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_agendar_viaje.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>

<body>

    <?php
    require_once '../../conexion.php';

    $queryChoferes = "SELECT ci, nombre, apellido, de_la_casa FROM chofer where activo = 1";
    $resultChoferes = mysqli_query($conn, $queryChoferes);
    $jsonChoferes = array();

    if (mysqli_num_rows($resultChoferes) > 0) {
        while ($rowChofer = mysqli_fetch_assoc($resultChoferes)) {
            $ciChofer = $rowChofer['ci'];
            $de_la_casa = $rowChofer['de_la_casa'];
            $nombreChofer = $rowChofer['nombre'] . ' ' . $rowChofer['apellido'];
            $jsonChoferes[] = array('ci' => $ciChofer, 'nombre' => $nombreChofer, 'de_la_casa' => $de_la_casa);
        }
    }
    ?>

    <header>
        <a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a id="BtnAtras" href="adm_viajes.php" class="btnatras">ATRAS</a>
    </header>
    <div class="contenedor">

        <h1>AGENDAR VIAJE</h1>
        <form id="agendar" action="agendarViaje.php" method="POST">
            <table>
                <tr>
                    <td>
                        <h2>Origen</h2>
                        <input name="origen" type="text"></input>
                    </td>
                    <td>
                        <h2>Destino</h2>
                        <input name="destino" type="text"></input>
                    </td>
                    <td>
                        <h2>Hora Inicio</h2>
                        <input name="hora_inicio" type="time"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Nombre Cliente</h2>
                        <input id="nombre" name="nombre_viajero" type="text"></input>
                    </td>
                    <td>
                        <h2>Apellido Cliente</h2>
                        <input id="apellido" name="apellido_viajero" type="text"></input>
                    </td>
                    <td>
                        <h2>Fecha</h2>
                        <input name="fecha" type="date" min="<?php echo date('Y-m-d'); ?>"></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Importe</h2>
                        <input id="importe" name="importe" type="text"></input>
                    </td>
                    <td>
                        <h2>Comentario</h2>
                        <input name="comentario" type="text"></input>
                    </td>
                    <td>
                        <h2>Chofer</h2>
                        <select id="chof" name="ciChofer">
                            <?php
                            if (empty($jsonChoferes)) {
                                echo "<option value='' disabled selected>No hay choferes disponibles</option>";
                            } else {
                                echo "<option value='' disabled selected>Seleccione un chofer</option>";
                                foreach ($jsonChoferes as $chofer) {
                                    $nombreChofer = $chofer['nombre'];
                                    if ($chofer['de_la_casa'] == true) {
                                        echo "<option value='{$chofer['ci']}'>$nombreChofer 🏠</option>";
                                    } else {
                                        echo "<option value='{$chofer['ci']}'>$nombreChofer </option>";
                                    }

                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>

            </table>
        </form>
        <br>
        <br>
        <button id="btnGuardar">CONTINUAR</button>

    </div>
    <br><br><br><br><br>
    <div class="footer">

    </div>

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
            $("#importe").on("input", function () {
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
        });
        $("#btnGuardar").click(function () {
            var camposVacios = false;
            $("input[type='text'], input[type='time'], input[type='date']").each(function () {
                if ($(this).val() === "") {
                    camposVacios = true;
                    return false;
                }
            });

            if (camposVacios) {
                alert("Por favor, complete todos los campos antes de continuar");
            } else {
                $("#agendar").submit();
            }
        });
        $("#BtnAtras").click(function () {
            if (confirm("¿Estás seguro de que deseas volver atrás sin guardar los cambios?")) {
                window.history.back();
            }
        });

    </script>

</body>

</html>