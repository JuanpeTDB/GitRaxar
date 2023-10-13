<?php
    require_once '../../conexion.php';

	$cod_viaje = $_POST['cod_viaje'];
	$MP = $_POST['MP'];
	
    $query0 = "INSERT INTO `forma_de_pago` VALUES (0)";

    $result0 = mysqli_query($conn, $query0);

    $cod_pago = mysqli_insert_id($conn);
	$query1 = "INSERT INTO `tiene` (cod_pago, cod_viaje) VALUES('$cod_pago', '$cod_viaje')";
    
    
    if ($MP == "debito" ) {
        $query2 = "INSERT INTO `tarjeta` (cod_pago, tipo) values ('$cod_pago', '$MP')";
    } elseif ($MP == "credito") {
        $query2 = "INSERT INTO `tarjeta` (cod_pago, tipo) values ('$cod_pago', '$MP')";
    } else if ($MP == "contado") {
        $query2 = "INSERT INTO `contado` (cod_pago) values ('$cod_pago')";
    } else if ($MP == "transferencia") {
        $query2 = "INSERT INTO `transferencia` (cod_pago) values ('$cod_pago')";
    } else if ($MP == "cta_corriente") {
        $query2 = "INSERT INTO `cta_corriente` (cod_pago) values ('$cod_pago')";
    }

    mysqli_query($conn, $query1) && mysqli_query($conn, $query2);    
?>