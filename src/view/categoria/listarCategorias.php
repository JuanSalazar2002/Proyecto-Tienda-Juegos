<?php

require_once __DIR__ . '/../../controller/CategoriaController.php';

$categ = new CategoriaController();
$list_categ = $categ->listarCategorias();

?>

<?php include_once __DIR__ . '/../partes/cabecera.php' ?>

<div class="min-h-screen bg-gray-100 flex flex-col items-center py-12 px-4">
    <div class="bg-white shadow-lg rounded-2xl w-full max-w-5xl">
        <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
            <h2 class="text-2xl font-semibold text-[#07074D]">Lista de Categorías</h2>
            <a href="crear_categoria.php"
               class="px-5 py-2 rounded-md bg-[#6A64F1] text-white font-semibold hover:bg-[#5b57da] transition">
                + Nueva Categoría
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-[#6A64F1] text-white uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php foreach ($list_categ as $categoria) { ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                            <td class="py-3 px-6 text-left"><?php echo $categoria->getId(); ?></td>
                            <td class="py-3 px-6 text-left"><?php echo $categoria->getNombre(); ?></td>
                            <td class="py-3 px-6 text-center flex justify-center space-x-3">
                                <a href="#"
                                   class="bg-[#FACC15] hover:bg-[#EAB308] text-[#07074D] font-semibold py-1 px-4 rounded-md transition">
                                    Editar
                                </a>
                                <a href="#"
                                   class="bg-[#EF4444] hover:bg-[#DC2626] text-white font-semibold py-1 px-4 rounded-md transition"
                                   onclick="return confirm('¿Seguro que deseas eliminar esta categoría?');">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../partes/footer.php' ?>