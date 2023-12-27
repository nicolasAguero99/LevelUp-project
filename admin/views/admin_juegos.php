<?php

$juegos = (new Juego())->traer_catalogo_completo();

$desarrolladores = new Desarrollador();
$desarrollador = $desarrolladores->traer_desarrolladores_completo();

?>

<a style="position: fixed; bottom: 20px; right: 20px; z-index: 99;" class="btn btn-primary rounded-lg" href="?seccion=add_juego">+ Agregar</a>
<section class="container mb-5">
<h1 class="titulo">Administrar juegos</h1>

<section class="container mb-5">
  <div class="row align-items-start justify-content-center">
    <div class="row align-items-start justify-content-center">
      <?php foreach ($juegos as $juego) { ?>
        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 g-4">
          <div class="card m-auto shadow h-100" style="width: 18rem;">
            <img src="<?= file_exists("../imgs/imgs-subidas/" . $juego->getPortada()) ? "../imgs/imgs-subidas/" . $juego->getPortada() : ("../imgs/" . $juego->getPortada()) ?>" class="img-card-juegos" alt="Imagen de <?= $juego->getNombre() ?>" style="height: 300px; object-fit: cover;">
            <?php if ($juego->getTop()) { ?>
              <div class="card-img-overlay">
                <span class="badge bg-warning text-dark">Top</span>
              </div>
            <?php } ?>
            <div class="mt-3 mx-3">
              <h5 class="card-title">
                <?= substr($juego->getNombre(), 0, 22) ?>
                <?php if (strlen($juego->getNombre()) > 25) { ?><span class="fs-6">...</span>
                <?php } ?>
              </h5>
              <h6 class="card-subtitle my-2 fs-5 text-muted"><span class="moneda-simbolo">$</span>
                <?= number_format($juego->getPrecio(), 2, ",", "."); ?>
              </h6>
              <p style="height: 72px; overflow: hidden;" class="card-text text-muted">
                <?= trim(substr($juego->getDescripcion(), 0, 85)) ?><span class="fs-6">...</span>
              </p>
              <ul class="list-group list-group-flush">
                <li style="height: 40px; overflow: hidden;" class="list-group-item px-0"><span class="fw-bold">Desarrollador:</span>
                  <?php echo strlen($desarrolladores->traer_nombre_desarrollador($juego->getDesarrollador_id())) >= 15 ? trim(substr($desarrolladores->traer_nombre_desarrollador($juego->getDesarrollador_id()), 0, 15)) . "..." : $desarrolladores->traer_nombre_desarrollador($juego->getDesarrollador_id()) ?>
                </li>
                <li class="list-group-item px-0"><span class="fw-bold">Publicacion:</span>
                  <?= $juego->getPublicacion() ?>
                </li>
                <li class="list-group-item px-0"><span class="fw-bold">Género:</span>
                  <?= ucfirst($juego->getGenero()) ?>
                </li>
                <li class="list-group-item px-0"><span class="fw-bold">Plataforma:</span>
                  <?= ucfirst($juego->getCategoria()) ?>
                </li>
                <li class="list-group-item px-0">
                  <a href="?seccion=editar_juego&id=<?= $juego->getId() ?>">Editar</a>
                  <?php if (isset($_SESSION['logged']) && $_SESSION['logged']['rol'] == 'superadmin') { ?>
                    <a class="text-danger" href="?seccion=delete_juego&id=<?= $juego->getId() ?>">Eliminar</a>
                  <?php } else { ?>
                    <a style="opacity: .5; text-decoration: line-through;" class="text-danger disabled" disabled>Eliminar</a>
                    <span class="d-block text-muted">Solo los "superadmin" pueden eliminar juegos</span>
                  <?php } ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>