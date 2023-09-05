<?php
	require_once '../../conexion.php';
 
	$cod_chofer = $_POST['cod_chofer'];
    $query = "UPDATE `auto` set `activo` = 0 WHERE `ci` = '$cod_chofer'";
	$result = mysqli_query($conn, $query);

	echo 'ok';
?>