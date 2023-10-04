<?php
    require_once '../../conexion.php';
 
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$matricula = $_POST['matricula'];
	$anio = $_POST['anio'];
	$activo = true;
	
	$query = "INSERT INTO `auto` VALUES('$matricula', '$marca', '$modelo', '$anio', '$activo')";
	$result = mysqli_query($conn, $query);

    header("Location: adm_coches.php");
?>