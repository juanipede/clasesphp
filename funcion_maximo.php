<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

function maximo($aVector) {
    $maximo = 0;
    foreach ($aVector as $valor) {
        if($maximo < $valor){  // $maximo es menor que $valor ? si es menor entonces... (continua en la linea de abajo)
            $maximo = $valor;  //$maximo es igual a $valor (que hasta el momento es el numero mas grande, en el primer caso del array $aNotas es 8)
        }


    }
    return $maximo;
}

$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldos = array(800,400,500,3000,900,10000);

echo "La nota maxima es: " . maximo($aNotas) . "<br>";
echo "El sueldo maximo es: " . maximo($aSueldos) . "<br>";  
?>