<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) { //quiere decir -> si es postback 

    $usuario = $_REQUEST["txtUsuario"];
    $clave = $_REQUEST["txtClave"];

    //Si usuario es distinto de vacio y clave es distinto de vacio. entonces:
    if ($usuario != "" && $clave != "") {
        header("Location: acceso-confirmado.php");
    } else {
        $mensaje = "Válido para usuarios registrados."; //crea la variable "$mensaje"
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

    <body class="container">
    
        <div class="row">
            <div class="col-12 py-3">
                <h1>Formulario</h1>
            </div>
            
            
        </div>
        <div class="row">
            <div class="col-12">
                <?php if (isset($mensaje)){ //esto quiere decir -> esta seteado "$mensaje"?. ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; //si esta seteado, entonces imprime $mensaje. ?>
                    </div>
                    <?php } ?>
                <form action="" method="POST">
                    <div class="my-3">
                        <label for="txtUsuario">Usuario: <input type="text" id="txtUsuario" name="txtUsuario" class="form-control"> </label>
                    </div>
                    <div class="my-3">
                        <label for="txtClave">Clave: <input type="password" id="txtClave" name="txtClave" class="form-control"></label>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    
    </body>

</html>