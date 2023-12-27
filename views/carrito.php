<?php

if (!isset($_SESSION["logged"])) {
  header("Location: ./index.php?seccion=login");
}

$carrito_productos = (new Carrito())->get_productos();

if (isset($_GET['comprado'])) { ?>
  <div style="background-color: black; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; opacity: .5; z-index: 99;"></div>
  <div id='modal-compra' class="card text-center w-75 py-4">
    <div class="card-body">
      <h2 class="fw-bold">¡Compra realizada!</h2>
      <span class="fs-5 fw-bolder">¡Hola <?= $_SESSION["logged"]['nombre_usuario'] ?>!</span>
      <p class="card-text text-muted">Muchas gracias por tu compra. Esperamos que lo disfrutes.</p>
      <p class="card-text text-muted">Te enviaremos toda la información pertinente a <strong><?= $_SESSION['logged']['email'] ?></strong>.</p>
      <a href="index.php" class="btn btn-principal rounded">Ir al inicio</a>
    </div>
  </div>
<?php } ?>

<section class="container">
  <div class="row my-5 mx-1">
    <div class="col m-auto">
      <?php if (empty($_SESSION["carrito"])) { ?>
        <div class="row my-5 mx-1">
          <div class="col m-auto">
            <div class="m-auto col-10 col-md-8 col-lg-6 col-xl-4 text-center">
              <h2 class="fs-4">No tienes ningún juego en el carrito</h2>
              <h3 class="text-muted fs-6">¿Deseas agregar algún juego? <span>Haz click <a href="index.php?seccion=catalogo&categoria=todos">aquí</a></span></h3>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <h1 class="text-center mb-3 fw-bold">Juegos seleccionados</h1>
        <h2 class="text-center text-muted mb-5 fs-5">Estos son los juegos que has añadido al carrito</h2>

        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="badge bg-primary rounded-pill"></span>
            <div class="ms-2 me-auto">
              <div class="fw-bold">Cant:
                <?php
                $cant = 0;
                foreach ($carrito_productos as $producto) {
                  $cant += intval($producto["cantidad"]);
                }
                echo $cant;
                ?>
              </div>
            </div>
            <div class="d-flex flex-row align-items-center gap-4">
              <div class="fw-bold">Total: $
                <?php
                $total = 0;
                foreach ($carrito_productos as $producto) {
                  $total += intval($producto["precio"]);
                }
                echo $total;
                ?>
              </div>
          </li>
        </ul>
        <?php foreach ($carrito_productos as $producto) { ?>
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="badge bg-primary rounded-pill"><?= $producto["cantidad"] ?></span>
              <div class="ms-2 me-auto">
                <div class="fw-bold"><?= $producto["nombre"] ?></div>
                $ <?= $producto["precio"] ?>
              </div>
              <div class="d-flex flex-row align-items-center gap-4">
                <form action="admin/actions/delete_carrito_acc.php?id=<?= $producto["id"] ?>" method="POST">
                  <button class="btn btn-danger">Quitar</button>
                </form>
              </div>
            </li>
          <?php } ?>
          <a href="index.php?seccion=resumen" class="btn btn-primary w-50 m-auto mt-4">Ir Comprar</a>
          </ul>
          <a style="position: fixed; bottom: 20px; right: 20px; z-index: 99;" class="btn btn-primary rounded-lg" href="?seccion=catalogo&categoria=todos">+ Agregar</a>
        <?php } ?>
</section>