$(document).ready(function() {
    $("#loginForm").submit(function(event) {
        event.preventDefault();

        var usuario = $("#Usu").val();
        var contrasenia = $("#password").val();

        $.ajax({
            type: "POST",
            url: "verif_login.php",
            data: {
                usuario: usuario,
                contrasenia: contrasenia
            },
            success: function(response) {
                if (response === "success") {
                    $("#msj_error").html('');
                    window.location.href = 'admin.php?usuario=' + usuario;
                } else if (response === "success2") {
                    $("#msj_error").html('');
                    window.location.href = 'empleado.php';
                } else {
                    $("#msj_error").html('<p>Usuario y/o contraseña incorrectos.</p>');
                }
            }
        });
    });
});