<?php
require_once "../../func/autoload.php";

try {
  (new Carrito())->delete_producto($_GET["id"]);
} catch (Exception $e) {
  die("No se pudo borrar producto del carrito");
}

?>
