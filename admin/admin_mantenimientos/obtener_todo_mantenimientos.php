<?php
	require_once '../../conexion.php';
	if(ISSET($_POST['res'])){
		$query = "SELECT * FROM mantenimiento m
				INNER JOIN requiere r on r.cod_mantenimiento = m.cod_mantenimiento
				INNER JOIN auto a on a.matricula = r.matricula;";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'cod_mantenimiento' => $row['cod_mantenimiento'],
                'tipo' => $row['tipo'],
                'descripcion' => $row['descripcion'],
				'matricula' => $row['matricula'],
                'marca' => $row['marca'],
                'modelo' => $row['modelo'],
                'anio' => $row['anio']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 
