<?php
require_once "../../func/autoload.php";

try {
  (new Desarrollador())->delete($_GET["id"]);
  header("Location: ../index.php?seccion=admin_desarrolladores");
} catch (Exception $e) {
  die("No se pudo eliminar el desarrollador");
}

?>