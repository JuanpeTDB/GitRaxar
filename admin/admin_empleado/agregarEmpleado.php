<?php
    require_once '../../conexion.php';

	$ci = $_POST['ci'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$nombre_usuario = $_POST['nombre_usuario'];
	$contrasenia = $_POST['contrasenia'];
	$rol = $_POST['rol'];
	$telefono = $_POST['telefono'];
	
	$query = "INSERT INTO `usuario` (ci, telefono, nombre, apellido, nombre_usuario, contrasenia, rol) VALUES($ci, $telefono, '$nombre', '$apellido', '$nombre_usuario', '$contrasenia', '$rol')";
	$result = mysqli_query($conn, $query);

    header("Location: adm_empleados.php");
?>