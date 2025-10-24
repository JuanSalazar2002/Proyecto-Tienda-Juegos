<?php

require_once __DIR__ . '/../../controller/CategoriaController.php';

$categ = new CategoriaController();
$list_categ = $categ->listarCategorias();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Categorias</title>
</head>

<body>

    <?php foreach ($list_categ as $categoria) { ?>
        <tr>
            <td><?php echo $categoria->getId(); ?></td>
            <td><?php echo $categoria->getNombre(); ?></td>
        </tr>
        <br>
    <?php } ?>

</body>

</html>