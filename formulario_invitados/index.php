<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

//Si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array
//Los DNIs permitidos
if(file_exists("invitados.txt")){
    $archivo = fopen("invitados.txt", "r");
    $aDocumentos = fgetcsv($archivo, 0, ",");
} else {
//Sino el array queda como un array vacio  
    $aDocumentos = array();
}

if($_POST){
    
    if(isset($_POST["btnProcesar"])){
        $documento = $_REQUEST["txtDni"]; //creo esta variable que es el Dni que pone el usuario para ingresar.
        //Si el DNI ingresado se encuentra en la lista se mostrará un mensaje Bienvenido
        if(in_array($documento, $aDocumentos)){
            $mensaje = "Bienvenid@ a la fiesta.";
        } else {
        //Sino un mensaje de No se encuentra en la lista de invitados.
            $mensaje = "No se encuentra en la lista de invitados.";
        }
    }

    if(isset($_POST["btnVip"])){
        $codigo = $_REQUEST["txtVip"];
        //Si el codigo es "verde" entonces mostrará Su codigo de acceso es....
        if($codigo = "verde"){
            $mensaje = "Su código de acceso es " . rand(1000, 9999);
        } else {
        //Sino Ud. no tiene pase VIP
            $mensaje = "Ud. no tiene pase VIP";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1>Lista de invitados</h1>
            </div>
        </div>
        <?php if (isset($mensaje)){ ?>
        <div class="col-12">
            <div class="alert alert-info" role="alert">
                <?php echo $mensaje; ?>
            </div>
        </div>
        <?php }?>
        <div class="row">
            <div class="col-12 py-2">
                Complete el siguiente formulario:
            </div>
        
        <form action="" method="POST">
            <div class="row">
                <div class="col-6">
                    <div class="py-2">
                        <label for="txtDni" class="pb-3">Ingrese el DNI:</label>
                        <input type="text" name="txtDni" class="form-control">
                        <input type="submit" name="btnProcesar" value="Verificar invitado" class="btn btn-primary">
                    </div>
                    <div class="py-2">
                        <label for="txtVip" class="pb-3">Ingrese el código secreto para el pase VIP:</label>
                        <input type="text" name="txtVip"  class="form-control">
                        <input type="submit" name="btnVip" value="Verificar codigo" class="btn btn-primary">
                    </div>
                </div>
        </div>
        </form>
    </main>
</body>
</html>