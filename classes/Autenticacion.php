<?php

class Autenticacion {

  public function login(string $usuario, string $password) {

    $datosUsuario = (new Usuario())->traer_usuario_por_nombre($usuario);

    if ($datosUsuario && password_verify($password, $datosUsuario->getPassword())) {
      $_SESSION['logged'] = [
        'id' => $datosUsuario->getId(),
        'nombre_usuario' => $datosUsuario->getNombre(),
        'rol' => $datosUsuario->getRoles(),
        'foto' => $datosUsuario->getFoto(),
        'email' => $datosUsuario->getEmail()
      ];

      $_SESSION['logged']['rol'] == 'usuario' 
      ? header("Location: ../../index.php")
      : header("Location: ../index.php");
    } else {
      header("Location: ../../index.php?seccion=login&error");
      return;
    }
  }

  public function logout() {
    if (isset($_SESSION["logged"])) unset($_SESSION["logged"]);
    header("Location: ../../index.php");
  }

  public function registrar(string $nombre, string $email, string $password, string $passwordCheck, string $foto, $checkbox) {

    $conexionCheck = (new Conexion())->getConexion();
    $queryCheck = "SELECT * FROM usuarios WHERE usuarios.nombre = :nombre";
    $PDOStatementCheck = $conexionCheck->prepare($queryCheck);
    $PDOStatementCheck->execute(['nombre' => $nombre]);
    $resultadoCheck = $PDOStatementCheck->fetchAll();

    if (count($resultadoCheck) > 0) {
      header("Location: ../../index.php?seccion=registrarse&error=dup");
      return;
    }

    if ($checkbox != "on") {
      header("Location: ../../index.php?seccion=registrarse&error=chk");
      return;
    }
    
    if ($password != $passwordCheck || $password < 4) {
      header("Location: ../../index.php?seccion=registrarse&error=psw");
      return;
    }

    if (!$password || !$nombre || !$email) {
      header("Location: ../../index.php?seccion=registrarse&error");
      return;
    }

    if (empty($foto)) {
      $foto = "perfil-default.png";
    }

    $conexion = Conexion::getConexion();
    $query = "INSERT INTO usuarios VALUES (NULL, :nombre, :email, :password_usuario, 'usuario', :foto)";
    $PDOStatement = $conexion->prepare($query);

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $PDOStatement->execute([
      'nombre' => $nombre,
      'email' => $email,
      'password_usuario' => $passwordHash,
      'foto' => $foto
    ]);

    $this->login($nombre, $password);
  }

}

?>