<?php
	require_once '../../conexion.php';
	if(ISSET($_POST['res'])){
		$query = "SELECT p.*, c.*, p.cod_cliente AS pp FROM particular p
        join cliente c on c.cod_cliente = p.cod_cliente
        where p.estado = 0;";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'cod_cliente' => $row['cod_cliente'],
				'pp' => $row['pp'],
                'nombre_cli' => $row['nombre_cli'],
                'apellido_cli' => $row['apellido_cli'],
                'estado' => $row['estado'],
                'comentario_chofer' => $row['comentario_chofer']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 