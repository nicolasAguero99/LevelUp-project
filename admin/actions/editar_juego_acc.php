<?php

require_once "../../func/autoload.php";
$id = $_GET["id"] ?? FALSE;
$juego = $_POST;
$imagen = $_FILES["portada"];
$nombre_archivo = "";


try {
  if (!empty($imagen["tmp_name"])) {
    $array = explode(".", $imagen["name"]);
    $extension = end($array);
    $nombre_subido = str_replace(".".end($array), "", $imagen["name"]);
    $nombre_archivo = $nombre_subido . "-" . $imagen["size"] . uniqid(true) . ".$extension";
    $fileUpload = move_uploaded_file($imagen["tmp_name"], "../../imgs/imgs-subidas/$nombre_archivo");
    if (!$fileUpload) {
      throw new Exception("No se pudo subir la imágen");
    }
  }

  (new Juego())->editar(
    $id,
    trim($juego["nombre"]),
    trim($juego["precio"]),
    trim($juego["descripcion"]),
    $juego["desarrollador_id"],
    trim($juego["publicacion"]),
    $juego["genero"],
    $nombre_archivo,
    $juego["categoria"],
    $juego["top_juego"]
  );
  header("Location: ../index.php?seccion=admin_juegos");
} catch (Exception $e) {
  die("No se pudo modificar el juego");
}
