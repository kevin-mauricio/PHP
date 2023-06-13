<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago de nómina</title>
</head>
<body>
    <button><a href="index.php">Inicio</a></button>
    <h1>SISE LIMITADA</h1>
    <h2>Pago de nómina</h2>
    <form action="" method="post">
        <?php 
        $i = 1;
        while ($i <= 2) { ?>
        <h3>Colaborador <?php echo $i; ?></h3>
        <label for="horas">Horas trabajadas</label>
        <input type="number" name="horasTrabajadas[]" id="horas">
        <input type="number" name="valorHora[]" id="" placeholder="Valor hora trabajada">
        <br><br>
        <label for="">Cargo</label>
        <select name="cargos[]" id="cargo">
            <option value=""></option>
            <option value="digitador">Digitador</option>
            <option value="diseñador">Diseñador</option>
        </select>
        <br><br>
        <?php
        $i++;
        } ?>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    if (isset($_POST['enviar'])) {
        $contador = 1;
        $totalPagarDigitadores = 0;
        $totalPagarDiseñadores = 0;
        foreach ($_REQUEST['horasTrabajadas'] as $key => $horas) {
            $cantidadhoras = $horas;
            $cargo = $_POST['cargos'][$key];
            $valorHora = $_POST['valorHora'][$key];
            $impuesto = (($cargo == 'digitador')? 0.12 : 0.10);
            $salario = $cantidadhoras * $valorHora; // salario sin descuento
            $pagaImpuesto = false;
            if ($salario > 1000000) {
                $salario = $salario - ($salario * $impuesto); // salario con descuento
                $pagaImpuesto = true;
            }
            if ($cargo == 'digitador') {
                $totalPagarDigitadores += $salario;
            } else {
                $totalPagarDiseñadores += $salario;
            }
            echo 'Resumen del pago<br><br>
            Colaborador '.$contador.'<br>
            Cargo '.$cargo.'<br>
            Horas trabajadas '.$cantidadhoras.'<br>
            Valor hora '.$valorHora.'<br>
            Impuesto '.(($pagaImpuesto)?$impuesto*100:0).'%<br>
            Salario '.$salario.'<br><br>' ;
            $contador++;
        }
        echo 'Total a pagar a Digitadores: '.$totalPagarDigitadores.'<br>';
        echo 'Total a pagar a Diseñadores: '.$totalPagarDiseñadores;

    } ?>



</body>
</html>