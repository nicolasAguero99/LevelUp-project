<?php
$perfil_id = $_SESSION['logged']['id'];
$usuario = (new Usuario())->traer_usuario_por_id($perfil_id);
?>

<?php if (isset($_GET['error'])) { ?>
  <div style="position: absolute; top: 65px; left: 0; width: 100%;" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>¡Has tenido un error!</strong> Usuario ya registrado. Por favor, prueba otro nombre.
    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>

<div class="row my-5 mx-1">
  <div class="col m-auto">
    <h1 class="text-center mb-5 fw-bold">Editar perfil</h1>
    <form action="admin/actions/editar_perfil_acc.php?id=<?= $usuario->getId() ?>" method="POST" enctype="multipart/form-data" class="w-75 m-auto">
    <div class="text-center">
      <img width="150" height="150" style="object-fit: cover;" src="imgs/foto-perfil/<?= file_exists("imgs/foto-perfil/" . $usuario->getFoto()) ? $usuario->getFoto() : "perfil-default.png" ?>" alt="foto de perfil" class="rounded-3">
    </div>
      <div class="mb-3">
        <label class="form-label">Nombre de usuario</label>
        <input required value="<?= $usuario->getNombre() ?>" placeholder="Ej: ejemplo123" minlength="4" maxlength="20" name="nombre" type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input required value="<?= $usuario->getEmail() ?>" placeholder=" ejemplo@gmail.com" minlength="4" maxlength="40" name="email" type="email" class="form-control" autocomplete="off">
      </div>
      <div class="mb-3">
        <div class="d-flex align-items-center gap-4">
          <div class="d-flex flex-column w-100">
            <label class="form-label">Foto de perfil</label>
            <input required name="foto" type="file" accept="image/*" class="form-control">
          </div>
        </div>
      </div>
      <button type="submit" id="btn-register" class="w-100 btn btn-primary">Modificar</button>
    </form>
  </div>
</div>