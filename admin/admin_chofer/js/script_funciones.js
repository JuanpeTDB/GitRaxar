$(document).ready(function() {

    getAll();

    function getAll() {
        $.ajax({
            url: 'obtener_todo.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response) {
                let choferes = JSON.parse(response);
                let ret = '';
                console.log(JSON.parse(response));
                choferes.forEach(res => {
                    ret += `
						<tr cod="${res.ci}">
							<td><h2 class="nombres">${res.nombre} ${res.apellido}</h2><div class="cont-botones"><button class="boton btnInfo" data-ci="${res.ci}">Info</button><button class="boton btnEditar" data-ci="${res.ci}"> Editar </button> <button class="btneliminar boton"> Eliminar </button></div></td>

						</tr>
                        <tr><td><hr></td></tr>
					`
                    $('#container_info').html(ret);

                });

            }
        })


    }

    $(document).on("click", ".btneliminar", function() {

        var contenedor = $("<div>").css({
            "position": "fixed",
            "top": "0",
            "left": "0",
            "width": "100%",
            "height": "100%",
            "background-color": "rgba(0, 0, 0, 0.5)",
            "display": "flex",
            "justify-content": "center",
            "align-items": "center"
        });

        var contenido = $("<div>").addClass("contElim").css({
            "width": "40%",
            "padding": "80px",
            "height": "40%",
            "position": "fixed",
            "text-align": "center",
            "background-color": "#F5F5F5",
            "border-color": "#20A144",
            "border-style": "solid",
            "border-width": "3px",
            "border-radius": "15px",
            "font-family": "nexa",
            "font-size": "35px",
            "color": "#20A144",
            "box-shadow": "0 2px 4px rgba(0, 0, 0, 0.2)"

        });

        var div = $("<div>").css({
            "width": "100%",
            "position": "relative",
            "padding": "0",
            /* "padding-top": "60px", */
            "display": "flex",
            "justify-content": "center",
            "align-items": "center"
        });

        var botonCancelar = $("<button>").attr("id", "btnCancelar").text("CANCELAR").css({
            "width": "180px",
            "height": "60px",
            "position": "relative",
            "left": "10%",
            "text-align": "center",
            "background-color": "#9ED4AE",
            "border-color": "#20A144",
            "border-style": "solid",
            "border-width": "3px",
            "border-radius": "15px",
            "font-family": "nexa",
            "font-size": "25px",
            "color": "#20A144",
            "margin-top": "50px"

        });

        var botonAceptar = $("<button>").attr("id", "btnAceptar").text("ACEPTAR").css({
            "width": "180px",
            "height": "60px",
            "position": "relative",
            "right": "10%",
            "text-align": "center",
            "background-color": "#9ED4AE",
            "border-color": "#20A144",
            "border-style": "solid",
            "border-width": "3px",
            "border-radius": "15px",
            "font-family": "nexa",
            "font-size": "25px",
            "color": "#20A144",
            "margin-top": "50px"
        });

        div.append(botonAceptar).append(botonCancelar);
        contenido.append("<p class='parrafoElim'>¿Seguro que deseas eliminar al chofer del sistema?</p>");
        contenido.append(div);

        contenedor.append(contenido);

        $("body").append(contenedor);

        let item = $(this).closest('tr');
        let ci = item.attr('cod');

        function eliminarChofer(a) {
            console.log(a);

            $.ajax({
                url: 'eliminarChofer.php',
                type: 'POST',
                data: {
                    ci: a
                },
                success: function(data) {
                    getAll();
                }
            });
        };

        $(document).on('click', '#btnAceptar', function() {
            eliminarChofer(ci);
            contenedor.remove();
            eliminar = true;

        });

        contenedor.fadeIn();

        $("#btnCancelar").click(function() {
            contenedor.remove();
        });
    });

    $(document).on('click', '.btnEditar', function() {
        var ci = $(this).data("ci");
        window.location.href = "adm_editar_chofer.php?ci=" + ci;
    });

    $(document).on('click', '.btnInfo', function() {
        var ci = $(this).data("ci");
        window.location.href = "adm_dentro_chofer.php?ci=" + ci;
    });

});