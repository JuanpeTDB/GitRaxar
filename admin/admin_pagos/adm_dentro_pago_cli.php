
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dtro_pago_cli.css">
    <script src="https://kit.fontawesome.com/28b29172a8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

    <?php
        require_once '../../conexion.php';
        $cod_cliente = $_GET['cod_cliente'];
        $query = "SELECT * from cliente c
        join tel_cli tc on tc.cod_cliente = c.cod_cliente
        WHERE c.cod_cliente = $cod_cliente;";
        $result = mysqli_query($conn, $query);
        $json = array();
        if($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $nombre_cli = $row['nombre_cli'];
                $apellido_cli = $row['apellido_cli'];
                $cod_cliente = $row['cod_cliente']; 
                $telefono = $row['telefono'];            
            }
        }
    ?>

    <input type="hidden" id="telefono" value="<?php echo $telefono ?>">
    <input type="hidden" id="nombre_cli" value="<?php echo $nombre_cli ?>">
    <input type="hidden" id="apellido_cli" value="<?php echo $apellido_cli ?>">

    <header>
    <a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_pagos_cli.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">

        <h1><?php echo $nombre_cli?> <?php echo $apellido_cli ?></h1>
        <h2>Tel: +598 0<?php echo substr($telefono, 0, 2) ?> <?php echo substr($telefono, 2, 3) ?> <?php echo substr($telefono, 5, 3) ?></h2>
        <button title="Notificar cliente" id="wpp_cli"><i class="fa-brands fa-whatsapp"></i></button>

        <br><br>

        <div class="deuda">
            <h2>DEUDA: </h2><h2 id="deuda">$</h2>
        </div>

        <br><br>

        <table id="container_info">
            
        </table>
    
    
        <br><br>
        
        <form action="saldar_cli.php" method="POST" id="saldarForm">
        <input type="hidden" id="cod_cliente" name="cod_cliente" value="<?php echo $cod_cliente ?>">
            <button type="button" id="saldarButton">
                SALDAR
            </button>  
        </form>
            

        <br><br><br>
    

    </div>
    <div class="footer">
            
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/mostrar_viajes.js"></script>
    <script>
        $(document).ready(function() {
            $("#saldarButton").on("click", function() {
                if (confirm("¿Estás seguro de que deseas realizar esta acción?")) {
                    $("#saldarForm").submit();
                }
            });
        });
    </script>
</body>
</html>