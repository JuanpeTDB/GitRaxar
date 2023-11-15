<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMI</title>
    <link rel="stylesheet" type="text/css" href="css/adm_agendar_viaje.css">
    <link rel="icon" href="img/REMI_logo.png">
</head>

<body>

    <?php
    require_once '../../conexion.php';
    $cod_viaje = $_GET['cod_viaje'];
    $importe = $_GET['importe'];
    $nombre_viajero = $_GET['nombre_viajero'];
    $apellido_viajero = $_GET['apellido_viajero'];
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    $hora_inicio = $_GET['hora_inicio'];
    $fecha = $_GET['fecha'];
    $fecha_formateada = date("d-m-Y", strtotime($fecha));
    $comentario = $_GET['comentario'];
    $ciChofer = $_GET['ciChofer'];
    $telefono_cli = $_GET['telefono_cli'];
    $queryChoferes = "SELECT telefono FROM chofer where ci = '$ciChofer'";
    $resultChoferes = mysqli_query($conn, $queryChoferes);
    $jsonChoferes = array();
    while ($row = mysqli_fetch_array($resultChoferes)) {
        $telefono = $row['telefono'];
    }
    ?>

    <input type="hidden" id="importe" name="importe" value="<?php echo $importe; ?>">
    <input type="hidden" id="nombre_viajero" name="nombre_viajero" value="<?php echo $nombre_viajero; ?>">
    <input type="hidden" id="apellido_viajero" name="apellido_viajero" value="<?php echo $apellido_viajero; ?>">
    <input type="hidden" id="origen" name="origen" value="<?php echo $origen; ?>">
    <input type="hidden" id="destino" name="destino" value="<?php echo $destino; ?>">
    <input type="hidden" id="hora_inicio" name="hora_inicio" value="<?php echo $hora_inicio; ?>">
    <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha_formateada; ?>">
    <input type="hidden" id="comentario" name="comentario" value="<?php echo $comentario; ?>">
    <input type="hidden" id="ciChofer" name="ciChofer" value="<?php echo $ciChofer; ?>">
    <input type="hidden" id="cod_viaje" name="cod_viaje" value="<?php echo $cod_viaje; ?>">
    <input type="hidden" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
    <input type="hidden" id="telefono_cli" name="telefono_cli" value="<?php echo $telefono_cli; ?>">


    <header>
        <a style="text-decoration: none;" href="../../admin.php">
            <div class="logo">
                <img src="img/REMI_logo.png" alt="logo remi">
                <h2 class="nombre-remi">REMI</h2>
            </div>
        </a>
        <a href="adm_agendar_viaje.php" id="btnAtras" class="btnatras">ATRAS</a>
    </header>

    <div class="contenedor">

        <h1>AGENDAR VIAJE</h1>


        <input type="hidden" id="cod_viaje" name="cod_viaje" value="<?php echo $cod_viaje; ?>">
        <table>
            <tr>
                <td>
                    <h2>Forma de pago</h2>
                    <select name="metodoPago" id="metodoPago" style="width: 50%">
                        <option value="" disabled selected> Seleccione una forma de pago </option>
                        <option value="1">Contado</option>
                        <option value="2">Transferencia</option>
                        <option value="3">Cta. Corriente</option>
                        <option value="4">Tarjeta</option>
                    </select>
                </td>
            </tr>

        </table>

        <table class="tarjeta" style="display: none" id="opcionesTarjeta">
            <tr>
                <td class="opcs">
                    <input type="radio" name="tipoTarjeta" value="debito">
                </td>
                <td class="opcs">
                    <input type="radio" name="tipoTarjeta" value="credito">
                </td>
            </tr>
            <tr>
                <td class="opcs">
                    Débito
                </td>
                <td class="opcs">
                    Crédito
                </td>
            </tr>
        </table>

        <table class="tarjeta" style="display: none" id="opcionesCC">
            <tr>
                <td class="opcs">
                    <input type="radio" id="btnPar" name="tipoCC" value="1">
                </td>
                <td class="opcs">
                    <input type="radio" id="btnEmp" name="tipoCC" value="2">
                </td>
            </tr>
            <tr>
                <td class="opcs">
                    Particular
                </td>
                <td class="opcs">
                    Empresa
                </td>
            </tr>
        </table>

        <table class="tarjeta" id="eleccionCC">
            <tr>
                <td class="opcs" id="TRemp">
                    <?php
                    require_once '../../conexion.php';
                    $sql = "SELECT MAX(e.nombre_empresa) as nombre_empresa, MAX(cc.cod_cuenta) as cod_cuenta 
                    FROM cuenta_corriente cc
                    JOIN posee_emp pe ON pe.cod_cuenta = cc.cod_cuenta
                    JOIN empresa e ON e.rut = pe.rut
                    GROUP BY cc.cod_cuenta
                    ORDER BY MAX(e.nombre_empresa);
                    ";
                    $result = mysqli_query($conn, $sql);
                    $jsonEmp = array();
                    if (!$result) {
                        echo "Error en la consulta: " . mysqli_error($conn);
                    }
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cod_cuenta = $row['cod_cuenta'];
                            $nombre_empresa = $row['nombre_empresa'];
                            $jsonEmp[] = array('cod_cuenta' => $cod_cuenta, 'nombre_empresa' => $nombre_empresa);
                        }
                    }
                    ?>
                    <select id="emp" name="emp">
                        <?php
                        if (empty($jsonEmp)) {
                            echo "<option value='' disabled selected>No hay ctas. corrientes</option>";
                        } else {
                            echo "<option value='' disabled selected>Seleccione una cta. corriente</option>";
                            foreach ($jsonEmp as $Empresa) {
                                $nombre_empresa = $Empresa['nombre_empresa'];
                                echo "<option value='{$Empresa['cod_cuenta']}'>$nombre_empresa</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="opcs" id="TRpar">
                    <?php
                    require_once '../../conexion.php';
                    $sql = "SELECT cc.cod_cuenta, MAX(c.nombre_cli) as nombre_cli, MAX(c.apellido_cli) as apellido_cli
                    FROM cuenta_corriente cc
                    JOIN posee_par par ON par.cod_cuenta = cc.cod_cuenta
                    JOIN particular p ON p.cod_cliente = par.cod_cliente
                    JOIN cliente c ON c.cod_cliente = par.cod_cliente
                    GROUP BY cc.cod_cuenta
                    ORDER BY MAX(c.nombre_cli);
                    ";
                    $jsonPar = array();
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        echo "Error en la consulta: " . mysqli_error($conn);
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cod_cuenta = $row['cod_cuenta'];
                            $nombre_cli = $row['nombre_cli'];
                            $apellido_cli = $row['apellido_cli'];
                            $jsonPar[] = array('cod_cuenta' => $cod_cuenta, 'nombre_cli' => $nombre_cli, 'apellido_cli' => $apellido_cli);
                        }
                    }
                    ?>
                    <select id="par" name="emp">
                        <?php
                        if (empty($jsonEmp)) {
                            echo "<option value='' disabled selected>No hay ctas. corrientes</option>";
                        } else {
                            echo "<option value='' disabled selected>Seleccione una cta. corriente</option>";
                            foreach ($jsonPar as $Particular) {
                                $nombre_cli = $Particular['nombre_cli'];
                                $apellido_cli = $Particular['apellido_cli'];
                                echo "<option value='{$Particular['cod_cuenta']}'>$nombre_cli $apellido_cli</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>

        <br>
        <br>

        <div>
            <button id="btnContinuar">CONFIRMAR</button>
        </div>


    </div>
    <br><br><br><br><br>
    <div class="footer">

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/forma_de_pago.js"></script>
</body>

</html>