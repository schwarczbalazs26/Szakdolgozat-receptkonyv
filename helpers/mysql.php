<?php

class DataBase
{

  private $servername = "localhost";
  private $username = "receptadmin";
  private $password = "NO1TyDZSz_PEhZJV";
  private $db = "receptkonyv";
  public static $conn;

  function __construct()
  {

    self::$conn = new mysqli($this->servername, $this->username, $this->password, $this->db);


    if (self::$conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }

    self::$conn->set_charset("utf8");
  }

}