<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dtro_pago_empr.css">
    <script src="https://kit.fontawesome.com/28b29172a8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/REMI_logo.png">
</head>

<body>

    <?php
    require_once '../../conexion.php';
    $rut = $_GET['rut'];
    $query = "SELECT * from empresa e
            join cliente c on c.cod_cliente = e.cod_cliente
            join tel_cli tc on tc.cod_cliente = c.cod_cliente 
            WHERE e.rut = $rut;";
    $result = mysqli_query($conn, $query);
    $json = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nombre_empresa = $row['nombre_empresa'];
            $telefono = $row['telefono'];
            $nombre_cli = $row['nombre_cli'];
            $apellido_cli = $row['apellido_cli'];

        }
    }
    ?>
    <input type="hidden" id="telefono" value="<?php echo $telefono ?>">
    <input type="hidden" id="nombre_cli" value="<?php echo $nombre_cli ?>">


    <header>
        <a style="text-decoration: none;" href="../../empleado.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_pagos_empr.php" class="btnatras">ATRAS</a>
    </header>

    <div class="contenedor">

        <h1>
            <?php echo $nombre_empresa ?>
        </h1>
        <input type="hidden" id="rut" value="<?php echo $rut ?>">
        <h2>Tel: +598 0<?php echo substr($telefono, 0, 2) ?>
            <?php echo substr($telefono, 2, 3) ?>
            <?php echo substr($telefono, 5, 3) ?>
        </h2><h2> <?php echo $nombre_cli ?> <?php echo $apellido_cli ?></h2>
        <button title="Notificar cliente" id="wpp_emp"><i class="fa-brands fa-whatsapp"></i></button>


        <br><br>

        <div class="deuda">
            <h2>DEUDA: </h2>
            <h2 id="deuda">$</h2>
        </div>

        <br><br>

        <table id="container_info">

        </table>


        <br><br>

        <form action="saldar_emp.php" method="POST" id="saldarForm">
            <input type="hidden" id="rut" name="rut" value="<?php echo $rut ?>">
            <button type="button" id="saldarButton">
                SALDAR
            </button>
        </form>

        <br><br><br>


    </div>
    <div class="footer">

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/mostrar_viajes_emp.js"></script>
    <script>
        $(document).ready(function () {
            $("#saldarButton").on("click", function () {
                if (confirm("¿Estás seguro de que deseas realizar esta acción?")) {
                    $("#saldarForm").submit();
                }
            });
        });
    </script>
</body>

</html>