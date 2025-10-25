<?php

require_once __DIR__ . '/../../controller/CategoriaController.php';

$categ = new CategoriaController();
$list_categ = $categ->listarCategorias();

if($_POST){
    $categoriaActualizado= new Categoria($_POST['idCategoria'], $_POST['nombreCategoria']);
    $categ->actualizarCategoria($categoriaActualizado);
    header('Location: listarCategorias.php');
}

if($_GET){
    $categ->eliminarCategoria($_GET['id']);
    header('Location: listarCategorias.php');
}

?>

<?php include_once __DIR__ . '/../partes/cabecera.php' ?>

<div class="min-h-screen bg-gray-100 flex flex-col items-center py-12 px-4">
    <div class="bg-white shadow-lg rounded-2xl w-full max-w-5xl">
        <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
            <h2 class="text-2xl font-semibold text-[#07074D]">Lista de Categorías</h2>
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
                                <a href=""
                                    data-id="<?php echo $categoria->getId(); ?>"
                                    class="bg-[#FACC15] hover:bg-[#EAB308] text-[#07074D] font-semibold py-1 px-4 rounded-md transition btn-edit">
                                    Editar
                                </a>
                                <a href="listarCategorias.php?id=<?php echo $categoria->getId(); ?>"
                                    class="bg-[#EF4444] hover:bg-[#DC2626] text-white font-semibold py-1 px-4 rounded-md transition">
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

<div id="modal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-11/12 max-w-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Editar Categoría</h2>
        <form id="formModal" method="post">
            <input type="hidden" name="idCategoria" id="modalId">

            <div class="mb-4">
                <label for="modalNombre" class="block text-gray-700 mb-2">Nombre</label>
                <input
                    type="text"
                    name="nombreCategoria"
                    placeholder="Escribe el nombre"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>
            <div class="flex justify-end space-x-3 mt-6">
                <button
                    type="button"
                    id="btnCancelar"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                    Cancelar
                </button>
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

<script src="../js/modalEdicion.js"></script>

<?php include_once __DIR__ . '/../partes/footer.php' ?>