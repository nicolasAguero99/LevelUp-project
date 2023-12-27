<?php
$usuarios = (new Usuario())->traer_usuarios();
?>

<h1 class="titulo">Administrar usuarios</h1>

<a style="position: fixed; bottom: 20px; right: 20px;" class="btn btn-primary rounded-lg" href="../index.php?seccion=registrarse">+ Agregar</a>

<?php foreach ($usuarios as $usuario) { ?>
  <div class="row">
    <div class="col-sm-6 m-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= $usuario->getNombre() ?></h5>
          <span class="card-text">Email: <b><?= $usuario->getEmail() ?></b></span>
          <span class="card-text d-block">Rol: <b><?= $usuario->getRoles() ?></b></span>
          <a href="?seccion=editar_usuario&id=<?= $usuario->getId() ?>">Editar</a>
          <?php if (isset($_SESSION['logged']) && $_SESSION['logged']['rol'] == 'superadmin') { ?>
            <a class="text-danger" href="?seccion=delete_usuario&id=<?= $usuario->getId() ?>">Eliminar</a>
          <?php } else { ?>
            <a style="opacity: .5; text-decoration: line-through;" class="text-danger disabled" disabled>Eliminar</a>
            <span class="d-block text-muted">Solo los "superadmin" pueden eliminar desarrolladores</span>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>