<?php

if (!isset($_SESSION["logged"])) {
  header("Location: ./index.php?seccion=login");
}

require_once './classes/Usuario.php';

$compras_realizadas = (new Juego_Usuario())->traer_juegos_x_usuario();
$juegos = (new Juego())->traer_catalogo_completo();

$hayJuegos = false;

foreach ($compras_realizadas as $dato) {
  if ($dato->getUsuarioId() == $_SESSION["logged"]["id"]) {
    $hayJuegos = true;
  }
}

?>

<section class="container">
  <div class="row my-5 mx-1">
    <div class="col m-auto">
      <?php if (!$hayJuegos) { ?>
        <div class="row my-5 mx-1">
          <div class="col m-auto">
            <div class="m-auto col-10 col-md-8 col-lg-6 col-xl-4 text-center">
              <h2 class="fs-4">Aún no has comprado ningún juego</h2>
              <h3 class="text-muted fs-6">¿Deseas comprar algún juego? <span>Haz click <a href="index.php?seccion=catalogo&categoria=todos">aquí</a></span></h3>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <h1 class="text-center mb-3 fw-bold">Juegos comprados</h1>
        <h2 class="text-center text-muted mb-5 fs-5">Estos son los juegos que has comprado</h2>
        <ul class="list-group">
          <?php foreach ($compras_realizadas as $dato) { 
            if ($dato->getUsuarioId() == $_SESSION["logged"]["id"]) {
          ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div class="ms-2 me-auto">
                <div class="fw-bold">
                  <?php echo $dato->nombre; ?>
                </div>
              </div>
              <div class="d-flex gap-4">
                <span class="text-muted fw-bold">
                  $
                  <?php echo ($dato->precio * $dato->getCantidad()); ?>
                </span>
                <span class="badge bg-primary rounded-pill">
                  x
                  <?php echo $dato->getCantidad(); ?>
                </span>
                <span class="text-muted">
                  <?php echo strval($dato->getFechaCompra()); ?>
                </span>
              </div>
            </li>
          <?php }}?>
        </ul>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="badge bg-primary rounded-pill"></span>
            <div class="ms-2 me-auto">
              <div class="fw-bold text-muted">Total: $
                <?php 
                  $total = 0;
                  foreach ($compras_realizadas as $dato) {
                    if ($dato->getUsuarioId() == $_SESSION["logged"]["id"]) {
                      $total += $dato->precio * $dato->getCantidad();
                    }
                  } 
                  echo $total;
                ?>
              </div>
            </div>
          </li>
        </ul>
        <a style="position: fixed; bottom: 20px; right: 20px; z-index: 99;" class="btn btn-primary rounded-lg" href="?seccion=catalogo&categoria=todos">+ Agregar</a>
      <?php } ?>
</section>