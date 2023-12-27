<?php
$desarrolladores = (new Desarrollador())->traer_desarrolladores_completo();
$desarrolladores_juegos = (new Desarr_Juego())->traer_x_join();
$juegos = (new Juego())->traer_catalogo_completo();
?>


<h1 class="titulo">Administrar desarrolladores</h1>

<a style="position: fixed; bottom: 20px; right: 20px;" class="btn btn-primary rounded-lg" href="?seccion=add_desarrollador">+ Agregar</a>

<?php foreach ($desarrolladores as $desarrollador) { ?>
  <div class="row">
    <div class="col-sm-6 m-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= $desarrollador->getNombre() ?></h5>
          <span class="card-text d-block">Id: <b style="font-weight: bold;"><?= $desarrollador->getId() ?></b></span>
          <span class="card-text d-block">Juegos:
            <?php foreach ($desarrolladores_juegos as $desarrollador_juego) { ?>
              <?php if ($desarrollador_juego->getId() == $desarrollador->getId()) { ?>
                <b style="font-weight: bold;"><?= $desarrollador_juego->nombre ?></b>.
              <?php } ?>
            <?php } ?>
          </span>
          <a href="?seccion=editar_desarrollador&id=<?= $desarrollador->getId() ?>">Editar</a>
          <?php if (isset($_SESSION['logged']) && $_SESSION['logged']['rol'] == 'superadmin') { ?>
            <a class="text-danger" href="?seccion=delete_desarrollador&id=<?= $desarrollador->getId() ?>">Eliminar</a>
          <?php } else { ?>
            <a style="opacity: .5; text-decoration: line-through;" class="text-danger disabled" disabled>Eliminar</a>
            <span class="d-block text-muted">Solo los "superadmin" pueden eliminar desarrolladores</span>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>