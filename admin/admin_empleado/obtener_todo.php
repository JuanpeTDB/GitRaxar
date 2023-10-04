<?php
	require_once '../../conexion.php';
	if(ISSET($_POST['res'])){
		$query = "SELECT * FROM usuario WHERE `activo` = 1";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'ci' => $row['ci'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'rol' => $row['rol'],
                'nombre_usuario' => $row['nombre_usuario'],
                'contrasenia' => $row['contrasenia'],
                'activo' => $row['activo']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 
