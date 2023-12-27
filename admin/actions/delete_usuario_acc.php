<?php
require_once "../../func/autoload.php";

try {
  (new Usuario())->delete($_GET["id"]);
  header("Location: ../index.php?seccion=admin_usuarios");
} catch (Exception $e) {
  die("No se pudo eliminar el usuario");
}
