<?php

require_once "func/autoload.php";

$desarrolladores = new Desarrollador();
$desarrollador = $desarrolladores->traer_desarrolladores_completo();

$juegoSeleccionado = isset($_GET["id"]) ? $_GET["id"] : false;
$catalogo = new Juego();
$juego = $catalogo->traer_juego_por_id($juegoSeleccionado);
?>

<div class="row justify-content-center align-items-start my-4">
  <div class="col-12" style="max-width: 34rem;">
    <img src="imgs/<?= $juego->getPortada() ?>" class="img-fluid rounded-3" alt="<?= $juego->getNombre() ?>">

    <div class="mt-3 mx-3">
      <?php if ($juego->getTop()) { ?>
        <span class="badge bg-warning text-dark mb-2">Top</span>
      <?php } ?>
      <h3>
        <?= $juego->getNombre() ?>
      </h3>
      <h4 class="my-2 fs-4 text-muted"><span class="moneda-simbolo">$</span>
        <?= $juego->getPrecio() ?>
      </h4>
      <p class="card-text text-muted">
        <?= $juego->getDescripcion() ?>.
      </p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item px-0"><span class="fw-bold">Desarrollador:</span>
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
      </ul>
      <form action="admin/actions/add_carrito_acc.php?id=<?= $juego->getId() ?>" method="POST" class="d-flex align-items-center gap-2 my-2">
        <input style="height: 40px;" class="ps-2" type="number" name="cant" value="1" min="1" max="10" oninput="`${event.target.value > 10 && (event.target.value = 10)}`">
        <button type="submit" id="<?= $juego->getId() ?>" class="btn btn-principal">Comprar</button>
      </form>
    </div>
  </div>
</div>