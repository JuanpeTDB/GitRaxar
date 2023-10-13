
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
        $query = "SELECT c.nombre_cli, c.apellido_cli, cc.deuda from cuenta_corriente cc
        join forma_de_pago fp on fp.cod_pago = cc.cod_pago
        join tiene t on t.cod_pago = fp.cod_pago
        join viajes v on v.cod_viaje = t.cod_viaje
        join reserva r on r.cod_viaje = v.cod_viaje
        join cliente c on c.cod_cliente = r.cod_cliente
        join particular p on p.cod_cliente = c.cod_cliente
        WHERE c.cod_cliente = $cod_cliente;";
        $result = mysqli_query($conn, $query);
        $json = array();
        if($result) {
            while($row = mysqli_fetch_assoc($result)) {
                $nombre_cli = $row['nombre_cli'];
                $apellido_cli = $row['apellido_cli'];
                $deuda = $row['deuda'];
            
            }
        }
    ?>

    <header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_pagos.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">

        <h1><?php echo $nombre_cli?> <?php echo $apellido_cli ?></h1>
        <input type="hidden" id="cod_cliente" value="<?php echo $cod_cliente ?>">


        <br><br><br><br>

        <div class="deuda">
            <h2>DEUDA: </h2><h2 id="deuda">$</h2>
        </div>

        <br><br>

        <table id="container_info">
            
        </table>
    
    
        <br><br>
        
        <button>
            SALDAR
        </button>  

        <br><br><br>
    

    </div>
    <div class="footer">
            
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/mostrar_viajes.js"></script>
</body>
</html>