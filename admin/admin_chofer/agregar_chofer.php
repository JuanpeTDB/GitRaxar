<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_agregar_chofer.css">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="adm_choferes.php" class="btnatras">ATRAS</a>
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
                            <input type="text"  name="Apellido"></input>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2>Telefono</h2>
                            <input type="text"  name="matricula"></input>
                        </td>
                        <td>
                            <h2>De la casa</h2>
                            <select name="de_la_casa">
                                <option value="1">De la casa</option>
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
</html>