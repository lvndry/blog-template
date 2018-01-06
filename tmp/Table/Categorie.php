<?php

  namespace App\Table;
  use \App\App;

  class Categorie extends Table
  {
    public function __get($key) {
      $method = 'get'. ucfirst($key);
      $this->$key = $this->$method();
      return $this->$key;
    }

    public function getUrl(){
      return "index.php?page=categorie&id=".$this->id;
    }
  }

 ?>
