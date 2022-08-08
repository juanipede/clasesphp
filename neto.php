<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

//Definicion
function calcularNeto($bruto){
    return $bruto - ($bruto * 0.17);
}

echo "El sueldo neto es $" .calcularNeto(80000);
?>