<?php
    require_once '../../conexion.php';

	$cod_viaje = $_POST['cod_viaje'];
	$MP = $_POST['MP'];
	
	$query1 = "INSERT INTO `tiene` (cod_pago) VALUES(cod_pago)";
    $cod_pago = mysqli_insert_id($conn);
    
    if (MP == "debito" ) {
        $query2 = "INSERT INTO `tarjeta` (cod_pago, tipo) values ('$cod_pago', '$MP')";
    } elseif (MP == "credito") {
        $query2 = "INSERT INTO `tarjeta` (cod_pago, tipo) values ('$cod_pago', '$MP')";
    } else if (MP == "efectivo") {
        $query2 = "INSERT INTO `efectivo` (cod_pago) values ('$cod_pago')";
    } else if (MP == "transferencia") {
        $query2 = "INSERT INTO `transferencia` (cod_pago) values ('$cod_pago')";
    } else if (MP == "cta_corriente") {
        $query2 = "INSERT INTO `cta_corriente` (cod_pago) values ('$cod_pago')";
    }

    mysqli_query($conn, $query1) && mysqli_query($conn, $query2);
    
?>