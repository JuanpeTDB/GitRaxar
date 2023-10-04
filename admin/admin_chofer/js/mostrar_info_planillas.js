$(document).ready(function() {

    var fecha = $("#fecha").val();
    var ci = $("#ci").val();
    getAll2(ci, fecha);
    getAll(ci, fecha);

    function getAll(ci, fecha) {
        $.ajax({
            url: 'obtener_todo_viaje2.php',
            type: 'POST',
            data: {
                res: 1,
                fecha: fecha,
                ci: ci,
            },
            success: function(response) {
                console.log("Ajax success");
                console.log("Respuesta del servidor:", response);

                let choferes = JSON.parse(response);
                let ret = '';

                choferes.forEach(res => {
                    ret += `
						<tr cod="${res.cod_viaje}">
							<td><h4>${res.nombre_viajero} ${res.apellido_viajero}</h4></td><td><h4>${res.tipo_fp} </h4></td><td><h4>${res.importe} </h4></td>
						</tr>
                        `
                    $('#container_info').html(ret);

                });

            }
        })

    }

    function getAll2(ci, fecha) {
        $.ajax({
            url: 'obtener_todo_viaje3.php',
            type: 'POST',
            data: {
                res: 1,
                fecha: fecha,
                ci: ci,
            },
            success: function(response) {
                console.log("Ajax success");
                console.log("Respuesta del servidor:", response);

                let choferes2 = JSON.parse(response);
                let ret = '';

                choferes2.forEach(res => {
                    ret += `
						<tr>
							<td><h4>${res.tipo}</h4></td><td><h4>${res.descripcion} </h4></td><td><h4>${res.costo_mant} </h4></td>
						</tr>
                        `

                    $('#container_info2').html(ret);

                });

            }
        })

    }

});