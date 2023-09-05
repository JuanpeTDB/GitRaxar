<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_editar_coche.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
	</header>


    <?php
        require_once '../../conexion.php';
        $matricula = $_GET['matricula'];
        $newMatricula = $matricula;
        $query = "SELECT * FROM auto WHERE matricula = '$matricula'";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $marca = $row['marca'];
                $modelo = $row['modelo'];
                $anio = $row['anio'];
            
        	}
		}
    ?>

    <div class="contenedor">
    
        <h1>EDITAR COCHE</h1>

        <form id="edicion" action="editarCoche.php" method="POST">
        <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
            <div class="cont2">
            
                <table>
                    <tr>
                        <td>
                            <h2>Marca</h2>
                            <input type="text" name="marca" value="<?php echo $marca; ?>"></input>
                        </td>
                        <td>
                            <h2>Modelo</h2>
                            <input type="text" name="modelo" value="<?php echo $modelo; ?>"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Matricula</h2>
                            <input type="text" name="newMatricula" minlength="8" maxlength="8" value="<?php echo $newMatricula; ?>"></input>
                            
                        </td>
                        <td>
                            <h2>Año</h2>
                            <input type="text" name="anio" value="<?php echo $anio; ?>"></input>
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