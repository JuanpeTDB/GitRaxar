<?php
	require_once '../../conexion.php';
    $ci = $_POST["ci"];
	if(ISSET($_POST['res'])){
		$query = "SELECT *,  DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha2
        FROM chofer c
        INNER JOIN conduce co ON c.ci = co.ci
        INNER JOIN auto a ON co.matricula = a.matricula
        INNER JOIN se_encarga se ON se.ci = c.ci
        INNER JOIN viajes v ON v.cod_viaje = se.cod_viaje
        where c.ci = $ci
        ORDER BY  v.fecha DESC, v.hora_inicio ASC;
        ";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'ci' => $row['ci'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'telefono' => $row['telefono'],
                'de_la_casa' => $row['de_la_casa'],
                'marca' => $row['marca'], 
                'modelo' => $row['modelo'], 
                'matricula' => $row['matricula'],
                'cod_viaje' => $row['cod_viaje'],
                'nombre_viajero' => $row['nombre_viajero'],
                'apellido_viajero' => $row['apellido_viajero'],
                'telefono' => $row['telefono'],
                'origen' => $row['origen'],
                'destino' => $row['destino'],
                'hora_inicio' => $row['hora_inicio'],
                'importe' => $row['importe'],
                'fecha' => $row['fecha'],
                'fecha2' => $row['fecha2'],
                'comentario' => $row['comentario']
            );
        	}
		}
	}
	echo json_encode($json);
?> 
