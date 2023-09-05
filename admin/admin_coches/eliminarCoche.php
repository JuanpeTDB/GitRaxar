<?php
	require_once '../../conexion.php';

	$matricula = $_POST['matricula'];
	$query = "UPDATE `auto` set `activo` = 0 WHERE `matricula` = '$matricula'";
	$result = mysqli_query($conn, $query);
	echo 'ok';
?>