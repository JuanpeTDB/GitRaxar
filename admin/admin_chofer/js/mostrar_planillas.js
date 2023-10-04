$(document).ready(function() {

    var ci = $("#ci").val();

    getAll(ci);

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
                let fechasImpresas = {};

                choferes.forEach(res => {
                    if (!fechasImpresas[res.fecha]) {
                        ret += `
						<tr cod="${res.cod_viaje}">
							<td><h2 class="nombres">${res.fecha}</h2><div class="cont-botones"><button class="boton btnInfo" data-fecha="${res.fecha}" data-ci="${res.ci}">Info</button> </div> </td>
						</tr>
                        <tr><td><hr></td></tr>
                        `
                        $('#container_info').html(ret);
                        fechasImpresas[res.fecha] = true;
                    }
                });

            }
        })


    }

    $(document).on('click', '.btnInfo', function() {
        var ci = $(this).data("ci");
        var fecha = $(this).data("fecha");
        window.location.href = "adm_dtro_planilla.php?ci=" + ci + "&fecha=" + fecha;
    });
});