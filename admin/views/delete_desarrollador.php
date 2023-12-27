<?php
  $desarrolladorSeleccionado = $_GET["id"];
  $desarrolladores = (new Desarrollador())->traer_nombre_desarrollador($desarrolladorSeleccionado);
?>

<div class="row my-5 mx-1">
  <div class="col m-auto">
    <h1 class="text-center mb-5 fw-bold">¿Deseas eliminar <?= $desarrolladores ?>?</h1>
    <div class="m-auto col-10 col-md-8 col-lg-6 col-xl-4">
      <form action="actions/delete_desarrollador_acc.php?id=<?= $desarrolladorSeleccionado ?>" method="POST">
        <div class="d-flex justify-content-end gap-4">
          <a onclick="javascript:history.go(-1)" class="btn text-light w-100" style="background-color: #028171;">Cancelar</a>
          <button type="submit" class="btn btn-danger text-light w-100">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>