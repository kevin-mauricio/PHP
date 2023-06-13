<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de ventas</title>
</head>
<body>
    <button><a href="index.php">Inicio</a></button>
    <h1>Registro de ventas</h1>
    <?php 
    if (empty($_REQUEST)) {?>
        <form action="" method="post">
            <h2>Formulario de registro</h2>
            <label for="cantClientes">Ingrese la cantidad de clientes</label>
            <input type="text" name="cantidadClientes" id="cantClientes">
            <input type="submit" value="Siguiente">
        </form>
    <?php
    } else if (isset($_REQUEST['cantidadClientes'])) {
        $cantidadClientes = $_REQUEST['cantidadClientes'];
        ?>
        <form action="" method="post">
        <?php
        $i = 1;
        while ($i <= $cantidadClientes) {
            ?>
            <!-- ingresar los datos de cada cliente -->
            <label for="monto"><?php echo 'Cliente '.$i;?></label>
            <input type="number" id="monto" name="montoCompra[]" placeholder="monto compra">
            <input type="number" name="pagaCliente[]" placeholder="Cliente paga con...">
            <br>
            <?php
            $i++;
        } ?>
            <br>
            <input type="submit" name="calcular" value="Calcular">
        </form>
        <?php
    } else if (isset($_REQUEST['calcular'])) {?>
        <h3>Resumen del día</h3>
        <?php
        $cantidadClientes = count($_REQUEST['montoCompra']);
        echo 'Cantidad clientes atendidos '.$cantidadClientes.'<br><br>';
        define('IVA', 0.19);
        $totalVentas = 0;
        $contadorClientes = 1;
        foreach ($_REQUEST['montoCompra'] as $key => $monto) {
            $recibe = $_REQUEST['pagaCliente'][$key];
            $iva = $monto * IVA;
            $cambio = $recibe - $monto;
            $totalVentas += $monto;
            echo 'Cliente '.$contadorClientes.'<br>';
            $contadorClientes++;
            echo 'Valor de la compra: '.$monto.'<br>
            IVA: '.$iva.'<br>
            Dinero recibido: '.$recibe.'<br>
            Cambio: '.$cambio.'<br><br>';
        }
        echo 'Total de ventas: '.$totalVentas;
    }?>
</body>
</html>
