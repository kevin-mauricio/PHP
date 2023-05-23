<?php
    $edades = $_REQUEST['edad'];
    $lenguaje = $_REQUEST['lenguaje'];

    echo "Esta es la edad: ", $edades.'<br>';
    echo "Este es el lenguaje seleccionado: ", $lenguaje.'<br>';

    if ($edades >= 18) {
        echo "Usted es mayor de edad con ", $edades;
    } else {
        echo "Usted es menor de edad";
    }


?>