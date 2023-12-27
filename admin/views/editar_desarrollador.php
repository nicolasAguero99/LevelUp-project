<?php
$desarrolladorId = $_GET['id'] ?? FALSE;
$desarrollador = (new Desarrollador())->traer_nombre_desarrollador($desarrolladorId);
?>

<div class="row my-5 mx-1">
  <div class="col m-auto">
    <h1 class="text-center mb-5 fw-bold">Editar un desarrollador</h1>
    <div class="m-auto col-10 col-md-8 col-lg-6 col-xl-4">
      <h2>Nombre actual: <?= $desarrollador ?></h2>
      <form action="actions/editar_desarrollador_acc.php?id=<?= $desarrolladorId ?>" method="POST">
        <div class="mb-3">
          <input required autocomplete="off" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre nuevo para el desarrollador">
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn text-light w-100" style="background-color: #028171;">Modificar</button>
        </div>
      </form>
    </div>
  </div>
</div>