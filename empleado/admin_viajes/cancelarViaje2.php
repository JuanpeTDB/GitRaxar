<?php
    require_once '../../conexion.php';

    $cod_viaje2 = $_POST['cod_viaje2'];
    
    $query = "DELETE from se_encarga where cod_viaje = $cod_viaje2";
    $query1 = "DELETE from viajes where cod_viaje = $cod_viaje2";

    if (mysqli_query($conn, $query)) {
        if (mysqli_query($conn, $query1)) {
            header("Location: adm_agendar_viaje.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>
