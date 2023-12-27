<?php
require_once "../../func/autoload.php";
require_once '../../classes/Usuario.php';

if (isset($_SESSION["carrito"]) && isset($_SESSION["logged"])) {
  try {
    $carritoJuegos = (new Carrito())->get_productos();
    var_dump($_SESSION["logged"]["id"]);
    foreach ($carritoJuegos as $juego) {
      (new Juego_Usuario())->insert($_SESSION["logged"]["id"], $juego["id"], $juego["cantidad"]);
    }
    (new Carrito())->comprar();
  } catch (Exception $e) {
    die("No se pudo comprar");
  }
}

?>