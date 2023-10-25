<?php
	require_once '../../conexion.php';
 
		$ci = $_POST['ci'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$rol = $_POST['rol'];
		$telefono = $_POST['telefono'];
 
		$query = "UPDATE `usuario` set `telefono` = $telefono, `nombre` = '$nombre', `apellido` = '$apellido', `contrasenia` = '$contrasenia' WHERE `ci` = '$ci';";
		$result = mysqli_query($conn, $query);
		echo 'ok';


		session_destroy();
		session_start();
		$_SESSION['nombre_usuario'] = $nombre_usuario;
		header("Location: adm_empleados.php");
?>