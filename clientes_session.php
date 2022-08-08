<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

$aClientes = array();

session_start();

if(isset($_SESSION["listadoClientes"])){

    $aClientes = $_SESSION["listadoClientes"];
} else {
    $aClientes = array();
}

if($_POST){    //"Si es postback"  ("post" quiere decir despues que hacemos click en Enviar)
    
    if(isset($_POST["btnEnviar"])){ //Si esta seteado "btnEnviar" entonces:
    //Asignamos en variables los datos que vienen del formulario
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];
    
    //Lo siguiente es para la tabla derecha donde se agregan los clientes que agreguemos
    $aClientes[] = array("nombre" => $nombre,
                         "dni" => $dni,
                         "telefono" => $telefono,
                         "edad" => $edad,  
    
    );

    $_SESSION["listadoClientes"] = $aClientes;
}

if(isset($_POST["btnEliminar"])){ //Si esta seteado "btnEliminar" entonces:
    session_destroy(); //elimina todas las filas
    $aClientes = array(); //indica que el array es vacio (sino habria que apretar 2 veces para que borre las filas)
}

}

//Lo siguiente es para eliminar una variable sola (un cliente solo)
if(isset($_GET["pos"])){ //Si esta seteado $_GET["pos"], entonces :
    $pos = $_GET["pos"]; //declaro una variable "$pos"
    unset($aClientes[$pos]); //elimino la posicion del array indicada
    $_SESSION["listadoClientes"] = $aClientes;  //Actualizo la variable de SESSION con el array actualizado  
    header("Location: clientes_session.php"); //Redirecciona a "clientes_session.php"
}   
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center p-5">
                <h1>Tabla de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3 offset-1">
                <form action="" method="POST">
                    <div class="pb-2">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Ingrese nombre y apellido">
                    </div>
                    <div class="pb-2">
                        <label for="txtDni">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" placeholder="11111111">
                    </div>
                    <div class="pb-2">
                        <label for="txtTelefono">Teléfono:</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control" placeholder="1111111111">
                    </div>
                    <div class="pb-2">
                        <label for="txtEdad">Edad:</label>
                        <input type="text" name="txtEdad" id="txtEdad" class="form-control" placeholder="99">
                    </div>
                    <div class="pb-2">
                        <button type="submit" name="btnEnviar" class="btn bg-primary text-white">Enviar</button> 
                        <button type="submit" name="btnEliminar" class="btn bg-danger text-white">Eliminar</button>
                    </div>
                </form>
            </div>
            <div class="col-5 offset-2">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Teléfono:</th>
                            <th>Edad:</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach ($aClientes as $pos => $cliente){ //utilizamos esta forma para mostrar la clave (sub 0 , sub 1, sub 2, etc..) ?>
                    <tbody>
                        <tr>
                            <td><?php echo $cliente["nombre"];?> </td>
                            <td><?php echo $cliente["dni"];?> </td>
                            <td><?php echo $cliente["telefono"];?> </td>
                            <td><?php echo $cliente["edad"];?> </td>
                            <td><a href="clientes_session.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash3-fill"></i></a></td>
                        </tr>
                    </tbody>  <?php } ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>