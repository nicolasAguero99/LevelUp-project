<?php
$usuario = (new Usuario())->traer_usuario_por_id($_GET["id"]);
?>

<?php if (isset($_GET['error'])) { ?>
  <div style="position: absolute; top: 65px; left: 0; width: 100%;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php if ($_GET['error'] == "psw") { ?>
      <strong>¡Has tenido un error!</strong> Las contraseñas ingresadas deben tener entre 4 a 16 caracteres y deben ser las mismas.
    <?php } else if ($_GET['error'] == "chk") { ?>
      <strong>¡Has tenido un error!</strong> Debes aceptar los términos y condiciones.
    <?php } else if ($_GET['error'] == "dup") { ?>
      <strong>¡Has tenido un error!</strong> Usuario ya registrado. Por favor, prueba otro nombre.
    <?php } else { ?>
      <strong>¡Has tenido un error!</strong> Por favor verificar que todos los campos estén llenos.
    <?php } ?>
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>

<div class="row my-5 mx-1">
  <div class="col m-auto">
    <h1 class="text-center mb-5 fw-bold">Editar datos de <?= $usuario->getNombre() ?></h1>
    <form action="actions/editar_usuario_acc.php?id=<?= $usuario->getId() ?>" method="POST" class="w-75 m-auto">
      <div class="mb-3">
        <label class="form-label">Nombre de usuario</label>
        <input required value="<?= $usuario->getNombre() ?>" placeholder="Ej: ejemplo123" minlength="4" maxlength="20" name="nombre" type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input required value="<?= $usuario->getEmail() ?>" placeholder=" ejemplo@gmail.com" minlength="4" maxlength="40" name="email" type="email" class="form-control" autocomplete="off">
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <?php if (isset($_SESSION['logged']) && $_SESSION['logged']['rol'] == 'superadmin') { ?>
          <input required placeholder="xxxx (entre 4 a 16 caractéres)" minlength="4" maxlength="16" name="password" type="password" class="form-control">
          <?php } else { ?>
          <input disabled placeholder="xxxx (entre 4 a 16 caractéres)" class="form-control">
          <span class="d-block text-muted">Solo los "superadmin" pueden eliminar desarrolladores</span>
        <?php } ?>
      </div>
      <div class="mb-3">
        <label class="form-label">Rol</label>
        <select class="form-select" aria-label="Default select example" name="roles">
          <?php
          $usuarios = (new Usuario())->traer_roles();
          foreach ($usuarios as $rol) {
          ?>
            <option value="<?= $rol->getRoles() ?>"><?= $rol->getRoles() ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <button type="submit" id="btn-register" class=" btn btn-primary">Modificar</button>
    </form>
  </div>
</div>