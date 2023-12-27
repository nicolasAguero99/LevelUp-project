<?php
$carrito_productos = (new Carrito())->get_productos();

if (empty($_SESSION["carrito"])) {
  header("Location: index.php?seccion=carrito");
}
?>

<section class="container">
  <div class="row my-5 mx-1">
    <div class="col m-auto">

      <h1 class="text-center mb-3 fw-bold">Estas a un paso</h1>

      <h2 class="text-center mb-3">Resumen</h2>
      <form action="admin/actions/comprar_carrito_acc.php" method="POST">
        <?php foreach ($carrito_productos as $producto) { ?>
          <ul class="list-group">
            <li class="border-bottom d-flex justify-content-between align-items-center py-2">
              <div class="ms-2 me-auto">
                <div class="fw-bold"><?= $producto["nombre"] ?></div>
                $ <?= $producto["precio"] ?>
              </div>
              <span class="badge bg-primary rounded-pill"><?= $producto["cantidad"] ?></span>
            </li>
          <?php } ?>
          <ul class="list-group">
            <li class="bg-dark list-group-item d-flex justify-content-between align-items-center">
              <span class="badge bg-primary rounded-pill"></span>
              <div class="ms-2 me-auto">
                <div class="text-light">Cant:
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
                <div class="text-light">Total: $
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
          <div class="d-flex gap-4 mt-4">
            <a onclick="javascript:history.go(-1)" class="btn btn-danger w-50 m-auto">Volver</a>
            <button type="submit" class="btn btn-primary w-50 m-auto">¡Comprar!</button>
          </div>
          </ul>
      </form>
</section>