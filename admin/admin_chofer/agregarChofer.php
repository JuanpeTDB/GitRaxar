<?php
    require_once '../../conexion.php';
 
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$de_la_casa = $_POST['de_la_casa'];
	
	$query = "INSERT INTO `chofer` (nombre, apellido, telefono, de_la_casa) VALUES('$nombre', '$apellido', '$telefono', '$de_la_casa')";
	$result = mysqli_query($conn, $query);

    header("Location: adm_choferes.php");
?>