<div class="col-12 col-md-6 col-lg-4 col-xxl-3 g-4">
  <div class="card m-auto shadow" style="width: 18rem;">
    <img src="imgs/<?= $juego->getPortada() ?>" class="img-card-juegos" alt="Imagen de <?= $juego->getNombre() ?>">
    <?php if ($juego->getTop()) { ?>
      <div class="card-img-overlay">
        <span class="badge bg-warning text-dark">Top</span>
      </div>
    <?php } ?>
    <div class="card-body">
      <h5 class="card-title">
        <?= substr($juego->getNombre(), 0, 22) ?>
        <?php if (strlen($juego->getNombre()) > 25) { ?><span class="fs-6">...</span>
        <?php } ?>
      </h5>
      <h6 class="card-subtitle my-2 fs-5 text-muted"><span class="moneda-simbolo">$</span>
        <?= number_format($juego->getPrecio(), 2, ",", "."); ?>
      </h6>
      <hr class="dropdown-divider">
      <p class="card-text text-muted" style="height: 72px; overflow: hidden;">
        <?= trim(substr($juego->getDescripcion(), 0, 82)) ?><span class="fs-6">...</span>
      </p>
    </div>
    <ul class="list-group list-group-flush">

      <li style="height: 40px; overflow: hidden;" class="list-group-item"><span class="fw-bold">Desarrollador:</span>
        <?php echo strlen($desarrolladores->traer_nombre_desarrollador($juego->getDesarrollador_id())) >= 15 ? trim(substr($desarrolladores->traer_nombre_desarrollador($juego->getDesarrollador_id()), 0, 15)) . "..." : $desarrolladores->traer_nombre_desarrollador($juego->getDesarrollador_id()) ?>
      </li>
      <li class="list-group-item"><span class="fw-bold">Publicacion:</span>
        <?= $juego->getPublicacion() ?>
      </li>
      <li class="list-group-item"><span class="fw-bold">Género:</span>
        <?= ucfirst($juego->getGenero()) ?>
      </li>
      <li class="list-group-item">
        <span class="<?= $juego->getCategoria() ?>">
          <?= ucfirst($juego->getCategoria()) ?>
        </span>
      </li>
    </ul>
    <a href="index.php?id=<?= $juego->getId() ?>" class="btn btn-principal" style="z-index: 9999 !important;">Ver</a>
  </div>
</div>