<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

function print_f($variable){
    //Si es un array, lo recorro y guardo el contenido en el archivo "datos.txt"
    if(is_array($variable)){
        $archivo = fopen('datos.txt','a+');
        foreach($variable as $item){
            fwrite($archivo, "\n". $item);   // "\n" es para saltar linea, como si fuese un ENTER.
        }
        fclose($archivo);
        //otra opcion es la siguiente con file_put_contents
        //$contenido = "";
        //foreach($variable as $item){
            //$contenido = $item . "\n";
        //file_put_contents("datos.txt",$contenido);
        // }
    } else {
        //Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt", $variable);
    }

}

//Uso
$aNotas = array(8,5,7,9,10);
$msg = "Este es un mensaje!";
print_f($aNotas);
?>