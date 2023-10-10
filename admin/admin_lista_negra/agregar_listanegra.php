<?php
    require_once '../../conexion.php';

	$nombre_cliente = $_POST['nombre_cliente'];
	$apellido_cliente = $_POST['apellido_cliente'];
	$comentario = $_POST['comentario'];
	
	$query1 = "INSERT into `cliente` (nombre_cli, apellido_cli) values ('$nombre_cliente', '$apellido_cliente');";
	$cod_cliente = mysqli_insert_id($conn);
    $query2 = "INSERT into `particular` (cod_cliente, estado, comentario_chofer, fecha_LN) values ('$cod_cliente', 0, '$comentario', curdate());";
	
	if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2)) {
		header("Location: adm_listanegra.php");
	} else {
		echo "Error: " . mysqli_error($conn);
	}
	
?>
