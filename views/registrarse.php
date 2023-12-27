<?php if (isset($_GET['error'])) { ?>
  <div style="position: absolute; top: 65px; left: 0; width: 100%;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php if ($_GET['error'] == "psw") { ?>
      <strong>¡Has tenido un error!</strong> Las contraseñas ingresadas deben tener entre 4 a 16 caracteres y deben ser las mismas.
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
    <h1 class="text-center mb-5 fw-bold">Registrarse</h1>
    <form action="admin/actions/registrarse_acc.php" method="POST" enctype="multipart/form-data" class="w-75 m-auto">
      <div class="mb-3">
        <label class="form-label">Nombre de usuario</label>
        <input required placeholder="Ej: ejemplo123" minlength="4" maxlength="20" name="nombre" type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input required placeholder="ejemplo@gmail.com" minlength="4" maxlength="40" name="email" type="email" class="form-control" autocomplete="off">
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input required placeholder="xxxx (entre 4 a 16 caractéres)" minlength="4" maxlength="16" name="password" type="password" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña nuevamente</label>
        <input required placeholder="xxxx" minlength="4" maxlength="16" name="password-check" type="password" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Foto de perfil (opcional)</label>
        <input name="foto" type="file" accept="image/*" class="form-control">
      </div>
      <?php if (isset($_SESSION['logged']) && $_SESSION['logged']['rol'] != 'usuario') { ?>
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
      <?php } ?>
      <div class="mb-3 form-check">
        <input type="checkbox" name="checkbox" class="form-check-input" id="exampleCheck1" required>
        <label class="form-check-label">Aceptar términos y condiciones</label>
      </div>
      <button type="submit" id="btn-register" class=" btn btn-primary">Crear cuenta</button>
    </form>
  </div>
</div>