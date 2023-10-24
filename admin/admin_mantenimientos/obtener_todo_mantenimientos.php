<?php
	require_once '../../conexion.php';
	if(ISSET($_POST['res'])){
		$query = "SELECT *, DATE_FORMAT(r.fecha, '%d-%m-%Y') AS fecha FROM mantenimiento m
				INNER JOIN requiere r on r.cod_mantenimiento = m.cod_mantenimiento
				INNER JOIN auto a on a.matricula = r.matricula
				order by r.fecha desc;";
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
                'anio' => $row['anio'],
                'fecha' => $row['fecha']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 
