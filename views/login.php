<?php if (isset($_GET['error'])) { ?>
  <div style="position: absolute; top: 65px; left: 0; width: 100%;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>¡Has tenido un error!</strong> Por favor verificar que todos los campos sean correctos.
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>


<div class="row my-5 mx-1">
  <div class="col m-auto">
    <h1 class="text-center mb-5 fw-bold">Login</h1>
    <form action="admin/actions/login_acc.php" method="POST" class="w-75 m-auto">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
        <input name="nombre" type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
  </div>
</div>