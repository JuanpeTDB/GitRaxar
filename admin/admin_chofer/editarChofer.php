<?php
	require_once '../../conexion.php';
 
		$cod_chofer = $_POST['cod_chofer'];
		echo '$cod_chofer';
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		$de_la_casa = $_POST['de_la_casa'];
 
		$query = "UPDATE `chofer` set `nombre` = '$nombre', `apellido` = '$apellido', `telefono` = '$telefono', `de_la_casa` = '$de_la_casa' WHERE `cod_chofer` = '$cod_chofer'";
		$result = mysqli_query($conn, $query);
		echo 'ok';
		header("Location: adm_choferes.php");
?>