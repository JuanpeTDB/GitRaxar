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
        <form id="loginForm" method="POST">
            <div id="box">
                <div class="div_logo">
                    <img id="logo" src="img/REMI_completo.png">
                </div>
                <input type="text" id="Usu" name="usuario" placeholder="Usuario">
                <input type="password" id="Passwd" name="contrasenia" placeholder="Contraseña">
                <button name="btnIngresar" id="btnIngresar" type="submit">Ingresar</button>
                <div id="msj_error">
                    
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script_login.js"></script>
</body>
</html>
