<?php
	require_once '../../conexion.php';
	if(ISSET($_POST['res'])){
		$query = "SELECT * FROM chofer WHERE `activo` = 1 order by  de_la_casa desc";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'ci' => $row['ci'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'telefono' => $row['telefono'],
                'de_la_casa' => $row['de_la_casa']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 
