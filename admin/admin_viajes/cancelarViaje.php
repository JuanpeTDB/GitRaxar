<?php
    require_once '../../conexion.php';

	$cod_viaje = $_POST['cod_viaje'];
	
	$query1 = "DELETE from viajes where cod_viaje = $cod_viaje";

    if (mysqli_query($conn, $query1)) {
        header("Location: adm_agendar_viaje.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>