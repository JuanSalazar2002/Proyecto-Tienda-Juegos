<?php

session_start();
require_once __DIR__ . '/../../controller/JuegosController.php';

if($_POST){
    $juegos= new JuegosController();
    $idJuego= $juegos->crearJuego(
        $_POST['nombreJuego'], 
        $_POST['costo'], 
        $_POST['creador']
    );

    if($idJuego){
        $_SESSION['id_juego']= $idJuego;
        header('Location: /Proyecto-Juegos/src/view/categoria/listarCategoriasJuego.php');
        exit();
    }
}

?>

<?php require_once __DIR__ . '/../partes/cabecera.php'; ?>

<form action="" method="post">
  <div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px] bg-white">
      <div class="mb-5">
        <label for="nombreJuego" class="mb-3 block text-base font-medium text-[#07074D]">
          Nombre del juego
        </label>
        <input type="text" name="nombreJuego" id="nombreJuego" placeholder="Ej. Minecraft"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 
                 text-base font-medium text-[#6B7280] outline-none 
                 focus:border-[#6A64F1] focus:shadow-md" required />
      </div>

      <div class="mb-5">
        <label for="costo" class="mb-3 block text-base font-medium text-[#07074D]">
          Costo (USD)
        </label>
        <input type="number" name="costo" id="costo" placeholder="Ej. 19.99" step="0.01"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 
                 text-base font-medium text-[#6B7280] outline-none 
                 focus:border-[#6A64F1] focus:shadow-md" required />
      </div>

      <div class="mb-5">
        <label for="creador" class="mb-3 block text-base font-medium text-[#07074D]">
          Creador
        </label>
        <input type="text" name="creador" id="creador" placeholder="Ej. Mojang Studios"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 
                 text-base font-medium text-[#6B7280] outline-none 
                 focus:border-[#6A64F1] focus:shadow-md" required />
      </div>

      <div>
        <button
          class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 
                 text-center text-base font-semibold text-white outline-none 
                 transition-all duration-200 hover:bg-[#5b58e5]"
          type="submit">
          Registrar Juego
        </button>
      </div>
    </div>
  </div>
</form>


<?php require_once __DIR__ . '/../partes/footer.php'; ?>