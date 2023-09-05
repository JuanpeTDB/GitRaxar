<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_cliente.css">
</head>
<body>
<header>
		<img class="logo" src="img/REMI_completo.png">
        <a href="../../admin.php" class="btnatras">ATRAS</a>
	</header>

    <div class="contenedor">
        <h1>CLIENTES</h1>

        <a class="agregar"  onclick="window.location.href='agregar_cliente.php';">
            <img src="img/agregar.png" class="boton"><img src="img/silueta.png" class="boton">
        </a>

        <div class="box">
            <table>
                <tr onclick="window.location.href='adm_dentro_cliente.php';">
                    <td>
                        <h2>Juan Fripp</h2>
                        <hr>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Matias Valdez</h2>
                        <hr>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Federico Martinez</h2>
                        <hr>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Nahitan Nandez</h2>
                        <hr>
                        
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h2>Francisco Ginella</h2>
                        <hr>
                    </td>
                </tr>
                
            <table>
            
        </div>
    </div>
    
    <br><br><br><br><br>
    <div class="footer">
		
    </div>
</body>
</html>