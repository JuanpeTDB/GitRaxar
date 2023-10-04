<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_coche.css">
</head>
<body>
<header>
		<div class="logo">
			<img src="img/REMI_logo.png" alt="logo remi">
			<h2 class="nombre-remi">REMI</h2>
		</div>
        <a href="adm_coches.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
    
        <h1>AGREGAR COCHE</h1>

        <form action="agregarCoche.php" method="POST">
            <div class="cont2">

                <table>
                    <tr>
                        <td>
                            <h2>Marca</h2>
                            <input type="text"  name="marca"></input>
                        </td>
                        <td>
                            <h2>Modelo</h2>
                            <input type="text"  name="modelo"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Matricula</h2>
                            <input type="text"  name="matricula"></input>
                        </td>
                        <td>
                            <h2>Año</h2>
                            <input type="text"  name="anio"></input>
                        </td>
                    </tr>
                </table>
                
            </div>

            <button action="agregarCoche.php">GUARDAR</button>
        </form>
    
        
    </div>
    <br><br><br><br><br>
        <div class="footer">
            
        </div>
</body>
</html>