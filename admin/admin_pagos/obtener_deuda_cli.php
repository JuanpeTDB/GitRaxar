<?php
	require_once '../../conexion.php';
	$cod_cliente = $_POST['cod_cliente'];
	if(ISSET($_POST['res'])){
		$query = "SELECT deuda from posee where cod_cliente = $cod_cliente;";
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