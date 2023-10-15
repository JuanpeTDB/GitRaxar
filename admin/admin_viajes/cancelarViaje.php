<?php
    require_once '../../conexion.php';

    $cod_viaje = $_POST['cod_viaje'];

    $query_delete_se_encarga = "DELETE FROM se_encarga WHERE cod_viaje = $cod_viaje";

    $query_fp = "SELECT v.*, c.*, fp.*
        FROM viajes v
        LEFT JOIN (
            SELECT t.cod_viaje, fp.cod_pago, cod_cuenta, activo, deuda, 'cuenta_corriente' as rol, null as tipo 
            FROM cuenta_corriente fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, null as deuda, 'transferencia' as rol, null as tipo 
            FROM transferencia fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, null as deuda, 'contado' as rol, null as tipo 
            FROM contado fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, null as deuda, 'tarjeta' as rol, tipo 
            FROM tarjeta fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
        ) AS fp ON v.cod_viaje = fp.cod_viaje
        join se_encarga se on se.cod_viaje = v.cod_viaje
        join chofer c on c.ci = se.ci
        where v.cod_viaje = $cod_viaje;";

    
    $result = mysqli_query($conn, $query_fp);

    if ($row = mysqli_fetch_assoc($result)) {
        $tipo_fp = $row['rol'];
    }

    if (mysqli_query($conn, $query_delete_se_encarga)) {
        $query_get_cod_pago = "SELECT cod_pago FROM tiene WHERE cod_viaje = $cod_viaje";
        $result = mysqli_query($conn, $query_get_cod_pago);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $cod_pago = $row['cod_pago'];

            $query_delete_tiene = "DELETE FROM tiene WHERE cod_viaje = $cod_viaje";

            if (mysqli_query($conn, $query_delete_tiene)) {

                $query_delete_forma_de_pago_entity = "DELETE FROM $tipo_fp WHERE cod_pago = $cod_pago";

                if (mysqli_query($conn, $query_delete_forma_de_pago_entity)) {
                    
                    $query_delete_forma_de_pago = "DELETE FROM forma_de_pago WHERE cod_pago = $cod_pago";

                    if (mysqli_query($conn, $query_delete_forma_de_pago)) {
                        header("Location: adm_agendar_viaje.php");
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error: Código de pago no encontrado.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>
