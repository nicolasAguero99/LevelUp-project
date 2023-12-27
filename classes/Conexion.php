<?php

class Conexion{
  public const DB_SERVER = "localhost:3306"; //127.0.0.1
  public const DB_USER = "root";
  public const DB_PASS = "";
  public const DB_NAME = "levelup";

  public const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";charset=utf8mb4";

  protected static ?PDO $db = null;

  private static function conectar()
  {
    try {
      self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS,[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);
    } catch (Exception $e) {
      die('Error al conectar con MySQL.');
    } 
  }

  public static function getConexion(): PDO
  {
    if (self::$db == null) {
      self::conectar();
    }
    return self::$db;
  }
}

?>