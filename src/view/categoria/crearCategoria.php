<?php

if($_POST['nombreCategoria']){
    require_once __DIR__.'/../../controller/CategoriaController.php';
    $categoriaController= new CategoriaController();

    $respuesta= $categoriaController->crearCategoria($_POST['nombreCategoria']);

    if($respuesta){
        echo "Se logro insertar la categoria";
    }else{
        echo "No se ha logrado enviar la informacion";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creando Categoria</title>
</head>
<body>
    <form action="" method="post">
        Nombre:
        <br>
        <input type="text" name="nombreCategoria" placeholder="Ingrese aqui el nombre de la categoria" required>
        <br>
        <input type="submit" value="Registrar Categoria">
    </form>
</body>
</html>