<?php
  namespace App\Table;
  use \App\App;

  class Table
  {
    protected static $table;

    public function __get($key) {
      $method = 'get'. ucfirst($key);
      $this->$key = $this->$method();
      return $this->$key;
    }

    private static function getTable() {
      $class_name = explode("\\",  get_called_class());
      static::$table = strtolower(end($class_name)).'s';

      return static::$table;
    }

    public static function getAll() {
      return App::getDB()->query("
                              Select *
                              FROM ". static::getTable() .
                              "",
                            get_called_class());
    }

    public static function gets($id) {
      return static::query("
        SELECT * FROM " .static::getTable(). " WHERE id = ?
      ", [$id], true);
    }

    public static function query($query, $args = null, $one=false){
      if($args){
        return App::getDB()->prepare($query, $args, get_called_class(), $one);
      } else {
      return  App::getDB()->query($query, get_called_class(), $one);
    }
  }
}
 ?>
