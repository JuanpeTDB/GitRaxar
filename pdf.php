<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.js"
        integrity="sha512-tEqLjoRgU47rrCeCRKlUjDeDD7IbMCf/dpcedUG6pXUCZOweBDCg8+8H+XdiTNptUU+TK18r5DPKZFKxLPSWsg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"
        integrity="sha512-pAoMgvsSBQTe8P3og+SAnjILwnti03Kz92V3Mxm0WOtHuA482QeldNM5wEdnKwjOnQ/X11IM6Dn3nbmvOz365g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"
        integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <table>
        <tr>
            <td>
                <h2 class="nombres">Cliente</h2>
            </td>
            <td>
                <h2 class="nombres">Forma de pago</h2>
            </td>
            <td>
                <h2 class="nombres">Monto</h2>
            </td>
        </tr>
    </table>

    <table id="container_info">

    </table>

    <table>
        <tr>
            <td>
                <h2 class="nombres">Cliente</h2>
            </td>
            <td>
                <h2 class="nombres">Forma de pago</h2>
            </td>
            <td>
                <h2 class="nombres">Monto</h2>
            </td>
        </tr>
    </table>

    <table id="container_info2">

    </table>
    <button id="pdf">PDF</button>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        getAll(666666, '2023-10-30');
        getAll2(666666, '2023-10-30');
        pdf(666666, '2023-10-30');

        function getAll(ci, fecha) {
            $.ajax({
                url: 'admin/admin_chofer/obtener_todo_viaje2.php',
                type: 'POST',
                data: {
                    res: 1,
                    fecha: fecha,
                    ci: ci,
                },
                success: function (response) {
                    console.log("Ajax success");
                    console.log("Respuesta del servidor:", response);

                    let choferes = JSON.parse(response);
                    let ret = '';
                    let totalContado = 0;

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
                url: 'admin/admin_chofer/obtener_todo_viaje3.php',
                type: 'POST',
                data: {
                    res: 1,
                    fecha: fecha,
                    ci: ci,
                },
                success: function (response) {
                    console.log("Ajax success");
                    console.log("Respuesta del servidor:", response);

                    let choferes2 = JSON.parse(response);
                    let ret = '';
                    let total_mant = 0;

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

        function pdf(ci, fecha) {
            $.ajax({
                url: 'admin/admin_chofer/obtener_todo_viaje2.php',
                type: 'POST',
                data: {
                    res: 1,
                    fecha: fecha,
                    ci: ci,
                },
                success: function (response) {
                    console.log("Ajax success");
                    console.log("Respuesta del servidor:", response);

                    let choferes = JSON.parse(response);
                    let ret = [];
                    let nombre_chofer = '';
                    let fecha2 = '';
                    let totalContado = 0;
                    let total = 0;

                    choferes.forEach(res => {
                        ret.push([
                            `${res.nombre_viajero} ${res.apellido_viajero}`,
                            res.tipo_fp,
                            res.importe
                        ]);
                        nombre_chofer = `${res.nombre} ${res.apellido}`;
                        fecha2 = res.fecha;
                        total = parseFloat(total) + parseFloat(res.importe);
                        if (res.tipo_fp == 'Contado') {
                            totalContado = parseFloat(totalContado) + parseFloat(res.importe);
                        }
                    });

                    $.ajax({
                        url: 'admin/admin_chofer/obtener_todo_viaje3.php',
                        type: 'POST',
                        data: {
                            res: 1,
                            fecha: fecha,
                            ci: ci,
                        },
                        success: function (response) {
                            console.log("Ajax success");
                            console.log("Respuesta del servidor:", response);

                            let choferes = JSON.parse(response);
                            let ret2 = [];
                            let total_mant = 0;

                            choferes.forEach(res => {
                                ret2.push([
                                    res.tipo,
                                    res.descripcion,
                                    res.costo_mant
                                ]);
                                total_mant = parseFloat(total_mant) + parseFloat(res.costo_mant);
                            });

                            let saldoChof = 0;
                            saldoChof = parseFloat(totalContado) - parseFloat(total_mant);

                            fillTable(ret, ret2, fecha2, nombre_chofer, totalContado, total_mant, saldoChof, total);
                        }
                    });
                }
            });
        }

        function fillTable(data1, data2, fecha, nombre_chofer, totalContado, total_mant, saldoChof, total) {
            fetch('img/REMI_logo.png')
                .then(response => response.blob())
                .then(blob => {
                    var reader = new FileReader();
                    reader.onload = function () {
                        var docDefinition = {
                            pageMargins: [40, 60, 40, 40],
                            header: {
                                margin: [40, 20, 0, 0],
                                columns: [
                                    {
                                        image: reader.result,
                                        width: 50,
                                        height: 50
                                    },
                                    {
                                        text: `Planilla de cierre de dia | ${nombre_chofer} | ${fecha}`,
                                        style: 'header',
                                        margin: [20, 0, 0, 0]
                                    }
                                ]
                            },
                            content: [
                                {
                                    margin: [0, 0, 0, 20],
                                    text: 'Ganancias del día',
                                    style: 'header'
                                },
                                {
                                    table: {
                                        headerRows: 1,
                                        widths: ['*', '*', '*'],
                                        body: [
                                            ['Nombre', 'Forma de pago', 'Importe ($)'],
                                            ...data1
                                        ],
                                    },
                                    layout: {
                                        fillColor: function (rowIndex, node, columnIndex) {
                                            return (rowIndex == 0) ? '#9ED4AE' : null;
                                        },
                                        hLineWidth: function (i, node) {
                                            return (i === 0 || i === node.table.body.length) ? 2 : 1;
                                        },
                                        vLineWidth: function (i, node) {
                                            return (i === 0 || i === node.table.widths.length) ? 2 : 1;
                                        },
                                        hLineColor: function (i, node) {
                                            return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';
                                        },
                                        vLineColor: function (i, node) {
                                            return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';
                                        },
                                    }
                                },
                                {
                                    text: `Total ganancias: $${total}`,
                                    style: 'header'
                                }, ,
                                {
                                    margin: [0, 20, 0, 30],
                                    text: `Total contado: $${totalContado}`,
                                    style: 'header'
                                },
                                {
                                    canvas: [
                                        {
                                            type: 'line',
                                            x1: 0,
                                            y1: 5,
                                            x2: 515,
                                            y2: 5,
                                            lineWidth: 5,
                                            lineColor: '#20A144'
                                        }
                                    ]
                                },
                                {
                                    margin: [0, 30, 0, 20],
                                    text: 'Gastos del día',
                                    style: 'header'
                                },
                                {
                                    table: {
                                        headerRows: 1,
                                        widths: ['*', '*', '*'],
                                        body: [
                                            ['Tipo', 'Descripción', 'Costo de Mantenimiento ($)'],
                                            ...data2

                                        ],
                                    },
                                    layout: {
                                        fillColor: function (rowIndex, node, columnIndex) {
                                            return (rowIndex == 0) ? '#9ED4AE' : null;
                                        },
                                        hLineWidth: function (i, node) {
                                            return (i === 0 || i === node.table.body.length) ? 2 : 1;
                                        },
                                        vLineWidth: function (i, node) {
                                            return (i === 0 || i === node.table.widths.length) ? 2 : 1;
                                        },
                                        hLineColor: function (i, node) {
                                            return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';
                                        },
                                        vLineColor: function (i, node) {
                                            return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';
                                        },
                                    }
                                },
                                {
                                    margin: [0, 20, 0, 30],
                                    text: `Total contado: $${total_mant}`,
                                    style: 'header'
                                },
                                {
                                    canvas: [
                                        {
                                            type: 'line',
                                            x1: 0,
                                            y1: 5,
                                            x2: 515,
                                            y2: 5,
                                            lineWidth: 5,
                                            lineColor: '#20A144'
                                        }
                                    ]
                                },
                                {
                                    text: `Saldo chofer: $${saldoChof}`,
                                    style: 'header'
                                }
                            ],
                            styles: {
                                header: {
                                    fontSize: 18,
                                    bold: true,
                                    alignment: 'center',
                                    margin: [0, 20, 0, 0]
                                },
                                table: {
                                    margin: [0, 10, 0, 10]
                                },

                                tableHeader: {
                                    bold: true,
                                    fontSize: 14,
                                    color: 'black'
                                }
                            }
                        };

                        var nombrePDF = `PCD_${nombre_chofer}_${fecha}.pdf`;

                        $("#pdf").click(function () {
                            pdfMake.createPdf(docDefinition).download(nombrePDF);
                        });
                    };
                    reader.readAsDataURL(blob);
                });
            }
        });
</script>

</html>