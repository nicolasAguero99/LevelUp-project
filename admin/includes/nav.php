<nav class="navbar bg-dark navbar-expand-lg px-2">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">
      <img src="../imgs/levelUp-logo.svg" alt="Level Up logo" style="width: 40px; height: auto;">
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
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../">Volver Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if (!isset($_GET['seccion'])) echo 'active'; ?>" aria-current="page" href="index.php">Panel</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php if (isset($_GET['seccion']) && $_GET["seccion"] != "login" && $_GET["seccion"] != "logout") { ?>active<?php } ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" href="#">
            <?php
            if (isset($_GET['seccion']) && $_GET['seccion'] == 'admin_juegos') {
              echo "Admin Juegos";
            } else if (isset($_GET['seccion']) && $_GET['seccion'] == 'admin_desarrolladores') {
              echo "Admin Desarrolladores";
            } else if (isset($_GET['seccion']) && $_GET['seccion'] == 'admin_usuarios') {
              echo "Admin Usuarios";
            } else {
              echo "Admin";
            };
            ?>
          </a>
          <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item text-light <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'admin_juegos') { ?>active<?php } ?>" href="index.php?seccion=admin_juegos">Juegos</a></li>
            <li><a class="dropdown-item text-light <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'admin_desarrolladores') { ?>active<?php } ?>" href="index.php?seccion=admin_desarrolladores">Desarrolladores</a></li>
            <li><a class="dropdown-item text-light <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'admin_usuarios') { ?>active<?php } ?>" href="index.php?seccion=admin_usuarios">Usuarios</a></li>
          </ul>
        </li>
      </ul>
      <?php if (isset($_SESSION["logged"])) { ?>
        <ul class="d-flex justify-content-end navbar-nav mb-2 mb-lg-0">
          <a class="nav-link btn btn-danger <?php if (isset($_GET['seccion']) && $_GET['seccion'] == 'logout') { ?>active<?php } ?>" href="actions/logout_acc.php">Cerrar sesión</a>
        </ul>
      <?php } ?>
    </div>
  </div>
</nav>