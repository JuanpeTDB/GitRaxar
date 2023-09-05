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
						<tr cod="${res.cod_chofer}">
							<td><h2>${res.nombre} ${res.apellido}<button class="boton btnInfo" data-cod_chofer="${res.cod_chofer}">Info</button><button class="boton btnEditar" data-cod_chofer="${res.cod_chofer}"> Editar </button> <button class="btneliminar boton"> Eliminar </button> <hr> </h2></td>
						</tr>
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

        var contenido = $("<div>").css({
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
            "padding-top": "60px",
            "display": "flex",
            "justify-content": "center",
            "align-items": "center"
        });

        var botonCancelar = $("<button>").attr("id", "btnCancelar").text("CANCELAR").css({
            "width": "180px",
            "height": "60px",
            "position": "absolute",
            "left": "0px",
            "text-align": "center",
            "background-color": "#9ED4AE",
            "border-color": "#20A144",
            "border-style": "solid",
            "border-width": "3px",
            "border-radius": "15px",
            "font-family": "nexa",
            "font-size": "25px",
            "color": "#20A144",
            "margin-left": "50px"
        });

        var botonAceptar = $("<button>").attr("class", "btnAceptar").text("ACEPTAR").css({
            "width": "180px",
            "height": "60px",
            "position": "absolute",
            "right": "0px",
            "text-align": "center",
            "background-color": "#9ED4AE",
            "border-color": "#20A144",
            "border-style": "solid",
            "border-width": "3px",
            "border-radius": "15px",
            "font-family": "nexa",
            "font-size": "25px",
            "color": "#20A144",
            "margin-right": "50px"
        });

        div.append(botonAceptar).append(botonCancelar);
        contenido.append("<p>¿Seguro que deseas eliminar al chofer del sistema?</p>");
        contenido.append(div);

        contenedor.append(contenido);

        $("body").append(contenedor);



        function eliminarChofer(a) {
            console.log(a);

            $.ajax({
                url: 'eliminarChofer.php',
                type: 'POST',
                data: {
                    cod_chofer: a
                },
                success: function(data) {
                    getAll();
                }
            });
        };


        let item = $(this).closest('tr');
        let cod_chofer = item.attr('cod');


        $(document).on('click', '.btnAceptar', eliminarChofer(cod_chofer), function() {
            contenedor.remove();
        });

        contenedor.fadeIn();

        $("#btnCancelar").click(function() {
            contenedor.remove();
        });
    });

    $(document).on('click', '.btnEditar', function() {
        var cod_chofer = $(this).data("cod_chofer");
        window.location.href = "adm_editar_chofer.php?cod_chofer=" + cod_chofer;
    });

    $(document).on('click', '.btnInfo', function() {
        var cod_chofer = $(this).data("cod_chofer");
        window.location.href = "adm_dentro_chofer.php?cod_chofer=" + cod_chofer;
    });

});