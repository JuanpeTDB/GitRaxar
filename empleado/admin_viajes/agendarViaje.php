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

if (mysqli_query($conn, $query1)) {
    $cod_viaje = mysqli_insert_id($conn); // Obten el valor autoincremental después de la inserción en 'viajes'
    $query2 = "INSERT INTO `se_encarga` (ci, cod_viaje) values ('$ciChofer', '$cod_viaje')";

    if (mysqli_query($conn, $query2)) {
        header("Location: adm_forma_de_pago.php?cod_viaje=$cod_viaje&importe=$importe&nombre_viajero=$nombre_viajero&apellido_viajero=$apellido_viajero&origen=$origen&destino=$destino&hora_inicio=$hora_inicio&fecha=$fecha&comentario=$comentario&ciChofer=$ciChofer");
    } else {
        echo "Error en la segunda consulta: " . mysqli_error($conn);
    }
} else {
    echo "Error en la primera consulta: " . mysqli_error($conn);
}

?>