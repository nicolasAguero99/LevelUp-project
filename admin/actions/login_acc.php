<?php
require_once "../../func/autoload.php";
try {
  (new Autenticacion())->login($_POST["nombre"], $_POST["password"]);
} catch (Exception $e) {
  die("No se pudo cargar el usuario");
}
?>