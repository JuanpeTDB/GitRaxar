<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_info_viaje_chof.css">
</head>
<?php
        require_once '../../conexion.php';
        $ci = $_GET['ci'];
        $cod_viaje = $_GET['cod_viaje'];
        $query = "SELECT *
        FROM chofer c
        INNER JOIN conduce co ON c.ci = co.ci
        INNER JOIN auto a ON co.matricula = a.matricula
        INNER JOIN se_encarga se ON se.ci = c.ci
        INNER JOIN viajes v ON v.cod_viaje = se.cod_viaje 
        WHERE c.ci = $ci and v.cod_viaje = $cod_viaje";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $telefono = $row['telefono'];
                $de_la_casa = $row['de_la_casa'];
                $marca = $row['marca']; 
                $modelo = $row['modelo']; 
                $matricula = $row['matricula'];
                $nombre_viajero = $row['nombre_viajero'];
                $apellido_viajero = $row['apellido_viajero'];
                $telefono = $row['telefono'];
                $origen = $row['origen'];
                $destino = $row['destino'];
                $hora_inicio = $row['hora_inicio'];
                $importe = $row['importe'];
                $fecha = $row['fecha'];
                $comentario = $row['comentario'];
        	}
		}
        
    ?>
<body>
<header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_choferes.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1><?php echo $fecha; ?></h1>

        <table class="info">
            <tr>
                <td><h3>Origen</h3></td>
                <td><h3>Destino</h3></td>
                <td><h3>Cliente</h3></td>
            </tr>
            <tr>
                <td><h4><?php echo $origen; ?></h4></td>
                <td><h4><?php echo $destino; ?></h4></td>
                <td><h4><?php echo $nombre_viajero; ?> <?php echo $apellido_viajero; ?></h4></td>
            </tr>
            <tr>
                <td><h3>Monto</h3></td>
                <td><h3>Hora Inicio</h3></td>
                <td><h3>Comentario</h3></td>
            </tr>
            <tr>
                <td><h4>$<?php echo $importe; ?></h4></td>
                <td><h4><?php echo $hora_inicio; ?></h4></td>
                <td><h4><?php echo $comentario; ?></h4></td>
            </tr>
        </table>

        <br><br><br>
        <div class="footer">
        </div>
            
    </div>
</body>
</html>