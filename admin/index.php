<?php

$seccion = $_GET["seccion"] ?? "dashboard";
require_once "../func/autoload.php";

$whiteList = [
  "dashboard" => [
    "titulo" => "Panel de Control",
    "restringido" => TRUE,
  ],

  // Juegos
  "admin_juegos" => [
    "titulo" => "Administración - Juego",
    "restringido" => TRUE,
  ],
  "add_juego" => [
    "titulo" => "Administración - Juego",
    "restringido" => TRUE,
  ],
  "editar_juego" => [
    "titulo" => "Administración - Juego",
    "restringido" => TRUE,
  ],
  "delete_juego" => [
    "titulo" => "Administración - Juego",
    "restringido" => TRUE,
  ],

  // Desarrolladores
  "admin_desarrolladores" => [
    "titulo" => "Administración - Desarrollador",
    "restringido" => TRUE,
  ],
  "add_desarrollador" => [
    "titulo" => "Administración - Desarrollador",
    "restringido" => TRUE,
  ],
  "editar_desarrollador" => [
    "titulo" => "Administración - Desarrollador",
    "restringido" => TRUE,
  ],
  "delete_desarrollador" => [
    "titulo" => "Administración - Desarrollador",
    "restringido" => TRUE,
  ],

  // Usuarios
  "admin_usuarios" => [
    "titulo" => "Administración - Usuarios",
    "restringido" => TRUE,
  ],
  "editar_usuario" => [
    "titulo" => "Administración - Usuarios",
    "restringido" => TRUE,
  ],
  "delete_usuario" => [
    "titulo" => "Administración - Usuarios",
    "restringido" => TRUE,
  ],

  // Login y Logout
  "logout" => [
    "titulo" => "LevelUp - Cerrar Sesión",
    "restringido" => TRUE,
  ],
];

$vista = "error404";
$titulo = "Error";
if (array_key_exists($seccion, $whiteList)) {
  $vista = $seccion;
  $titulo = $whiteList[$seccion]["titulo"];
}

if ($whiteList[$seccion]["restringido"]) {
  if (!isset($_SESSION['logged'])) {
    header("Location: ../index.php?seccion=login");
  } else if ($_SESSION['logged']['rol'] == 'usuario') {
    header("Location: ../index.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Level up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

  <header>
    <?php require_once "./includes/nav.php"; ?>
  </header>

  <?php
  file_exists("views/$vista.php") ?
    require "views/$vista.php" :
    require "views/error404.php";
  ?>

  <?php require_once "../includes/footer.php"; ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>