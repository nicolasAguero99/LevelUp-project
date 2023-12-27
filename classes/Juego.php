<?php

class Juego {

  protected $id;
  protected $nombre;
  protected $precio;
  protected $descripcion;
  protected $desarrollador_id;
  protected $publicacion;
  protected $genero;
  protected $portada;
  protected $categoria;
  protected $top;


  //metodos

  public function traer_catalogo_completo() : array{
    $catalogo = [];
    $query = "SELECT * FROM `juegos`";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute();
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $catalogo = $PDOStatement->fetchAll();
    return $catalogo;
  }

  public function traer_catalogo_filtrado($filtro, $categoria) : array{
    $catalogo = [];

    if ($categoria == 'todos') {
      $categoria = true;
    }

    switch ($filtro) {
      case 'top':
        $query = "SELECT * FROM juegos WHERE juegos.top = 1";
        break;
      
      case 'mayor':
        if($categoria != 'todos') {
          $query = "SELECT * FROM juegos WHERE juegos.categoria = :categoria ORDER BY precio DESC";
        } else {
          $query = "SELECT * FROM juegos ORDER BY precio DESC";
        }
        break;
        
      case 'menor':
          if($categoria != 'todos') {
            $query = "SELECT * FROM juegos WHERE juegos.categoria = :categoria ORDER BY precio ASC";
          } else {
            $query = "SELECT * FROM juegos ORDER BY precio ASC";
          }
        break;
      
      default:
        header("Location: ../index.php?seccion=seccion=catalogo&categoria=todos");
        break;
    }

    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    if ($filtro == 'top' || $categoria == 'todos') {
      $PDOStatement->execute();
    } else {
      $PDOStatement->execute(['categoria' => $categoria]);
    }
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $catalogo = $PDOStatement->fetchAll();
    return $catalogo;
  }

  public function traer_juego_por_id(int $juegoSeleccionado) {
    $catalogo = $this->traer_catalogo_completo();
    foreach ($catalogo as $producto) {
      if ($producto->id == $juegoSeleccionado) {
        return $producto;
      }
    }
  }

  public function traer_generos()
  {
    $query = "SELECT DISTINCT juegos.genero FROM juegos";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute();
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $result = $PDOStatement->fetchAll();

    return $result ?? FALSE;
  }

  public function traer_categorias()
  {
    $query = "SELECT DISTINCT juegos.categoria FROM juegos";
    $conexion = Conexion::getConexion();
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute();
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $result = $PDOStatement->fetchAll();

    return $result ?? FALSE;
  }


  public function insert($nombre, $precio, $descripcion, $desarrollador_id, $publicacion, $genero, $portada, $categoria, $top_juego)
  {
    if (!$nombre || !$precio || !$descripcion || !$desarrollador_id || !$publicacion || !$genero || !$portada || !$categoria) {
      header("Location: ../index.php?seccion=add_juego");
      return;
    }
    $conexion = Conexion::getConexion();
    $query = "INSERT INTO juegos VALUES (NULL, :nombre, :precio, :descripcion, :desarrollador_id, :publicacion, :genero, :portada, :categoria, :top_juego)";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([
      'nombre'=> $nombre, 
      'precio' => $precio,
      'descripcion' => $descripcion,
      'desarrollador_id' => $desarrollador_id,
      'publicacion' => $publicacion,
      'genero'=> $genero,
      'portada' => $portada,
      'categoria' => $categoria,
      'top_juego' => $top_juego,
    ]);

    $conexionJxD = Conexion::getConexion();
    $queryJxD = "INSERT INTO juegos_x_desarrollador VALUES (NULL, :desarrollador_id, :juego_id)";
    $conexionJuegos = Conexion::getConexion();
    $idJuego = $conexionJuegos->lastInsertId();
    $PDOStatementJxD = $conexionJxD->prepare($queryJxD);
    $PDOStatementJxD->execute([
      'desarrollador_id' => $desarrollador_id,
      'juego_id' => $idJuego,
    ]);
    
    header("Location: ../index.php?seccion=admin_juegos");
  }

  public function editar($id, $nombre, $precio, $descripcion, $desarrollador_id, $publicacion, $genero, $portada, $categoria, $top_juego)
  {
    $conexion = Conexion::getConexion();
    $query = "UPDATE juegos SET nombre = :nombre, precio = :precio, descripcion = :descripcion, desarrollador_id = :desarrollador_id, publicacion = :publicacion, genero = :genero, categoria = :categoria, `top` = :top_juego";
    $params = [
      'id' => $id,
      'nombre' => $nombre,
      'precio' => $precio,
      'descripcion' => $descripcion,
      'desarrollador_id' => $desarrollador_id,
      'publicacion' => $publicacion,
      'genero' => $genero,
      'categoria' => $categoria,
      'top_juego' => $top_juego,
    ];

    if (!empty($portada)) {
      $query .= ", portada = :portada";
      $params['portada'] = $portada;
    }

    $query .= " WHERE juegos.id = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute($params);

    $conexionJxD = Conexion::getConexion();
    $queryJxD = "UPDATE juegos_x_desarrollador SET desarrollador_id = :desarrollador_id WHERE juego_id = :juego_id";
    $PDOStatementJxD = $conexionJxD->prepare($queryJxD);
    $PDOStatementJxD->execute([
      'desarrollador_id' => $desarrollador_id,
      'juego_id' => $id,
    ]);
  }

  public function delete($id)
  {
    $conexionJxD = Conexion::getConexion();
    $queryJxD = "DELETE FROM juegos_x_desarrollador WHERE juego_id = :juego_id";
    $PDOStatementJxD = $conexionJxD->prepare($queryJxD);
    $PDOStatementJxD->execute([
      'juego_id' => $id,
    ]);

    $juego = $this->traer_juego_por_id($id);

    $portada = $juego->getPortada() ?? "";
    if (file_exists("../../imgs/imgs-subidas/$portada")) {
      unlink("../../imgs/imgs-subidas/$portada");
    } elseif (file_exists("../../imgs/$portada")) {
      unlink("../../imgs/$portada");
    }

    $conexion = Conexion::getConexion();
    $query = "DELETE FROM juegos WHERE juegos.id = :id";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['id' => $id]);

    header("Location: ../index.php?seccion=admin_juegos");
  }

  public function getId()
  {
    return $this->id;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getPrecio()
  {
    return $this->precio;
  }

  public function getDescripcion()
  {
    return $this->descripcion;
  }

  public function getDesarrollador_id()
  {
    return $this->desarrollador_id;
  }

  public function getPublicacion()
  {
    return $this->publicacion;
  }

  public function getGenero()
  {
    return $this->genero;
  }

  public function getPortada()
  {
    return $this->portada;
  }

  public function getCategoria()
  {
    return $this->categoria;
  }

  public function getTop()
  {
    return $this->top;
  }

}
?>