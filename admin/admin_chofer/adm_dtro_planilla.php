<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <script src="https://kit.fontawesome.com/28b29172a8.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.js"
        integrity="sha512-tEqLjoRgU47rrCeCRKlUjDeDD7IbMCf/dpcedUG6pXUCZOweBDCg8+8H+XdiTNptUU+TK18r5DPKZFKxLPSWsg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"
        integrity="sha512-pAoMgvsSBQTe8P3og+SAnjILwnti03Kz92V3Mxm0WOtHuA482QeldNM5wEdnKwjOnQ/X11IM6Dn3nbmvOz365g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"
        integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="css/estilo_adm_dtro_planilla.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>

<?php
require_once '../../conexion.php';
$ci = $_GET['ci'];
$fecha = $_GET['fecha'];
$query = "SELECT v.*, c.*, fp.*, DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha1
        FROM viajes v
        LEFT JOIN (
            SELECT t.cod_viaje, fp.cod_pago, cod_cuenta, activo, 'cuenta corriente' as rol, null as tipo 
            FROM cuenta_corriente fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, 'transferencia' as rol, null as tipo 
            FROM transferencia fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo,  'contado' as rol, null as tipo 
            FROM contado fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
            UNION
            SELECT t.cod_viaje, fp.cod_pago, null as cod_cuenta, null as activo, 'tarjeta' as rol, tipo 
            FROM tarjeta fp
            JOIN tiene t ON t.cod_pago = fp.cod_pago
        ) AS fp ON v.cod_viaje = fp.cod_viaje
        join se_encarga se on se.cod_viaje = v.cod_viaje
        join chofer c on c.ci = se.ci
        where c.ci = $ci and v.fecha = '$fecha';
        ";
$result = mysqli_query($conn, $query);
$json = array();
$totalContado = 0;
$total = 0;

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ci = $row['ci'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $telefono = $row['telefono'];
        $de_la_casa = $row['de_la_casa'];
        $nombre_viajero = $row['nombre_viajero'];
        $apellido_viajero = $row['apellido_viajero'];
        $telefono = $row['telefono'];
        $origen = $row['origen'];
        $destino = $row['destino'];
        $hora_inicio = $row['hora_inicio'];
        $importe = $row['importe'];
        $fecha = $row['fecha'];
        $fecha1 = $row['fecha1'];
        $comentario = $row['comentario'];
        $tipo_fp = $row['rol'];
        $total += $row['importe'];

        if ($row['rol'] == 'contado') {
            $totalContado += $row['importe'];
        }
    }

}
$query2 = "SELECT * from requiere re
        join mantenimiento m on re.cod_mantenimiento = m.cod_mantenimiento
        join auto au on au.matricula = re.matricula
        join conduce co on co.matricula = re.matricula
        join chofer c on c.ci = co.ci
        where c.ci = $ci and re.fecha = '$fecha';";
$result2 = mysqli_query($conn, $query2);
$total_mant = 0;
if ($result2) {
    while ($row = mysqli_fetch_assoc($result2)) {
        $costo = $row['costo'];
        $total_mant += $costo;
    }
}


?>

<body>
    <header>
        <a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_planilla_cierre_dia.php?ci=<?php echo $ci; ?>" class="btnatras">ATRAS</a>
    </header>

    <input type="hidden" id="fecha" value="<?php echo $fecha; ?>">
    <input type="hidden" id="ci" value="<?php echo $ci; ?>">

    <div class="contenedor">

        <h1>
            <?php echo $nombre; ?>
            <?php echo $apellido; ?>
        </h1>
        <h1> -
            <?php echo $fecha1; ?>
        </h1>

        <br><br>
        <button id="pdf"><i class="fa-solid fa-download"></i></button>
        <br><br>

        <h2 class="ganancias">Ganancias</h2>

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
        <br><br>
        <table>
            <tr>
                <td>
                    <h3>Total:</h3>
                </td>
                <td>
                    <h3>$
                        <?php echo $total; ?>
                    </h3>
                </td>
            </tr>
            <tr id="totalContado">
                <td>
                    <h3>Total contado:</h3>
                </td>
                <td>
                    <h3>$
                        <?php echo $totalContado; ?>
                    </h3>
                </td>
            </tr>
        </table>


        <br><br>
        <hr>
        <br><br>

        <h2 class="ganancias">Gastos</h2>

        <table>
            <tr>
                <td>
                    <h2 class="nombres">Tipo</h2>
                </td>
                <td>
                    <h2 class="nombres">Descripcion</h2>
                </td>
                <td>
                    <h2 class="nombres">Monto</h2>
                </td>
            </tr>
        </table>

        <table id="container_info2">

        </table>

        <br><br>

        <table>
            <tr>
                <td>
                    <h3>Total:</h3>
                </td>
                <td>
                    <h3>$
                        <?php echo $total_mant; ?>
                    </h3>
                </td>
            </tr>
        </table>


        <br><br>
        <hr>
        <br><br>

        <h2 class="ganancias">Saldo del chofer</h2>

        <br>

        <table>
            <tr>
                <td>
                    <h3>Total:</h3>
                </td>
                <td>
                    <h3>$
                        <?php echo $totalContado - $total_mant; ?>
                    </h3>
                </td>
            </tr>
        </table>

        <br><br><br><br>


    </div>
    <div class="footer">

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="js/pdf.js"></script>

</html>