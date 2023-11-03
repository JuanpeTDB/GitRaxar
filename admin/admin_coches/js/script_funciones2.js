$(document).ready(function() {
    var matricula = $('#matricula').val();
    getAll(matricula);

    function getAll(matricula) {
        $.ajax({
            url: 'obtener_todo_viaje.php',
            type: 'POST',
            data: {
                res: 1,
                matricula: matricula,
            },
            success: function(response) {
                let choferes = JSON.parse(response);
                let ret = '';
                console.log(JSON.parse(response));
                choferes.forEach(res => {
                    ret += `
						<tr cod="${res.cod_viaje}">
							<td><h2 class="nombres">${res.nombre_viajero} ${res.apellido_viajero} | ${res.fecha}</h2><div class="cont-botones"><button class="boton btnInfo" data-fecha="${res.fecha}" data-cod_viaje="${res.cod_viaje}">Info</button></div></td>

						</tr>
                        <tr><td><hr></td></tr>
					`
                    $('#container_info').html(ret);

                });

            }
        })


    }

    $(document).on('click', '.btnInfo', function() {
        var cod_viaje = $(this).data("cod_viaje");
        window.location.href = "adm_dentro_viaje.php?cod_viaje=" + cod_viaje;
    });

});