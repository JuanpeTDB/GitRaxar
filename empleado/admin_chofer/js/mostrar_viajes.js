$(document).ready(function() {

    var ciChofer = $("#ci_chofer").val();
    getAll(ciChofer);

    function getAll(ci) {
        $.ajax({
            url: 'obtener_todo_viaje.php',
            type: 'POST',
            data: {
                ci: ci,
                res: 1,

            },
            success: function(response) {
                console.log("Ajax success");
                let choferes = JSON.parse(response);
                let ret = '';
                console.log(JSON.parse(response));
                choferes.forEach(res => {
                    if (res.ci == ci) {
                        ret += `
						<tr cod="${res.cod_viaje}">
							<td><h2 class="nombres">${res.fecha}  |  ${res.nombre_viajero} ${res.apellido_viajero} </h2> <div class="cont-botones"><button class="boton btnInfo" data-cod_viaje="${res.cod_viaje}" data-ci="${res.ci}">Info</button></div></td>
						</tr>
                        <tr><td><hr></td></tr>
					`
                        $('#container_info').html(ret);
                    }


                });

            }
        })


    }

    $(document).on('click', '.btnInfo', function() {
        var ci = $(this).data("ci");
        var cod_viaje = $(this).data("cod_viaje");
        window.location.href = "adm_info_viaje_chof.php?ci=" + ci + "&cod_viaje=" + cod_viaje;
    });
});