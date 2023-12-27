<section class="d-flex flex-column gap-4 justify-conent-center p-5">
  <div class="m-auto">
    <h1 class="text-center mb-4 fw-bold">PANEL DE CONTROL</h1>
    <h2 class="text-center fs-4">Eres: <b><?php if(isset($_SESSION['logged'])) echo $_SESSION['logged']['rol'] ?></b></h2>
  </div>
  <div class="row mb-5 d-flex align-items-center">

  <div class="justify-content-center align-items d-flex gap-4 flex-wrap">
    <a style="min-width: 200px;" class="bg-success text-white p-4 rounded-pill text-decoration-none text-center" href="index.php?seccion=admin_juegos">
      Admin. Juegos
    </a>
    <a style="min-width: 200px;" class="bg-success text-white p-4 rounded-pill text-decoration-none text-center" href="index.php?seccion=admin_desarrolladores">
      Admin. Desarrolladores
    </a>
    <a style="min-width: 200px;" class="bg-success text-white p-4 rounded-pill text-decoration-none text-center" href="index.php?seccion=admin_usuarios">
      Admin. Usuarios
    </a>
  </div>

  </div>
</section>