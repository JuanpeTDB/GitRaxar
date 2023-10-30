<?php
require_once '../../conexion.php';
$nombre_cli = $_POST['nombre_cli'];
$apellido_cli = $_POST['apellido_cli'];
$nombre_empresa = $_POST['nombre_empresa'];
$razon_social = $_POST['razon_social'];
$rut = $_POST['rut'];
$telefono = $_POST['telefono'];
if (isset($_POST['telefono2'])) {
    $telefono2 = $_POST['telefono2'];
} else {
    $telefono2 = "";
}
$query1 = "INSERT into cliente (nombre_cli, apellido_cli) VALUES ('$nombre_cli', '$apellido_cli');";
$result1 = mysqli_query($conn, $query1);

if ($result1) {
    $cod_cliente = mysqli_insert_id($conn);
    $query_tel = "INSERT into tel_cli (telefono, cod_cliente) VALUES ('$telefono', $cod_cliente);";
    $result2 = mysqli_query($conn, $query_tel);
    $result6 = false;
    if ($telefono2 != "") {
        $query_tel2 = "INSERT into tel_cli (telefono, cod_cliente) VALUES ('$telefono2', $cod_cliente);";
        $result6 = mysqli_query($conn, $query_tel2);
    }
    if ($result2) {
        $query_cod_cuenta = "INSERT into cuenta_corriente (saldado) VALUES (0);";
        $result3 = mysqli_query($conn, $query_cod_cuenta);
        if ($result3) {
            $cod_cuenta = mysqli_insert_id($conn);
            $query_par = "INSERT into empresa (cod_cliente, nombre_empresa, razon_social, rut) VALUES ($cod_cliente, '$nombre_empresa', '$razon_social', '$rut');";
            $result4 = mysqli_query($conn, $query_par);
            if ($result4) {
                $query_posee = "INSERT into posee_emp (rut, cod_cuenta) VALUES ($rut, $cod_cuenta);";
                $result5 = mysqli_query($conn, $query_posee);

                if ($result5) {
                    header("Location: adm_pagos_empr.php");
                } else {
                    echo "No se pudo agregar el posee empresa: " . mysqli_error($conn);
                }
            } else {
                echo "No se pudo agregar el empresa" . mysqli_error($conn);
            }

        } else {
            echo "No se pudo agregar la cuenta corriente" . mysqli_error($conn);
        }
    } else {
        echo "No se pudo agregar el telefono" . mysqli_error($conn);
    }

} else {
    echo "No se pudo agregar el cliente" . mysqli_error($conn);
}
?>