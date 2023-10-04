<?php
	require_once '../../conexion.php';
 
	$ci = $_POST['ci'];
    $query = "UPDATE `chofer` set `activo` = 0 WHERE `ci` = '$ci'";
	$result = mysqli_query($conn, $query);

	echo 'ok';
?>