<?php
  namespace Core\Table;

  use Core\Database\Database;

  class Table {
    protected $table;
    protected $db;

    public function __construct(Database $db){
      $this->db = $db;
      if($this->table === null ) {
        $expl = explode("\\", get_class($this));
        $classname = end($expl);
        $this->table = strtolower(str_replace('Table', '', $classname));
      }
    }

    public function getAll(){
      return $this->query("SELECT * FROM ".$this->table);
    }

    public function getOne($id) {
      return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function query($query, $args = null, $one = false) {
      $class = str_replace('Table', 'Entity', get_class($this));
      $class .= 'Entity';
      if($args){
        return $this->db->prepare($query, $args, $class, $one);
      } else {
        return $this->db->query($query, $class, $one);
      }
    }

    public function update($id, $fields) {
      $updates = [];
      $values = [];
      foreach ($fields as $key => $value) {
          $updates [] = "$key = ?";
          $values[] = $value;
      }
      $values[] = $id;
      $set_keys = implode(',', $updates);

      return $this->query("UPDATE {$this->table} SET $set_keys WHERE id = ?", $values, true);
    }
  }

 ?>