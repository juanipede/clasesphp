<?php
// lo siguiente es para que php nos muestre los errores. por defecto no viene activado y con estas lineas lo activamos.
ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

//define la zona horaria en argentina
date_default_timezone_set("America/Argentina/Buenos_Aires");

$nombre = "Juan Ignacio Pedevilla";
$edad = 26;
$aPeliculas = array("Busqueda implacable", "Volver al futuro"); //otra forma similar es esta: $aPeliculas= ["Busqueda implacable", "Volver al futuro"];

// ademas de "echo" , estas dos siguientes son otras variables para mostrar el contenido pero nos dan mas datos, se usan cuando quiero mostrar mas de 1 dato. Como por ejemplo las peliculas
// print_r($aPeliculas);
// var_dump($aPeliculas);

// print_r($aPeliculas[0]) es para mostrar un dato solo. en este caso muestra el primero (0= busqueda implacable) 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Ficha personal</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr>
                        <th>Fecha:</th>
                        <td> <?php echo date("d/m/Y"); ?> </td>
                    </tr>
                    <tr>
                        <th>Nombre y apellido:</th>
                        <td><?php echo $nombre; ?></td>
                    </tr>
                    <tr>
                        <th>Edad:</th>
                        <td><?php echo $edad; ?></td>
                    </tr>
                    <tr>
                        <th>Peliculas favoritas:</th>
                        <td><?php echo $aPeliculas[0]; ?> <br>
                            <?php echo $aPeliculas[1]; ?>
                        </td>

                    </tr>
                </table>

            </div>
        </div>

    </main>
</body>

</html>