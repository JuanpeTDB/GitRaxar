<?php
	require_once '../../conexion.php';
	if(ISSET($_POST['res'])){
		$query = "SELECT *, DATE_FORMAT(r.fecha, '%d-%m-%Y') AS fecha FROM mantenimiento m
				INNER JOIN requiere r on r.cod_visita = m.cod_visita
				INNER JOIN auto a on a.matricula = r.matricula
				order by r.fecha desc;";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'cod_visita' => $row['cod_visita'],
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
