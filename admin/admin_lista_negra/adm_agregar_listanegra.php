<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_agregar_listanegra.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>
<body>
    <header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="adm_listanegra.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">

        <h1>LISTA NEGRA</h1>

        <table>
            <tr>
                <td>
                    <h2>Nombre cliente</h2>
                    <input type="text"></input>
                </td>
                <td>
                    <h2>Cedula</h2>
                    <input type="text"></input>
                </td>
                <td>
                    <h2>Fecha</h2>
                    <input type="text"></input>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <h2>Motivo</h2>
                    <input type="text"></input>
                </td>
            </tr>

        </table>

        <br>
        <br>

        <div>
            <button onclick="window.location.href='adm_listanegra.php';">ATRAS</button>
            <button onclick="window.location.href='adm_listanegra.php';">CONTINUAR</button>
        </div>
    
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
    </div>
</body>
</html>