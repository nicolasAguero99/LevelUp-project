<?php
require_once "../../func/autoload.php";

$juego = $_POST;
$imagen = $_FILES["portada"];
$nombre_archivo = "";

try {
  if (!empty($imagen["tmp_name"])) {
    $array = explode(".", $imagen["name"]);
    $extension = end($array);
    $nombre_subido = str_replace("." . end($array), "", $imagen["name"]);
    $nombre_archivo = $nombre_subido . "-" . $imagen["size"] . uniqid(true) . ".$extension";
    $fileUpload = move_uploaded_file($imagen["tmp_name"], "../../imgs/imgs-subidas/$nombre_archivo");
    if (!$fileUpload) {
      throw new Exception("No se pudo subir la imágen");
    }
  }
  (new Juego())->insert(
    $juego["nombre"],
    $juego["precio"],
    $juego["descripcion"],
    $juego["desarrollador_id"],
    $juego["publicacion"],
    $juego["genero"],
    $nombre_archivo,
    $juego["categoria"],
    $juego["top_juego"]
  );
} catch (Exception $e) {
  die("No se pudo cargar el juego");
}
