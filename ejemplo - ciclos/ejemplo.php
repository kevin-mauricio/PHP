<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>
<body>
    <h1>Tiendas de naranjas</h1>
    <?php
        if(empty($_REQUEST)){
    ?>
        <form action="" method="post">
            <label for="num">¿Cuantos clientes son?</label>
            <input type="number" name="num">
            <input type="submit" name="submit" value="Enviar">
        </form>
    <?php
    }else if (isset($_REQUEST['num'])){
    ?>
        <form action="" method="post">
            <?php
                $num = $_REQUEST['num'];
                for ($i=0; $i < $num ; $i++) { 
                    ?>   
                    Ingrese la cantidad de kilos del cliente<?php echo " ".$i+1;?>:
                    <input type="number" name="cantidad[]" value="">
                    <br>
                    <?php
                }    
            ?>
            <input type="submit" value="Enviar">
        </form>
    <?php
    }else{
        $totalCompras = 0;
        foreach($_REQUEST['cantidad'] as $cantidad){
            echo "<p>Cantidad: $cantidad</p>";
            if($cantidad>10){
                echo "Tiene descuento".'<br>';
                $precio = 3000;
                $subtotal = $cantidad * $precio;
                $descuento = $subtotal * 0.15;
                $total = $subtotal - $descuento;
                echo '<h2>Factura:</h2>
                        <p>Precio und: '.$precio.'</p>
                        <p>Subtotal: '.$subtotal.'</p>
                        <p>Descuento: '.$descuento.'</p>
                        <p>Total: '.$total.'</p>';
                $totalCompras += $total;
            }else{
                echo "No tiene descuento";
                $precio = 3000;
                $subtotal = $cantidad * $precio;
                $descuento = 0;
                $total = $subtotal - $descuento;
                echo '<h2>Factura:</h2>
                        <p>Precio und: '.$precio.'</p>
                        <p>Subtotal: '.$subtotal.'</p>
                        <p>Descuento: '.$descuento.'</p>
                        <p>Total: '.$total.'</p>';
                $totalCompras += $total;
            }
        }
        echo '<h3>Total percibido por la tienda: $'.$totalCompras.'</h3>';
        
    }
    ?>

</body>
</html>