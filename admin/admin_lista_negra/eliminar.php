<?php
    require_once '../../conexion.php';
 
	$pp = $_POST['pp'];
    $query = "UPDATE `particular` set `estado` = 1 WHERE `cod_cliente` = '$pp'";
	$result = mysqli_query($conn, $query);

	echo 'ok';

?>