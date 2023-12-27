<?php
  require_once "../../func/autoload.php";

  try {
    (new Autenticacion())->logout();
  } catch (Exception $e) {
    die("No se pudo cerrar sesión");
  }

?>