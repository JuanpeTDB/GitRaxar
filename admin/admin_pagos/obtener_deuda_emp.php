<?php
	require_once '../../conexion.php';
	$rut = $_POST['rut'];
	if(ISSET($_POST['res'])){
		$query = "SELECT deuda from posee po
		join cliente c on c.cod_cliente = po.cod_cliente
		join empresa e on e.cod_cliente = c.cod_cliente
		where e.rut = $rut;";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
            $json[] = array(
                'deuda' => $row['deuda']
            );
        	}
        	echo json_encode($json);
			
		} else {
        	echo "No devuelve nada";
        }
		
	}
 
?> 