<?php
	require_once '../../conexion.php';
    $nombre_cli = $_POST['nombre_cli'];
    $apellido_cli = $_POST['apellido_cli'];
    $telefono = $_POST['telefono'];
    $telefono2 = $_POST['telefono2'];
    $query1 = "INSERT into cliente (nombre_cli, apellido_cli) VALUES ('$nombre_cli', '$apellido_cli');";
    $result1 = mysqli_query($conn, $query1);

    if($result1){
        $cod_cliente = mysqli_insert_id($conn);
        $query_tel = "INSERT into tel_cli (telefono, cod_cliente) VALUES ('$telefono', $cod_cliente);";
        $result2 = mysqli_query($conn, $query_tel);
        if($result2){
            $query_tel2 = "INSERT into tel_cli (telefono, cod_cliente) VALUES ('$telefono2', $cod_cliente);";
            $result3 = mysqli_query($conn, $query_tel2);
            if($result3){
                $query_cod_cuenta = "INSERT into cuenta_corriente (saldado) VALUES (0);";
                $result4 = mysqli_query($conn, $query_cod_cuenta);
                if($result4) {
                    $cod_cuenta = mysqli_insert_id($conn);
                    $query_par = "INSERT into particular (cod_cliente) VALUES ($cod_cliente);";
                    $result5 = mysqli_query($conn, $query_par);
                    if($result5) {
                        $query_posee = "INSERT into posee_par (cod_cliente, cod_cuenta) VALUES ($cod_cliente, $cod_cuenta);";
                        $result6 = mysqli_query($conn, $query_posee);
                        if($result6) {
                            header("Location: adm_pagos_cli.php");
                        } else {
                            echo "No se pudo agregar el posee particular";
                        }
                    } else {
                        echo "No se pudo agregar el particular1";
                    }

                } else {
                    echo "No se pudo agregar la cuenta corriente";
                }
            } else {
                $query_cod_cuenta = "INSERT into cuenta_corriente (saldado) VALUES (0);";
                $result4 = mysqli_query($conn, $query_cod_cuenta);
                if($result4) {
                    $cod_cuenta = mysqli_insert_id($conn);
                    $query_par = "INSERT into particular (cod_cliente) VALUES ($cod_cliente);";
                    $result5 = mysqli_query($conn, $query_par);
                    if($result5) {
                        $cod_cliente= mysqli_insert_id($conn);
                        $query_posee = "INSERT into posee_par (cod_cliente, cod_cuenta) VALUES ($cod_cliente, $cod_cuenta);";
                        $result6 = mysqli_query($conn, $query_posee);
                        if($result6) {
                            header("Location: adm_pagos_cli.php");
                        } else {
                            echo "No se pudo agregar el posee particular";
                        }
                    } else {
                        echo "No se pudo agregar el particular2";
                    }

                } else {
                    echo "No se pudo agregar la cuenta corriente";
                }
            }
        } else {
            echo "Error en la segunda consulta: " . mysqli_error($conn);
        }
    }
?> 