<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario datos personales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="resultado.php" method="POST">
                    <div class="py-3">
                        <label for="txtNombre">Nombre:* </label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="py-2">
                        <label for="txtDni">DNI:* </label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="py-2">
                        <label for="txtTelefono">Teléfono:* </label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="py-2">
                        <label for="txtEdad">Edad:* </label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="py-2">
                        <button type="submit" class="btn btn-primary float-end">ENVIAR</button>
                    </div>
                   
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>