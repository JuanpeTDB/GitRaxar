<?php
    require_once '../../conexion.php';
	$cod_cliente = $_POST['cod_cliente'];

    $query_get_cod_cuenta = "SELECT cc.cod_cuenta FROM cuenta_corriente cc
    join posee_par po on po.cod_cuenta = cc.cod_cuenta
    join cliente c on c.cod_cliente = po.cod_cliente
    join particular p on p.cod_cliente = c.cod_cliente
    WHERE c.cod_cliente = $cod_cliente";
    $result = mysqli_query($conn, $query_get_cod_cuenta);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $cod_cuenta = $row['cod_cuenta'];
        $query = "UPDATE cuenta_corriente SET saldado = 1 WHERE cod_cuenta = $cod_cuenta;";
        $result = mysqli_query($conn, $query);
        if($result) {
            echo "Se saldó la cuenta corriente del cliente";
            header("Location: adm_pagos_cli.php");
        } else {
            echo "No se pudo saldar la cuenta corriente del cliente1";
        }
    } else {
        echo "No se pudo saldar la cuenta corriente del cliente";
    }
?>