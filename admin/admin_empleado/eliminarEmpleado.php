<?php
	require_once '../../conexion.php';
 
	$ci = $_POST['ci'];
    $query = "UPDATE `usuario` set `activo` = 0 WHERE `ci` = '$ci'";
	$result = mysqli_query($conn, $query);

	echo 'ok';
?>