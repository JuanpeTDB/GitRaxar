<?php
    require_once '../../conexion.php';
	$rut = $_POST['rut'];

    $query_get_cod_cuenta = "SELECT cc.cod_cuenta FROM cuenta_corriente cc
    join posee_emp po on po.cod_cuenta = cc.cod_cuenta
    join empresa e on e.rut = po.rut
    WHERE e.rut = $rut";
    $result = mysqli_query($conn, $query_get_cod_cuenta);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $cod_cuenta = $row['cod_cuenta'];
        $query = "UPDATE cuenta_corriente SET saldado = 1 WHERE cod_cuenta = $cod_cuenta;";
        $result = mysqli_query($conn, $query);
        if($result) {
            echo "Se saldó la cuenta corriente del cliente";
            header("Location: adm_pagos_empr.php");
        } else {
            echo "No se pudo saldar la cuenta corriente del cliente1";
        }
    } else {
        echo "No se pudo saldar la cuenta corriente del cliente";
    }
?>