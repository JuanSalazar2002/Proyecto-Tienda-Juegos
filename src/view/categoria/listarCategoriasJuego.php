<?php

session_start();

require_once __DIR__ . '/../../controller/CategoriaController.php';
require_once __DIR__ . '/../../controller/Juegos_categoriaController.php';

$listaCategoria = new CategoriaController();
$categoria = $listaCategoria->listarCategorias();

if($_POST){
    $id_juego= $_SESSION['id_juego'];
    $juegoCategoria= new Juegos_categoriaController();
    $inserccion= $juegoCategoria->agregarCategoria($id_juego, $_POST['categorias']);

    if($inserccion){
        header('Location: /Proyecto-Juegos/src/view/juegos/agregarImagenes.php');
        exit();
    }
}

?>

<?php require_once __DIR__ . '/../partes/cabecera.php'; ?>

<div class="flex items-center justify-center p-8 bg-gray-50 min-h-screen">
    <div class="mx-auto w-full max-w-[600px] bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-[#07074D] mb-6 text-center">
            Categorías de Juegos
        </h2>

        <form action="" method="post">
            <ul class="divide-y divide-gray-200">
                <?php foreach ($categoria as $cat) { ?>
                    <li class="flex items-center justify-between py-3 px-2 hover:bg-gray-50 transition-colors duration-150">
                        <div class="flex items-center space-x-3">
                            <input
                                type="checkbox"
                                id="cat-<?= $cat->getId(); ?>"
                                name="categorias[]"
                                value="<?= $cat->getId(); ?>"
                                class="h-5 w-5 accent-[#6A64F1] cursor-pointer">
                            <label for="cat-<?= $cat->getId(); ?>" class="text-base text-[#07074D] cursor-pointer">
                                <?php echo $cat->getNombre(); ?>
                            </label>
                        </div>
                    </li>
                <?php } ?>
            </ul>

            <div class="mt-6">
                <button
                    type="submit"
                    class="w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white hover:bg-[#5b58e5] transition-all duration-200">
                    Continuar con Imágenes
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../partes/footer.php'; ?>