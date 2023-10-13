$(document).ready(function() {

    getAll();

    function getAll() {
        $.ajax({
            url: 'obtener_todo_cli.php',
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
						<tr cod="${res.cod_cliente}">
							<td><h2 class="nombres">${res.nombre_cli} ${res.apellido_cli}</h2><div class="cont-botones"><button class="boton btnInfo" data-cod_cliente="${res.cod_cliente}">Info</button></div></td>

						</tr>
                        <tr><td><hr></td></tr>
					`
                    $('#container_info').html(ret);

                });

            }
        })
    }

    $(document).on('click', '.btnInfo', function() {
        var cod_cliente = $(this).data("cod_cliente");
        window.location.href = "adm_dentro_pago_cli.php?cod_cliente=" + cod_cliente;
    });

});