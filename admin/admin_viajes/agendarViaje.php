<?php
    require_once '../../conexion.php';

	$nombre_viajero = $_POST['nombre_viajero'];
	$apellido_viajero = $_POST['apellido_viajero'];
	$origen = $_POST['origen'];
	$destino = $_POST['destino'];
	$hora_inicio = $_POST['hora_inicio'];
	$fecha = $_POST['fecha'];
	$importe = $_POST['importe'];
	$comentario = $_POST['comentario'];
    $ciChofer = $_POST['ciChofer'];
	
	$query1 = "INSERT INTO `viajes` (nombre_viajero, apellido_viajero, origen, destino, hora_inicio, fecha, importe, comentario) VALUES('$nombre_viajero', '$apellido_viajero', '$origen', '$destino', '$hora_inicio', '$fecha', '$importe', '$comentario')";
    $cod_viaje = mysqli_insert_id($conn);
    $query2 = "INSERT INTO `se_encarga` (ci, cod_viaje) values ('$ci', '$cod_viaje')";

    if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2)) {
        header("Location: adm_forma_de_pago.php?cod_viaje=$cod_viaje");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>