<?php
$usuarioSeleccionado = $_GET["id"];
$usuario = (new Usuario())->traer_usuario_por_id($usuarioSeleccionado);
?>

<div class="row my-5 mx-1">
  <div class="col m-auto">
    <h1 class="text-center mb-5 fw-bold">¿Deseas eliminar <?= $usuario->getNombre() ?>?</h1>
    <div class="m-auto col-10 col-md-8 col-lg-6 col-xl-4">
      <form action="actions/delete_usuario_acc.php?id=<?= $usuario->getId() ?>" method="POST">
        <div class="d-flex justify-content-end gap-4">
          <a onclick="javascript:history.go(-1)" class="btn text-light w-100" style="background-color: #028171;">Cancelar</a>
          <button type="submit" class="btn btn-danger text-light w-100">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>