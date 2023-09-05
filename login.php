<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_login.css">
</head>

<body>
    <div class="contenedor">
        <form action="verif_login.php" method="POST">
            <div id="box">
                <div class="div_logo">
                    <img id="logo" src="img/REMI_completo.png">
                </div>
                <input type="text" id="Usu" name="usuario" placeholder="Usuario">
                <input type="password" id="Passwd" name="contrasena" placeholder="Contraseña">
                <button id="btnIngresar" action="verif_login.php">Ingresar</button>
                <div id="msj_error">
                    
                </div>
            </div>
        </form>
    </div>
    
</body>


</html>