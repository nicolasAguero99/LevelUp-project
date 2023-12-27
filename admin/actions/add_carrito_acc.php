<?php

require_once "../../func/autoload.php";

try {
  (new Carrito())->add_productos($_GET["id"], $_POST["cant"]);
  header("Location: ../../index.php?seccion=carrito");
} catch (Exception $e) {
  die("No se pudo cargar el producto al carrito");
}

?>