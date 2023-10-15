<?php
	require_once '../../conexion.php';
 
		$ci = $_POST['ci'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$nombre_usuario = $_POST['usuario'];
		$rol = $_POST['rol'];
		$contrasenia = $_POST['contrasenia'];
		$telefono = $_POST['telefono'];
 
		$query = "UPDATE `usuario` set `telefono` = $telefono, `rol` = '$rol', `nombre` = '$nombre', `apellido` = '$apellido', `nombre_usuario` = '$nombre_usuario', `contrasenia` = '$contrasenia' WHERE `ci` = '$ci';";
		$result = mysqli_query($conn, $query);
		echo 'ok';
		
		header("Location: adm_empleados.php");
?>