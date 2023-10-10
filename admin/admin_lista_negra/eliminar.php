<?php

    require_once '../../conexion.php';
 
	$cod_cliente = $_POST['cod_cliente'];
    $query = "UPDATE `particular` set `estado` = 1 WHERE `cod_cliente` = '$cod_cliente'";
	$result = mysqli_query($conn, $query);

	echo 'ok';

?>