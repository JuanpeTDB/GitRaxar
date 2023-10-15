<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_chofer.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>

<?php
    require_once '../../conexion.php';

    $query = "SELECT a.matricula, a.marca, a.modelo
    FROM auto a
    LEFT JOIN conduce c ON a.matricula = c.matricula
    WHERE c.ci IS NULL;";
    $result = mysqli_query($conn, $query);
    $json = array();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            $marca = $row['marca'];
            $modelo = $row['modelo'];
            $matricula = $row['matricula'];
            
            $json[] = array(
                'marca' => $marca,
                'modelo' => $modelo,
                'matricula' => $matricula
            );
        }
    }
?>

<body>
<header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a id="btnAtras" href="adm_choferes.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
    
        <h1>AGREGAR CHOFER</h1>

        <form action="agregarChofer.php" method="POST">
            <div class="cont2">

                <table>
                    <tr>
                        <td>
                            <h2>Nombre</h2>
                            <input type="text"  name="nombre"></input>
                        </td>
                        <td>
                            <h2>Apellido</h2>
                            <input type="text"  name="apellido"></input>
                        </td>
                        <td>
                            <h2>Telefono</h2>
                            <input type="number"  name="telefono"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Cedula de Identidad</h2>
                            <input type="number"  name="ci"></input>
                        </td>
                        <td>
                            <h2>Coche que conduce</h2>
                            <select id="auto" name="matricula">
                                <?php if (empty($json)) { ?>
                                    <option value="" disabled selected>No hay coches disponibles</option>
                                <?php } else { ?>
                                    <option value="" disabled selected>Seleccione un coche</option>
                                    <?php foreach ($json as $auto) { ?>
                                        <option value="<?php echo $auto['matricula']; ?>">
                                            <?php echo $auto['marca'] . ' ' . $auto['modelo'] . ' ' . $auto['matricula']; ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <h2>Tipo de chofer</h2>
                            <select name="de_la_casa">
                                <option value="1">De la casa 🏠</option>
                                <option value="0">Externo</option>
                            </select>
                        </td>
                    </tr>
                </table>
               
                
            </div>

            <button action="agregarChofer.php">GUARDAR</button>
        </form>
    
        
    </div>
    <br><br><br><br><br>
        <div class="footer">
            
        </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $("#btnAtras").click(function() {
            if (confirm("¿Estás seguro de que deseas volver atrás sin guardar los cambios?")) {
                window.history.back();
            }
        });
    </script>
</html>