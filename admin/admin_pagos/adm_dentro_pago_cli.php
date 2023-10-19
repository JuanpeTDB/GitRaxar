
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dtro_pago_cli.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

    <?php
        require_once '../../conexion.php';
        $cod_cliente = $_GET['cod_cliente'];
        $query = "SELECT * from cliente c WHERE c.cod_cliente = $cod_cliente;";
        $result = mysqli_query($conn, $query);
        $json = array();
        if($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $nombre_cli = $row['nombre_cli'];
                $apellido_cli = $row['apellido_cli'];
                $cod_cliente = $row['cod_cliente'];            
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
        <a href="adm_pagos_cli.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">

        <h1><?php echo $nombre_cli?> <?php echo $apellido_cli ?></h1>

        <br><br><br><br>

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