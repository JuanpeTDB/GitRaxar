<?php
	require_once '../../conexion.php';
 
		$matricula = $_POST['matricula'];
		$newMatricula = $_POST['newMatricula'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$anio = $_POST['anio'];
 
		$query = "UPDATE `auto` set `matricula` = '$newMatricula', `marca` = '$marca', `modelo` = '$modelo', `anio` = '$anio' WHERE `matricula` = '$matricula'";
		$result = mysqli_query($conn, $query);
		echo 'ok';
		header("Location: adm_coches.php");
?>