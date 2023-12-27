<?php
$juegoId = $_GET['id'] ?? FALSE;
$juego = (new Juego())->traer_juego_por_id($juegoId);

$desarrolladorId = $_GET['id'] ?? FALSE;
$desarrollador = (new Desarrollador())->traer_nombre_desarrollador($desarrolladorId);
?>

<div class="row my-5 mx-1">
  <div class="col m-auto">
    <h1 class="text-center mb-5 fw-bold">Agregar un juego</h1>
    <div class="m-auto col-10 col-md-8 col-lg-6 col-xl-4">
      <form action="actions/add_juego_acc.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input required name="nombre" autocomplete="off" type="text" class="form-control" placeholder="Nombre del juego">
        </div>
        <div class="mb-3">
          <label class="form-label">Precio</label>
          <input required name="precio" autocomplete="off" type="number" class="form-control" placeholder="Precio del juego">
        </div>
        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea required name="descripcion" class="form-control" placeholder="Descripción del juego"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Desarrollador id</label>
          <select name="desarrollador_id" class="form-select">
            <?php
            $desarrolladores = (new Desarrollador())->traer_desarrolladores_completo();
            foreach ($desarrolladores as $desarrollador) { ?>
              <option value="<?= $desarrollador->getId() ?>"><?= $desarrollador->getNombre() ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Publicación</label>
          <input required name="publicacion" autocomplete="off" type="number" max="2023" class="form-control" placeholder="Fecha de publicación del juego">
        </div>
        <div class="mb-3">
          <label class="form-label">Género</label>
          <select name="genero" class="form-select">
            <?php
            $juegos = (new Juego())->traer_generos();
            foreach ($juegos as $juego) { ?>
              <option value="<?= $juego->getGenero() ?>"><?= $juego->getGenero() ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Portada</label>
          <input required name="portada" autocomplete="off" type="file" accept="image/*" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Categoría (plataforma)</label>
          <select name="categoria" class="form-select">
            <?php
            $juegos = (new Juego())->traer_categorias();
            foreach ($juegos as $juego) { ?>
              <option value="<?= $juego->getCategoria() ?>"><?= $juego->getCategoria() ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Top (juegos más solicitados)</label>
          <select name="top_juego" class="d-block form-select">
            <option value="0">Sí</option>
            <option value="1">No</option>
          </select>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn text-light w-100" style="background-color: #028171;">Agregar</button>
        </div>
      </form>
    </div>
  </div>
</div>