<?php
require_once "../../func/autoload.php";

$desarrollador = $_POST;

try {
  (new Desarrollador())->insert($desarrollador["nombre"]);
  header("Location: ../index.php?seccion=admin_desarrolladores");
} catch (Exception $e) {
  die("No se pudo cargar el desarrollador");
}
?>