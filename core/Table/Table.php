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
          $updates[] = "$key = ?";
          $values[] = $value;
      }
      $values[] = $id;
      $set_keys = implode(',', $updates);

      return $this->query("UPDATE {$this->table} SET $set_keys WHERE id = ?", $values, true);
    }

    public function create($fields) {
      $created = [];
      $values = [];
      foreach ($fields as $key => $value) {
          $created[] = "{$key}";
          $values[] = "'{$value}'";
      }
      $set_keys = implode(', ', $created);
      $values = implode(', ', $values);

      return $this->query("INSERT INTO {$this->table} ({$set_keys}) VALUES ({$values})", null, true);
    }

    /**
     * Associate a key to value of an object
     * @param string the key you want
     * @param string the attribute that wiil be assoicate to the key
     */
    public function getList($key, $value){
      $records = $this->getAll();
      $list = [];

      foreach ($records as $cat) {
        $list[$cat->$key] = $cat->$value;
      }
      return $list;
    }

    public function delete($id) {
      return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }
  }

 ?>
