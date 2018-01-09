<?php
namespace Core\Database;
use \PDO;
/**
 * Class Datrabase
 */
class PgDatabase extends Database
{
  private $dbname;
  private $dbhost;
  private $user;
  private $password;
  private $pdo;

  function __construct($dbname, $dbhost="localhost", $user="postgres", $password="adminboat") {
    $this->dbname = $dbname;
    $this->$dbhost = $dbhost;
    $this->$user = $user;
    $this->$password = $password;
  }

  private function getPDO(){
    if($this->pdo === null) {
      $pdo = new PDO("pgsql:dbname=$this->dbname;host=localhost", "postgres", "adminboat");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo = $pdo;
    }
    return $this->pdo;
  }

  public function query($query, $classname = null, $one=false) {
    $pdo = $this->getPDO();
    $req = $pdo->query($query);

    if(!(strpos($query, 'SELECT') === 0)){
        echo(strpos($query, "SELECT"));
        return $req;
    }

    if($classname === null){
      $req->setFetchMode(PDO::FETCH_OBJ);

    } else {
      $req->setFetchMode(PDO::FETCH_CLASS, $classname);
    }

    if ($one) {
      $datas = $req->fetch();
    } else {
      $datas = $req->fetchAll();
    }
    return $datas;
  }

  public function prepare($query, $args, $classname = null, $one = false) {
    $req = $this->getPDO()->prepare($query);

    $res = $req->execute($args);

    if(!(strpos($query, 'SELECT') === 0)){
        return $res;
    }

    if($classname === null){
      $req->setFetchMode(PDO::FETCH_OBJ);
    } else {
      $req->setFetchMode(PDO::FETCH_CLASS, $classname);
    }

    if($one){
      $datas = $req->fetch();
    }
    else {
      $datas = $req->fetchAll();
    }
    return $datas;
  }

  public function lastInsertId(){
    return $this->getPDO()->lastInsertId();
  }
}


 ?>
