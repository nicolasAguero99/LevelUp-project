<?php

require_once "../../func/autoload.php";

$id = $_GET["id"] ?? FALSE;
$nombre = $_POST["nombre"] ?? FALSE;
$email = $_POST["email"] ?? FALSE;
$password = $_POST["password"] ?? FALSE;
$roles = $_POST["roles"] ?? FALSE;

try {
  (new Usuario())->editar(
    $id,
    $nombre,
    $email,
    $password,
    $roles
  );
} catch (Exception $e) {
  die("No se pudo modificar el usuario");
}

?>