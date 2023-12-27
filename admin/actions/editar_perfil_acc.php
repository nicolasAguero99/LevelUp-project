<?php

require_once "../../func/autoload.php";

$id = $_GET["id"] ?? FALSE;
$nombre = $_POST["nombre"] ?? FALSE;
$email = $_POST["email"] ?? FALSE;
$foto = $_FILES["foto"] ?? FALSE;
try {
  if (!empty($foto["tmp_name"])) {
    $array = explode(".", $foto["name"]);
    $extension = end($array);
    $nombre_subido = str_replace("." . end($array), "", $foto["name"]);
    $nombre_archivo = $nombre_subido . "-" . $foto["size"] . uniqid(true) . ".$extension";

    $imagenes = glob("../../imgs/foto-perfil/" . '*');

    foreach ($imagenes as $img) {
      if ($img != "../../imgs/foto-perfil/perfil-default.png") {
        unlink($img);
      }
    }

    $fileUpload = move_uploaded_file($foto["tmp_name"], "../../imgs/foto-perfil/$nombre_archivo");
    if (!$fileUpload) {
      throw new Exception("No se pudo subir la foto");
    }

    if (isset($_SESSION['logged'])) {
      $_SESSION['logged']['foto'] = $nombre_archivo;
    }
  }

  (new Usuario())->editarPerfil(
    $id,
    $nombre,
    $email,
    $nombre_archivo
  );
} catch (Exception $e) {
  die("No se pudo modificar el usuario");
}

?>