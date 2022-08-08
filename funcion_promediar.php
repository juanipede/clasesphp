<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

function promediar($aNumeros){
    $suma = 0;
    foreach ($aNumeros as $numero) {
        $suma = $suma + $numero;
    }
    return $suma / count($aNumeros);
}

$aNotas = array(8, 4, 5, 3, 9, 1);  // $aNotas reemplaza a $aNumeros . es como si $aNumeros fuese "X". Se le da ese nombre solo para la funcion, despues el nombre del array lo reemplaza.
echo "El promedio es: " . promediar($aNotas) . "<br>";   

?>