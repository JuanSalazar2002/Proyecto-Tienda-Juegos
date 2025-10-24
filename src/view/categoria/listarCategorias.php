<?php

require_once __DIR__ . '/../../controller/CategoriaController.php';

$categ = new CategoriaController();
$list_categ = $categ->listarCategorias();

?>

<?php include_once __DIR__ . '/../partes/cabecera.php' ?>

<?php foreach ($list_categ as $categoria) { ?>
    <tr>
        <td><?php echo $categoria->getId(); ?></td>
        <td><?php echo $categoria->getNombre(); ?></td>
    </tr>
    <br>
<?php } ?>

<?php include_once __DIR__ . '/../partes/footer.php' ?>