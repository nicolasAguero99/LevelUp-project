<?php

require_once "../../func/autoload.php";

$id = $_GET["id"] ?? FALSE;
$desarrollador = $_POST;

try {
  (new Desarrollador())->editar($id, $desarrollador["nombre"]);
  header("Location: ../index.php?seccion=admin_desarrolladores");
} catch (Exception $e) {
  die("No se pudo modificar el desarrollador");
}

?>