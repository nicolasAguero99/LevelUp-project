<?php

class Carrito {

  public function add_productos(int $id, int $cant) {
    if ($cant > 10) return;

    $juego = (new Juego())->traer_juego_por_id($id);
    $_SESSION["carrito"][$id] = [
      "id" => $juego->getId(),
      "portada" => $juego->getPortada(),
      "nombre" => $juego->getNombre(),
      "precio" => $juego->getPrecio(),
      "cantidad" => $cant,
    ]; 
  }

  public function get_productos() {
    if (isset($_SESSION["carrito"])) {
      return $_SESSION["carrito"];
    } else {
      return [];
    }
  }

  public function delete_producto(int $id) {
    
    if ($_SESSION["carrito"] && $_SESSION["carrito"][$id]) {
      unset($_SESSION["carrito"][$id]);
      echo '<script>window.history.go(-1);</script>';
    }

    if (count($_SESSION["carrito"]) == 0) unset($_SESSION["carrito"]);
  }

  public function comprar() {
    if (empty($_SESSION["carrito"])) header("Location: ../../index.php?seccion=carrito");
    unset($_SESSION["carrito"]);
    header("Location: ../../index.php?seccion=carrito&comprado");
  }

}

?>