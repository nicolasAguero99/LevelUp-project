<?php
require_once "../../func/autoload.php";

try {
  (new Juego())->delete($_GET["id"]);
} catch (Exception $e) {
  die("No se pudo eliminar el juego");
}

?>