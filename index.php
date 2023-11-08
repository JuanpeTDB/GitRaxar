<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_login.css">
    <script src="https://kit.fontawesome.com/28b29172a8.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/REMI_logo.png">
</head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        window.location.hash = "no-back-button";
        window.location.hash = "Again-No-back-button";//esta linea es necesaria para chrome
        window.onhashchange = function () { window.location.hash = "no-back-button"; }
    }
    );
</script>
<?php
session_start();
?>

<body>
    <div class="contenedor">
        <form id="loginForm" method="POST">
            <div id="box">
                <div class="div_logo">
                    <img id="logo" src="img/REMI_completo.png">
                </div>
                <div class="div_logo2" style="display: none;">
                    <img id="logo" src="img/REMI_completo.png">
                </div>
                <div class="formulario">
                    <input type="text" id="Usu" name="usuario" placeholder="Usuario">
                    <div class="password">
                        <input name="contrasenia" type="password" id="password" placeholder="Contraseña"></input>
                        <i style="color: #20A144;" id="pass-icon" onclick="pass()"
                            class="pass-icon fa-solid fa-eye-slash"></i>
                    </div>
                    <button name="btnIngresar" id="btnIngresar" type="submit"><span>Ingresar</span></button>
                    <div id="msj_error">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script_login.js"></script>
    <script>
        $(document).ready(function () {
            $("#pass-icon").click(function () {
                if ($("#password").attr("type") == "password") {
                    $("#password").attr("type", "text");
                    $("#pass-icon").removeClass("fa-eye-slash");
                    $("#pass-icon").addClass("fa-eye");
                } else {
                    $("#password").attr("type", "password");
                    $("#pass-icon").removeClass("fa-eye");
                    $("#pass-icon").addClass("fa-eye-slash");
                }
            });
        });
    </script>
</body>

</html>