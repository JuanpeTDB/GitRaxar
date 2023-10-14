<?php
    require_once '../../conexion.php';

	$cod_viaje = $_POST['cod_viaje'];

    $query0 = "DELETE from se_encarga where cod_viaje = $cod_viaje";
	$query1 = "DELETE from tiene where cod_viaje = $cod_viaje";
	$query2 = "DELETE from viajes where cod_viaje = $cod_viaje";

    if (mysqli_query($conn, $query0) && mysqli_query($conn, $query1) && mysqli_query($conn, $query2)) {
        header("Location: adm_agendar_viaje.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>