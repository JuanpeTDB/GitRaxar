<?php
	require_once '../../conexion.php';
 
		$ci = $_POST['ci'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$nombre_usuario = $_POST['usuario'];
		$contrasenia = $_POST['contrasenia'];
		$telefono = $_POST['telefono'];
 
		$query = "UPDATE `usuario` set `telefono` = $telefono, `nombre` = '$nombre', `apellido` = '$apellido', `nombre_usuario` = '$nombre_usuario', `contrasenia` = '$contrasenia' WHERE `ci` = '$ci';";
		$result = mysqli_query($conn, $query);
		echo 'ok';


		session_destroy();
		session_start();
		$_SESSION['nombre_usuario'] = $nombre_usuario;
		header("Location: adm_empleados.php");
?>