<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

//Definicion
function contar($aArray){
    $contador=0;
    foreach($aArray as $item){
        $contador++;
    }
    return $contador;
}

//Uso
//array de notas
$aNotas = array(9,8,9.50,4,7,8);


//array de pacientes
$aPacientes=array();
$aPacientes[]=array(
    "dni" => "33.765.012",
    "nombreyapellido" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.5

); 
$aPacientes[]=array(
    "dni" => "23.684.385",
    "nombreyapellido" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79

); 
$aPacientes[]=array(
    "dni" => "23.684.385",
    "nombreyapellido" => "Juan Irraola",
    "edad" => 28,
    "peso" => 79

); 
$aPacientes[]=array(
    "dni" => "23.684.385",
    "nombreyapellido" => "Beatriz Ocampo",
    "edad" => 50,
    "peso" => 79

); 

//array de productos
$aProductos=array();
$aProductos[] = array("nombre" => "Smart TV 55\" 4K UHD",
                    "marca" => "Hitachi",
                    "modelo" => "554KS20",
                    "stock" => 60,
                    "precio" => 58000
);

$aProductos[] = array("nombre" => "Samsung Galaxy A30 Blanco",
                    "marca" => "Samsung",
                    "modelo" => "Galaxy A30",
                    "stock" => 0,
                    "precio" => 22000
);                    

$aProductos[] = array("nombre" => "Aire Acondicionado Split Inverter F/C Surrey 2900F",
                    "marca" => "Surrey",
                    "modelo" => "553AIQ1201E",
                    "stock" => 5,
                    "precio" => 45000
);

echo "Cantidad de productos: " .contar($aProductos);
echo "Cantidad de pacientes: " .contar($aPacientes);
echo "Cantidad de notas: " .contar($aNotas);
?>