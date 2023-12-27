<?php

class Usuario {
  protected $id;
  protected $email;
  protected $nombre;
  protected $password;
  protected $roles;
  protected $foto;

  public function traer_usuarios() {
    $query = "SELECT * FROM usuarios";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute();
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $result = $PDOStatement->fetchAll();

    return $result ?? FALSE;
  }

  public function traer_usuario_por_id(string $id) {
    $query = "SELECT * FROM `usuarios` WHERE `id` = :id";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(["id" => $id]);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $result = $PDOStatement->fetch();

    return $result ?? FALSE;
  }

  public function traer_usuario_por_nombre(string $usuario_nombre) {
    $query = "SELECT * FROM `usuarios` WHERE `nombre` = :usuario";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(["usuario" => $usuario_nombre]);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $result = $PDOStatement->fetch();

    return $result ?? FALSE;
  }

  public function traer_roles() {
    $query = "SELECT DISTINCT usuarios.roles FROM usuarios";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute();
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $result = $PDOStatement->fetchAll();

    return $result ?? FALSE;
  }

  public function editarPerfil(int $id, string $nombre, string $email, $foto) {
    $conexionCheck = (new Conexion())->getConexion();
    $queryCheck = "SELECT * FROM usuarios WHERE usuarios.nombre = :nombre AND usuarios.id != :id";
    $PDOStatementCheck = $conexionCheck->prepare($queryCheck);
    $PDOStatementCheck->execute(['nombre' => $nombre, 'id' => $id]);
    $resultadoCheck = $PDOStatementCheck->fetchAll();

    if (count($resultadoCheck) > 0) {
      header("Location: ../index.php?seccion=editar_usuario&id=$id&error=dup");
      return;
    }

    $conexion = Conexion::getConexion();
    $query = "UPDATE usuarios SET nombre = :nombre, email = :email, foto = :foto WHERE usuarios.id = :id";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([
      'id' => $id,
      'nombre' => $nombre,
      'email' => $email,
      'foto' => $foto,
    ]);

    header("Location: ../index.php");

    return $result ?? FALSE;
  }

  public function editar($id, $nombre, $email, $password, $roles)
  {
    $conexionCheck = (new Conexion())->getConexion();
    $queryCheck = "SELECT * FROM usuarios WHERE usuarios.nombre = :nombre AND usuarios.id != :id";
    $PDOStatementCheck = $conexionCheck->prepare($queryCheck);
    $PDOStatementCheck->execute(['nombre' => $nombre, 'id' => $id]);
    $resultadoCheck = $PDOStatementCheck->fetchAll();

    if (count($resultadoCheck) > 0) {
      header("Location: ../index.php?seccion=editar_usuario&id=$id&error=dup");
      return;
    }

    if (!$id && !$nombre && !$email && !$password && !$roles) {
      header("Location: ../index.php?seccion=editar_usuario&id=$id&error");
      return;
    };

    if ($password < 4) {
      header("Location: ../index.php?seccion=editar_usuario&id=$id&error=psw");
      return;
    }

    if ($roles != 'usuario' && $roles != 'admin' && $roles != 'superadmin') {
      echo '<script>window.history.go(-1);</script>';
      return;
    };

    $conexion = Conexion::getConexion();
    $query = "UPDATE usuarios SET nombre = :nombre, email = :email, password = :password, roles = :roles WHERE usuarios.id = :id";
    $PDOStatement = $conexion->prepare($query);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $PDOStatement->execute([
      'id'=> $id, 
      'nombre'=> $nombre,
      'email' => $email,
      'password' => $passwordHash,
      'roles' => $roles,
    ]);
    header("Location: ../index.php?seccion=admin_usuarios");
  }

  public function delete($id)
  {
    $conexion = Conexion::getConexion();
    $query = "DELETE FROM usuarios WHERE usuarios.id = :id";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['id' => $id]);
  }

  public function getId()
  {
    return $this->id;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getRoles()
  {
    return $this->roles;
  }

  public function getFoto()
  {
    return $this->foto;
  }
}


class Juego_Usuario {

  protected $id;
  protected $usuario_id;
  protected $juego_id;
  protected $cantidad;
  protected $fecha_compra;


  public function traer_juegos_x_usuario()
  {
    $query = "SELECT juegos.nombre, juegos.precio, juegos_x_usuario.usuario_id, juegos_x_usuario.cantidad, juegos_x_usuario.fecha_compra FROM juegos INNER JOIN juegos_x_usuario ON juegos_x_usuario.juego_id = juegos.id";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute();
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $result = $PDOStatement->fetchAll();

    return $result ?? FALSE;
  }

  public function insert($usuario_id, $juego_id, $cantidad) {
    if (!$usuario_id || !$juego_id || !$cantidad) {
      header("Location: ../../index.php?seccion=carrito");
      return;
    }
    $conexion = Conexion::getConexion();
    $query = "INSERT INTO juegos_x_usuario VALUES (NULL, :usuario_id, :juego_id, :cantidad, :fecha_compra)";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([
      'usuario_id'=> $usuario_id, 
      'juego_id'=> $juego_id, 
      'cantidad'=> $cantidad,
      'fecha_compra'=> date("Y-m-d"), 
    ]);

    header("Location: ../index.php?seccion=carrito&comprado");
  }

  public function getId()
  {
    return $this->id;
  }

  public function getUsuarioId()
  {
    return $this->usuario_id;
  }

  public function getJuegoId()
  {
    return $this->juego_id;
  }

  public function getCantidad()
  {
    return $this->cantidad;
  }

  public function getFechaCompra()
  {
    return $this->fecha_compra;
  }

}



?>