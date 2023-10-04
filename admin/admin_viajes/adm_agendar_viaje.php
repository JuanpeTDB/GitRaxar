<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_agendar_viaje.css">
</head>
<body>

<?php
        require_once '../../conexion.php';
        
        $queryChoferes = "SELECT ci, nombre, apellido, de_la_casa FROM chofer where activo = 1";
        $resultChoferes = mysqli_query($conn, $queryChoferes);
        $jsonChoferes = array();

        if (mysqli_num_rows($resultChoferes) > 0) {
        while ($rowChofer = mysqli_fetch_assoc($resultChoferes)) {
            $ciChofer = $rowChofer['ci'];
            $de_la_casa = $rowChofer['de_la_casa'];
            $nombreChofer = $rowChofer['nombre'] . ' ' . $rowChofer['apellido'];
            $jsonChoferes[] = array('ci' => $ciChofer, 'nombre' => $nombreChofer, 'de_la_casa' => $de_la_casa);
        } 
}

        
    ?>

    <header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
	</header>
    <div class="contenedor">

        <h1>AGENDAR VIAJE</h1>
        <form id="agendar" action="agendarViaje.php" method="POST">
        <table>
            <tr>
                <td>
                    <h2>Origen</h2>
                    <input name="origen" type="text"></input>
                </td>
                <td>
                    <h2>Destino</h2>
                    <input name="destino" type="text"></input>
                </td>
                <td>
                    <h2>Hora Inicio</h2>
                    <input name="hora_inicio" type="time"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Nombre Cliente</h2>
                    <input name="nombre_viajero" type="text"></input>
                </td>
                <td>
                    <h2>Apellido Cliente</h2>
                    <input name="apellido_viajero" type="text"></input>
                </td>
                <td>
                    <h2>Fecha</h2>
                    <input name="fecha" type="date"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <h2>Monto ($U)</h2>
                    <input name="importe" type="text"></input>
                </td>
                <td>
                    <h2>Comentario</h2>
                    <input name="comentario" type="text"></input>
                </td>
                <td>
                    <h2>Chofer</h2>
                    <select id="chof" name="ciChofer">
                    <?php
                        if (empty($jsonChoferes)) {
                            echo "<option value='' disabled selected>No hay choferes disponibles</option>";
                        } else {
                            echo "<option value='' disabled selected>Seleccione un chofer</option>";
                            foreach ($jsonChoferes as $chofer) {
                                $nombreChofer = $chofer['nombre'];
                                if ($chofer['de_la_casa'] == true) {
                                    echo "<option value='{$chofer['ci']}'>$nombreChofer 🏠</option>";
                                } else {
                                    echo "<option value='{$chofer['ci']}'>$nombreChofer </option>";
                                }
                                
                            }
                        }
                    ?>
                    </select>
                </td>
            </tr>

        </table>
        </form>
        <br>
        <br>
            <button id="btnAtras">ATRAS</button>    
            <button id="btnGuardar">CONTINUAR</button> 
    
    </div>
    <br><br><br><br><br>
    <div class="footer">
		
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $("#btnAtras").click(function() {
            window.history.back();
        });
        $("#btnGuardar").click(function() {
            var camposVacios = false;
            $("input[type='text'], input[type='time'], input[type='date']").each(function() {
                if ($(this).val() === "") {
                    camposVacios = true;
                    return false;
                }
            });

            if (camposVacios) {
                alert("Por favor, complete todos los campos antes de guardar.");
            } else {
                $("#agendar").submit();
            }
        });
       
</script>

</body>
</html>