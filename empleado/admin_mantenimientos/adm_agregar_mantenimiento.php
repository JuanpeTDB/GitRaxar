<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_mantenimiento.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>

    <?php
        require_once '../../conexion.php';
        $matricula = $_GET['matricula'];
        $query = "SELECT * FROM auto a
        INNER JOIN requiere r on r.matricula = a.matricula
        INNER JOIN mantenimiento m on m.cod_mantenimiento = r.cod_mantenimiento
        WHERE a.matricula = '$matricula';";
		$result = mysqli_query($conn, $query);
		$json = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
                $matricula = $row['matricula'];
                $marca = $row['marca'];
                $modelo = $row['modelo'];
                $anio = $row['anio'];
                $cod_mantenimiento = $row['cod_mantenimiento'];
                $tipo = $row['tipo']; 
                $descripcion = $row['descripcion'];
        	}
		}
        
    ?>

    <header>
    <a style="text-decoration: none;" href="../../empleado.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
    <a href="adm_dtro_mantenimiento.php?matricula=<?php echo $matricula; ?>" class="btnatras">ATRAS</a>
</header>


    <div class="contenedor">
    
        <h1>AGREGAR MANTENIMIENTO</h1>

        <form action="agregarMantenimiento.php?matricula=<?php echo $matricula; ?>" method="POST">
        <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
            <div class="cont2">

                <table>
                    <tr>
                        <td>
                            <h2>Concepto</h2>
                            <select name="tipo">
                            <option value="Gasoil">Gasoil</option>
                            <option value="Electricista">Electricista</option>
                            <option value="Cambio aceite">Cambio aceite</option>
                            <option value="Alineacion balanceo">Alineacion y balanceo</option>
                            <option value="Cambio cubierta">Cambio de cubierta</option>
                            <option value="Gomeria">Gomeria</option>
                            <option value="Cambio correa">Cambio de correa</option>
                            <option value="Frenos">Frenos</option>
                            <option value="Embrague">Embrague</option>
                            <option value="Chapista">Chapista</option>
                            <option value="Otros">Otros</option>
                        </select>
                        </td>
                        <td>
                            <h2>Descripcion</h2>
                            <input name="descripcion" type="text"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Fecha</h2>
                            <input name="fecha" type="date"></input>
                        </td>
                        <td>
                            <h2>Importe</h2>
                            <input name="costo" type="number"></input>
                        </td>
                    </tr>
                </table>
                
            </div>
            <br><br>
            <button action="agregarMantenimiento.php?matricula=<?php echo $matricula; ?>">GUARDAR</button> 
        </frorm>
    
    
        
    </div>
    <br><br>
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