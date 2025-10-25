<?php

if ($_POST['nombreCategoria']) {
    require_once __DIR__ . '/../../controller/CategoriaController.php';
    $categoriaController = new CategoriaController();

    $respuesta = $categoriaController->crearCategoria($_POST['nombreCategoria']);
}

?>

<?php include_once __DIR__ . '/../partes/cabecera.php' ?>

<form action="" method="post">
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px] bg-white">
            <div class="mb-5">
                <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                    Nombre de la categoria
                </label>
                <input type="text" name="nombreCategoria" placeholder="Nombre"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div>
                <button
                    class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none" type="submit">
                    Registrar Categoria
                </button>
            </div>
        </div>
    </div>
</form>

<?php include_once __DIR__ . '/../partes/footer.php' ?>