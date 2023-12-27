<?php
$juegoId = $_GET['id'] ?? FALSE;
$juego = (new Juego())->traer_juego_por_id($juegoId);

$desarrolladorId = $_GET['id'] ?? FALSE;
$desarrollador = (new Desarrollador())->traer_nombre_desarrollador($desarrolladorId);
?>

<div class="row my-5 mx-1">
  <div class="col m-auto">
    <h1 class="text-center mb-5 fw-bold">Editar un juego</h1>
    <div class="m-auto col-10 col-md-8 col-lg-6 col-xl-4">
      <form action="actions/editar_juego_acc.php?id=<?= $juego->getId() ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input required name="nombre" autocomplete="off" type="text" class="form-control" value="<?= $juego->getNombre() ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Precio</label>
          <input required name="precio" autocomplete="off" type="number" class="form-control" value="<?= $juego->getPrecio() ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea required name="descripcion" class="form-control"><?= $juego->getDescripcion() ?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Desarrollador</label>
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
          <input required name="publicacion" autocomplete="off" type="number" class="form-control" max="2023" value="<?= $juego->getPublicacion() ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Género</label>
          <select name="genero" class="form-select">
            <?php
            $juegos = (new Juego())->traer_generos();
            foreach ($juegos as $juegoGenero) { ?>
              <option value="<?= $juegoGenero->getGenero() ?>"><?= $juegoGenero->getGenero() ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Portada actual:</label>
          <div class="d-flex align-items-center gap-4 flex-wrap">
            <?php if (file_exists('../imgs/' . $juego->getPortada())) { ?>
              <img src="../imgs/<?= $juego->getPortada() ?>" class="my-2" alt="imagen cargada" style="width: 150px; object-fit: cover;">
            <?php } else { ?>
              <img src="../imgs/imgs-subidas/<?= $juego->getPortada() ?>" class="my-2" alt="imagen cargada" style="width: 150px; object-fit: cover;">
            <?php } ?>
            <input name="portada" autocomplete="off" type="file" accept="image/*" class="form-control" value="<?= $juego->getPortada() ?>">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Categoría</label>
          <select name="categoria" class="form-select">
            <?php
            $juegos = (new Juego())->traer_categorias();
            foreach ($juegos as $juego) { ?>
              <option value="<?= $juego->getCategoria() ?>"><?= $juego->getCategoria() ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Top</label>
          <select name="top_juego" class="d-block form-select">
            <option value="0">Sí</option>
            <option value="1">No</option>
          </select>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success text-light w-100">Modificar</button>
        </div>
      </form>
    </div>
  </div>
</div>