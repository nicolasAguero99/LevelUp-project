<nav id="nav-user" class="navbar navbar-expand-lg px-2">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">
      <img src="./imgs/levelUp-logo.svg" alt="Level Up logo" style="width: 40px; height: auto;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-mobile-icon">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier">
            <g id="Menu / Menu_Alt_01">
              <path id="Vector" d="M12 17H19M5 12H19M5 7H19" stroke="#336699" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
          </g>
        </svg>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (isset($_SESSION["logged"]) && $_SESSION["logged"]['rol'] != 'usuario') { ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin/index.php">Inicio Admin</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link <?php if (!isset($_GET['seccion'])) {
                                echo 'active';
                              } ?>" aria-current="page" href="./index.php">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php if (isset($_GET['seccion']) && isset($_GET['categoria'])) {
                                                echo 'active';
                                              } ?>" href=" #" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Juegos
            <?php
            if (isset($_GET['categoria']) && $_GET['categoria'] == 'todos') {
              echo "(Todos)";
            } else if (isset($_GET['categoria']) && $_GET['categoria'] == 'playstation') {
              echo "(Playstation)";
            } else if (isset($_GET['categoria']) && $_GET['categoria'] == 'xbox') {
              echo "(Xbox)";
            } else if (isset($_GET['categoria']) && $_GET['categoria'] == 'computadora') {
              echo "(Computadora)";
            }
            ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?seccion=catalogo&categoria=todos">Todos</a></li>
            <li><a class="dropdown-item" href="index.php?seccion=catalogo&categoria=playstation">Playstation</a></li>
            <li><a class="dropdown-item" href="index.php?seccion=catalogo&categoria=xbox">Xbox</a></li>
            <li><a class="dropdown-item" href="index.php?seccion=catalogo&categoria=computadora">Computadora</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php?seccion=alumno">Datos del alumno</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php?seccion=contacto">Contacto</a>
        </li>
      </ul>
      <ul class="d-flex gap-2 justify-content-end navbar-nav mb-2 mb-lg-0">
        <?php if (isset($_SESSION["logged"])) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if (isset($_SESSION['logged'])) { ?>
                <?php if (file_exists("imgs/foto-perfil/" . $_SESSION['logged']['foto'])) { ?>
                  <img style="object-fit: cover;" class="rounded-circle" width="25" height="25" src="<?= 'imgs/foto-perfil/' . $_SESSION['logged']['foto'] ?>" alt="foto de perfil">
                <?php } else { ?>
                  <img class="rounded-circle" width="25" height="25" src="./imgs/foto-perfil/perfil-default.png" alt="foto de perfil">
                <?php } ?>
                <?php echo ucfirst($_SESSION['logged']['nombre_usuario']); ?>
              <?php } ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="index.php?seccion=perfil">Editar perfil</a></li>
              <li><a class="dropdown-item" href="index.php?seccion=compras">Mis compras</a></li>
              <li><a style="color: red;" class="dropdown-item" href="admin/actions/logout_acc.php">Cerrar sesión</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'carrito') { ?>active<?php } ?>" href="index.php?seccion=carrito">Carrito</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="btn btn-primary text-light <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'login') { ?>active<?php } ?>" href="index.php?seccion=login">Iniciar sesión</a>
          </li>
          <li class="nav-item">
            <a class="btn border-primary text-primary <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'registrarse') { ?>active<?php } ?>" href="index.php?seccion=registrarse">Registrarse</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>