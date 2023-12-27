<?php

class Desarr_Juego {

  protected $id;
  protected $desarrollador_id;
  protected $juego_id;

  //metodos

  public function traer_todo() : array{
    $catalogo = [];
    $query = "SELECT * FROM `juegos_x_desarrollador`";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute();
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $catalogo = $PDOStatement->fetchAll();
    return $catalogo;
  }

  public function traer_x_join() : array{
    $catalogo = [];

    $query = "SELECT juegos.nombre, desarrolladores.id FROM juegos_x_desarrollador JOIN juegos ON juegos_x_desarrollador.juego_id = juegos.id JOIN desarrolladores ON juegos_x_desarrollador.desarrollador_id = desarrolladores.id";

    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute();
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $catalogo = $PDOStatement->fetchAll();
    return $catalogo;
  }


  public function getId()
  {
    return $this->id;
  }

  public function getDesarrolladorId()
  {
    return $this->desarrollador_id;
  }

  public function getJuegoId()
  {
    return $this->juego_id;
  }
}
