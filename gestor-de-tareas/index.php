<?php

ini_set('display_errors', 1);
ini_set('dislpay_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("archivo.txt")){   //si el archivo "archivo.txt" existe, cargo las tareas en la variable $aTareas
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);

} else { //si no existe, entonces $aTareas es un array vacio.
    $aTareas = array(); 
}

if(isset($_GET["pos"]) && $_GET["pos"] >= 0){
    $pos = $_GET["pos"];
} else {
    $pos = "";
}

if($_POST){
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $titulo = trim($_POST["txtTitulo"]);
    $descripcion = trim($_POST["txtDescripcion"]);

    if($pos >= 0){
        //Estoy editando una tarea
        $aTareas[$pos] = array(
            "fecha"=> $aTareas[$pos]["fecha"],
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
        );

    } else {
        //Estoy insertando una tarea
        $aTareas[] = array(
            "fecha" => date("d/m/Y"),
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
        );
    }

    //Convertir el array de aTareas en json
    $strJson = json_encode($aTareas);

    //Almacenar en un archivo.txt el json con file_put_contents
    file_put_contents("archivo.txt", $strJson);

}  
if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    unset($aTareas[$pos]);

    //Convertimos aTareas en json
    $strJson = json_encode($aTareas);
    //Almacenar el json en el archivo
    file_put_contents("archivo.txt", $strJson);
    
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3 text-center">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
            <section id="formulario">
                <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row pb-3">
                            <div class="col-4">
                                <label for="lstPrioridad">Prioridad</label>
                                    <select name="lstPrioridad" id="lstPrioridad" class="form-control" required>
                                        <option value="" disabled selected>Seleccionar</option>
                                        <option value="Alta" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["prioridad"] == "Alta"? "selected" : ""; ?>>Alta</option>
                                        <option value="Media"<?php echo isset($aTareas[$pos]) && $aTareas[$pos]["prioridad"] == "Media"? "selected" : ""; ?>>Media</option>
                                        <option value="Baja"<?php echo isset($aTareas[$pos]) && $aTareas[$pos]["prioridad"] == "Baja"? "selected" : ""; ?>>Baja</option>
                                    </select>
                            </div>
                            <div class="col-4">
                                <label for="lstUsuario">Usuario</label>
                                    <select name="lstUsuario" id="lstUsuario" class="form-control" required>
                                        <option value="" disabled selected>Seleccionar</option>
                                        <option value="Ana"<?php echo isset($aTareas[$pos]) && $aTareas[$pos]["usuario"] == "ana"? "selected" : ""; ?>>Ana</option>
                                        <option value="Bernabe"<?php echo isset($aTareas[$pos]) && $aTareas[$pos]["usuario"] == "Bernabé"? "selected" : ""; ?>>Bernabé</option>
                                        <option value="Daniela"<?php echo isset($aTareas[$pos]) && $aTareas[$pos]["usuario"] == "Daniela"? "selected" : ""; ?>>Daniela</option>
                                    </select>
                            </div>
                            <div class="col-4">
                                <label for="lstEstado">Estado</label>
                                    <select name="lstEstado" id="lstEstado" class="form-control" required>
                                        <option value="" disabled selected>Seleccionar</option>
                                        <option value="sin-asignar"<?php echo isset($aTareas[$pos]) && $aTareas[$pos]["estado"] == "Sin asignar"? "selected" : ""; ?>>Sin asignar</option>
                                        <option value="asignado"<?php echo isset($aTareas[$pos]) && $aTareas[$pos]["estado"] == "Asignado"? "selected" : ""; ?>>Asignado</option>
                                        <option value="en-proceso"<?php echo isset($aTareas[$pos]) && $aTareas[$pos]["estado"] == "En proceso"? "selected" : ""; ?>>En proceso</option>
                                        <option value="terminado"<?php echo isset($aTareas[$pos]) && $aTareas[$pos]["estado"] == "Terminado"? "selected" : ""; ?>>Terminado</option>
                                    </select>
                            </div>
                        
                        </div>
                        <div class="row pb-3">
                            <div class="col-12">
                                <label for="txtTitulo">Titulo</label>
                                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" required value="<?php echo isset($aTareas[$pos])? $aTareas[$pos]["titulo"] : "";?>">
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col-12">
                                <label for="txtDescripcion">Descripción</label>
                                <textarea name="txtDescripcion" class="form-control" id="txtDescripcion" cols="30" rows="3" required value="<?php echo isset($aTareas[$pos])? $aTareas[$pos]["descripcion"] : "";?>"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary">ENVIAR</button>
                                <a href="index.php" class="btn btn-secondary">CANCELAR</a>
                            </div>
                        </div>
                </form>
            </section>
            
            <section id="tabla">
                <?php if(count($aTareas)){ //si $aTareas es mayor que 0 entonces hacemos lo siguiente?>
                <div class="row">
                    <div class="col-12 py-5">
                        <table class="table table-hover border">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha de inserción</th>
                                    <th>Título</th>
                                    <th>Prioridad</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($aTareas as $pos => $tarea){ ?>
                                <tr>
                                    <td><?php echo $pos ?></td>
                                    <td><?php echo $tarea["fecha"]; ?></td>
                                    <td><?php echo $tarea["titulo"]; ?></td>
                                    <td><?php echo $tarea["prioridad"]; ?></td>
                                    <td><?php echo $tarea["usuario"]; ?></td>
                                    <td><?php echo $tarea["estado"]; ?></td>
                                    <td>
                                        <a href="?id=<?php echo $pos; ?>&do=editar" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
                                        <a href="?id=<?php echo $pos; ?>&do=eliminar" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
               <?php } else {  //Sino, quiere decir que no hay nada, entonces creamos la siguiente alerta ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info" role="alert">
                            Aún no se han cargado tareas.
                        </div>
                    </div>
                </div>
                <?php } ?>                    
            </section>
    </main>
</body>
</html>