<?php

class Desarrollador {
  protected $id;
  protected $nombre;

  public function traer_nombre_desarrollador(int $id) {
    $desarrolladores = "";
    $query = "SELECT nombre FROM desarrolladores WHERE desarrolladores.id = $id";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();
    $desarrolladores = $PDOStatement->fetchColumn();
    return $desarrolladores;
  }

  public function traer_desarrolladores_completo() {
    $desarrolladores = [];
    $query = "SELECT * FROM desarrolladores";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute();
    $desarrolladores = $PDOStatement->fetchAll();
    return $desarrolladores;
  }

  public function getId() {
    return $this->id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function insert($nombre) {
    $conexion = Conexion::getConexion();
    $query = "INSERT INTO desarrolladores VALUES (NULL, :nombre)";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['nombre' => $nombre]);
  }

  public function editar($id, $nombre) {
    $conexion = Conexion::getConexion();
    $query = "UPDATE desarrolladores SET nombre = :nombre WHERE id = :id";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['nombre' => $nombre, 'id' => $id]);
  }

  public function delete($id) {
    $conexion = Conexion::getConexion();
    $query = "DELETE FROM desarrolladores WHERE desarrolladores.id = :id";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['id' => $id]);
  }


};


?>