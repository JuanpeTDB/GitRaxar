<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_editar_chofer.css">
</head>
<body>
    <header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
	</header>


    <?php
        require_once '../../conexion.php';
        $ci = $_GET['ci'];
        
        $query = "SELECT * FROM chofer WHERE ci = '$ci'";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $ci = $row['ci'];
                $new_ci = $row['ci'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $telefono = $row['telefono'];
                $de_la_casa = $row['de_la_casa'];
            
        	}
		}
    ?>

    <div class="contenedor">
    
        <h1>EDITAR CHOFER</h1>

        <form id="edicion" action="editarChofer.php" method="POST">
        <input type="hidden" name="ci" value="<?php echo $ci; ?>">
            <div class="cont2">
            
                <table>
                    <tr>
                        <td>
                            <h2>Nombre</h2>
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>"></input>
                        </td>
                        <td>
                            <h2>Apellido</h2>
                            <input type="text" name="apellido" value="<?php echo $apellido; ?>"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Telefono</h2>
                            <input type="text" name="telefono" value="<?php echo $telefono; ?>"></input>
                        </td>
                        <td>
                        <h2>Tipo de chofer</h2>
                            <select name="de_la_casa" value="<?php echo $de_la_casa; ?>">
                                <option value="true">De la casa</option>
                                <option value="false">Externo</option>
                            </select>
                        </td>
                        
                    </tr>
                </table>
                
            </div>

        
        </form>
            <button id="btnAtras">ATRAS</button>    
            <button id="btnGuardar">GUARDAR</button>    
        
            <br><br><br><br><br>
            <div class="footer">
                
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $("#btnAtras").click(function() {
            window.history.back();
        });
        $("#btnGuardar").click(function() {
            $("#edicion").submit();
        });
</script>
</body>