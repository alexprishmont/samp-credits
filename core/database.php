<?php
class mySQL {
  private $pdo;
  public function __construct ($host, $pw, $user, $dbname) {
    $dsn = "mysql:host=".$host.";dbname=".$dbname.";charset=utf8";
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false
    ];
    $this->pdo = new PDO ($dsn, $user, $pw, $options);
  }
  public function query ($query, $params = array()) {
    $stmt = $this->pdo->prepare ($query);
    $stmt->execute ($params);
    return $stmt;
  }
  public function isUserExist ($name) {
    $result = $this->query ("select id from players where name=? limit 1", array($name));
    if ($result->rowCount() != 0)
      return true;
    else
      return false;
  }
}
