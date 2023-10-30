$(document).ready(function() {

    var matricula = $("#matricula").val();
    getAll(matricula);

    function getAll(matricula) {
        $.ajax({
            url: 'obtener_todo_mantenimientos.php',
            type: 'POST',
            data: {
                res: 1
            },
            success: function(response) {
                let coches = JSON.parse(response);
                let ret = '';
                console.log(JSON.parse(response));

                coches.forEach(res => {
                    if (res.matricula == matricula) {
                        ret += `
                                <tr cod="${res.cod_visita}">
                                    <td><h2 class="nombres">${res.tipo} - ${res.fecha}</h2><div class="cont-botones"> <button class="boton btnInfo" data-cod_visita="${res.cod_visita}"> Info </button></div></td>
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
        var cod_visita = $(this).data("cod_visita");
        window.location.href = "adm_dentro_coche_mantenimiento.php?cod_visita=" + cod_visita;
    });

});