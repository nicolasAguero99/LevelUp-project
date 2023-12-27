<?php
require_once "func/autoload.php";
$desarrolladores = new Desarrollador();
$desarrollador = $desarrolladores->traer_desarrolladores_completo();

$catalogo = new Juego();
if (!isset($_GET['filtro'])) {
  $juegos = $catalogo->traer_catalogo_completo();
} else {
  $juegos = $catalogo->traer_catalogo_filtrado($_GET['filtro'], $_GET['categoria']); 
}
?>

<section class="container mb-5">
  <h1 class="titulo text-center">Todos los juegos</h1>
  
  <div class="text-center">
    <a href="index.php?seccion=catalogo&categoria=<?= $_GET['categoria'] ?>&filtro=mayor" class="btn <?php if(isset($_GET['filtro']) && $_GET['filtro'] == 'mayor') {echo 'btn-primary';} else {echo 'btn-outline-primary';} ?>">Mayor precio</a>
    <a href="index.php?seccion=catalogo&categoria=<?= $_GET['categoria'] ?>&filtro=menor" class="btn <?php if(isset($_GET['filtro']) && $_GET['filtro'] == 'menor') {echo 'btn-primary';} else {echo 'btn-outline-primary';} ?>">Menor precio</a>
    <a href="index.php?seccion=catalogo&categoria=<?= $_GET['categoria'] ?>&filtro=top" class="btn <?php if(isset($_GET['filtro']) && $_GET['filtro'] == 'top') {echo 'btn-primary';} else {echo 'btn-outline-primary';} ?>">Juegos top</a>
    <?php if(isset($_GET['filtro'])) { ?>
    <a href="index.php?seccion=catalogo&categoria=<?= $_GET['categoria'] ?>" class="btn btn-danger">No filtrar</a>
    <?php } ?>
  </div>
  <div class="row align-items-start justify-content-center">
    <?php 
    foreach ($juegos as $juego) { 
      if (!isset($_GET["seccion"]) || (isset($_GET["categoria"]) && $_GET["categoria"] == "todos")) {
        require "includes/cards-juegos.php";
      } else if (isset($_GET["categoria"]) && $_GET["categoria"] == $juego->getCategoria()) {
        require "includes/cards-juegos.php";
      }
    }
    ?>
  </div>

</section>