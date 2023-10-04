<?php
    require_once '../../conexion.php';

	$ci = $_POST['ci'];
	$matricula = $_POST['matricula'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$de_la_casa = $_POST['de_la_casa'];
	
	$query1 = "INSERT INTO `chofer` (ci, nombre, apellido, telefono, de_la_casa) VALUES('$ci', '$nombre', '$apellido', '$telefono', '$de_la_casa')";
	$query2 = "INSERT INTO `conduce` (ci, matricula) VALUES('$ci', '$matricula')";
	
	if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2)) {
		header("Location: adm_choferes.php");
	} else {
		echo "Error: " . mysqli_error($conn);
	}
	
?>