<?php
	require_once '../../conexion.php';
 
		$ci = $_POST['ci'];
		echo '$ci';
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		$de_la_casa = $_POST['de_la_casa'];
 
		$query = "UPDATE `chofer` set `nombre` = '$nombre', `apellido` = '$apellido', `telefono` = '$telefono', `de_la_casa` = '$de_la_casa' WHERE `ci` = '$ci'";
		$result = mysqli_query($conn, $query);
		echo 'ok';
		header("Location: adm_choferes.php");
?>