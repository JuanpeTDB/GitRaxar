<?php
	require_once '../../conexion.php';
 
		$cod_viaje = $_POST['cod_viaje'];
		$nombre_viajero = $_POST['nombre_viajero'];
		$apellido_viajero = $_POST['apellido_viajero'];
		$origen = $_POST['origen'];
		$destino = $_POST['destino'];
		$hora_inicio = $_POST['hora_inicio'];
		$fecha = $_POST['fecha'];
		$comentario = $_POST['comentario'];
		$importe = $_POST['importe'];
		$ciChofer = $_POST['ciChofer'];
 
		$query1 = "UPDATE `viajes` set `nombre_viajero` = '$nombre_viajero', `apellido_viajero` = '$apellido_viajero',
		`origen` = '$origen', `destino` = '$destino' , `hora_inicio` = '$hora_inicio' ,
		`fecha` = '$fecha' , `comentario` = '$comentario' , `importe` = '$importe' WHERE `cod_viaje` = '$cod_viaje'";
	
		$query2 = "UPDATE `se_encarga` set `ci` = '$ciChofer' WHERE `cod_viaje` = '$cod_viaje'";

		if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2)) {
			header("Location: adm_ver_viajes.php?filtro=0");
		} else {
			echo "Error: " . mysqli_error($conn);
		}
		
?>