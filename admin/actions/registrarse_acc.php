<?php
  require_once "../../func/autoload.php";

  $nombre = $_POST["nombre"] ?? FALSE; 
  $email = $_POST["email"] ?? FALSE; 
  $password = $_POST["password"] ?? FALSE;
  $passwordCheck = $_POST["password-check"] ?? FALSE;
  $foto = $_FILES["foto"] ?? FALSE;
  $checkbox = $_POST["checkbox"] ?? FALSE;
  $nombre_archivo = "";
  
  try {
    if (!empty($foto["tmp_name"])) {
      $array = explode(".", $foto["name"]);
      $extension = end($array);
      $nombre_subido = str_replace("." . end($array), "", $foto["name"]);
      $nombre_archivo = $nombre_subido . "-" . $foto["size"] . uniqid(true) . ".$extension";
      $fileUpload = move_uploaded_file($foto["tmp_name"], "../../imgs/foto-perfil/$nombre_archivo");
      if (!$fileUpload) {
        throw new Exception("No se pudo subir la imágen");
      }
    } 
    (new Autenticacion())->registrar(
      $nombre, 
      $email, 
      $password,
      $passwordCheck,
      $nombre_archivo,
      $checkbox,
    );
  } catch (Exception $e) {
    die("No se pudo registrar");
  }
?>