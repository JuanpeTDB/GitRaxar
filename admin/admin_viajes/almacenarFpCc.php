<?php
    require_once '../../conexion.php';

	$cod_viaje = $_POST['cod_viaje'];
	$cod_cuenta = $_POST['cod_cuenta'];
	
    $query0 = "INSERT INTO `forma_de_pago` VALUES (0)";

    $result0 = mysqli_query($conn, $query0);

    if ($result0) {
        $cod_pago = mysqli_insert_id($conn);

        $query1 = "INSERT INTO `tiene` (cod_pago, cod_viaje) VALUES('$cod_pago', '$cod_viaje')";
        $result1 = mysqli_query($conn, $query1);

        if ($result1){
            $query2 = "INSERT into `cuenta_corriente` (cod_cuenta, cod_pago) values ('$cod_cuenta', '$cod_pago')";
            $result2 = mysqli_query($conn, $query2);

            if ($result2){
                echo "Se ha registrado el pago correctamente";
            } else {
                echo "Error en la tercera consulta: " . mysqli_error($conn);
            }
        }
    }  
?>