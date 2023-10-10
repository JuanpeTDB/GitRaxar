<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_dentro_viajes.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

    <?php
        require_once '../../conexion.php';
        $cod_viaje = $_GET['cod_viaje'];
        $query = "SELECT v.*, c.*, fp.*
        FROM viajes v
        LEFT JOIN (
            SELECT t.cod_viaje, fp.cod_pago, cod_cuenta, activo, deuda, 'cuenta corriente' as rol, null as tipo 
            FROM cuenta_corriente fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, null as deuda, 'transferencia' as rol, null as tipo 
            FROM transferencia fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, null as deuda, 'contado' as rol, null as tipo 
            FROM contado fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, null as deuda, 'tarjeta' as rol, tipo 
            FROM tarjeta fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
        ) AS fp ON v.cod_viaje = fp.cod_viaje
        join se_encarga se on se.cod_viaje = v.cod_viaje
        join chofer c on c.ci = se.ci
        where v.cod_viaje = $cod_viaje;
        ";

		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $ci = $row['ci'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $telefono = $row['telefono'];
                $de_la_casa = $row['de_la_casa'];
                $cod_viaje = $row['cod_viaje'];
                $nombre_viajero = $row['nombre_viajero'];
                $apellido_viajero = $row['apellido_viajero'];
                $telefono = $row['telefono'];
                $origen = $row['origen'];
                $destino = $row['destino'];
                $hora_inicio = $row['hora_inicio'];
                $importe = $row['importe'];
                $fecha = $row['fecha'];
                $comentario = $row['comentario'];
                $tipo_fp = $row['rol'];
        	}
		}
        
    ?>

<header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_ver_viajes.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1><?php echo $nombre_viajero; ?> <?php echo $apellido_viajero; ?></h1>

        
        <table class="info">
            <tr>
                <td>
                    <h2>Origen</h2>
                    <h3><?php echo $origen; ?></h3>
                </td>
                <td>
                    <h2>Destino</h2>
                    <h3><?php echo $destino; ?></h3>
                </td>
                <td>
                    <h2>Cliente</h2>
                    <h3><?php echo $nombre_viajero; ?> <?php echo $apellido_viajero; ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Hora Inicio</h2>
                    <h3><?php echo $hora_inicio; ?></h3>
                </td>
                <td>
                    <h2>Fecha</h2>
                    <h3><?php echo $fecha; ?></h3>
                </td>
                <td>
                    <h2>Importe</h2>
                    <h3><?php echo $importe; ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Comentario</h2>
                    <h3><?php echo $comentario; ?></h3>
                </td>
                <td>
                    <h2>Forma de pago</h2>
                    <h3><?php echo $tipo_fp; ?></h3>
                </td>
                <td>
                    <h2>Chofer</h2>
                    <h3><?php echo $nombre; ?> <?php echo $apellido; ?></h3>
                </td>
            </tr>
        </table>

        
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script_eliminar_viaje.js"></script>
</body>
</html>