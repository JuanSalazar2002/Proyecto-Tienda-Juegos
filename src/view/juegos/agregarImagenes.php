<?php

session_start();

require_once __DIR__ . '/../../controller/ImagenesController.php';

if(isset($_FILES['imagenes'])){
    $id_juego= $_SESSION['id_juego'];
    foreach($_FILES['imagenes']['tmp_name'] as $index=>$tmpName){
        // aca solo queremos hacer eso del $index no del $tmpName
        $nombreArchivo= $_FILES['imagenes']['name'][$index];
        $errorArchivo= $_FILES['imagenes']['error'][$index];

        if($errorArchivo != 0){
            continue;
        }

        
    }
}
?>

<?php require_once __DIR__ . '/../partes/cabecera.php'; ?>

<form action="subir_imagenes.php" method="post" enctype="multipart/form-data">
    <div class="flex items-center justify-center p-12 bg-gray-50 min-h-screen">
        <div class="mx-auto w-full max-w-[600px] bg-white p-8 rounded-2xl shadow-md">
            <h2 class="text-2xl font-semibold text-[#07074D] mb-6 text-center">
                Subir Imágenes del Juego
            </h2>

            <!-- Contenedor dinámico -->
            <div id="contenedor-imagenes" class="space-y-4 mb-6">
                <div class="flex items-center space-x-3">
                    <input
                        type="file"
                        name="imagenes[]"
                        accept="image/*"
                        class="block w-full text-sm text-gray-600 border border-gray-300 
                   rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 
                   focus:ring-[#6A64F1]">
                    <button
                        type="button"
                        class="remove-btn hidden text-red-500 hover:text-red-600 font-semibold text-sm">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <button
                    type="button"
                    id="agregar"
                    class="rounded-md bg-[#6A64F1] py-2 px-4 text-white font-semibold 
                 hover:bg-[#5b58e5] transition-all duration-200">
                    + Agregar otra imagen
                </button>

                <button
                    type="submit"
                    class="rounded-md bg-green-600 py-2 px-6 text-white font-semibold 
                 hover:bg-green-700 transition-all duration-200">
                    Subir Imágenes
                </button>
            </div>
        </div>
    </div>
</form>

<?php require_once __DIR__ . '/../partes/footer.php'; ?>

<script>
    const contenedor = document.getElementById('contenedor-imagenes');
    const botonAgregar = document.getElementById('agregar');

    botonAgregar.addEventListener('click', () => {
        const nuevoCampo = document.createElement('div');
        nuevoCampo.classList.add('flex', 'items-center', 'space-x-3');

        nuevoCampo.innerHTML = `
      <input type="file" name="imagenes[]" accept="image/*"
        class="block w-full text-sm text-gray-600 border border-gray-300 
               rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 
               focus:ring-[#6A64F1]">
      <button type="button" class="remove-btn text-red-500 hover:text-red-600 font-semibold text-sm">
        ✕
      </button>
    `;

        contenedor.appendChild(nuevoCampo);

        // evento para eliminar campo
        nuevoCampo.querySelector('.remove-btn').addEventListener('click', () => {
            nuevoCampo.remove();
        });
    });
</script>