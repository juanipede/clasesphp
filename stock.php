<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

/*  si stock es mayor que 0, entonces:
    imprime "Hay stock"
    sino
    imprime "No hay stock"
*/


$stock = 800;
if($stock > 0){
    echo "Hay stock";
} else {
    echo "No hay stock";
}






?>