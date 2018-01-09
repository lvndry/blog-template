<?php

  namespace App\Table;

  use Core\Table\Table;

  class Categorie extends Table
  {
      protected $table = "categories";

      public function getName($id) {
        return $this->query("SELECT categories.title as name FROM categories where categories.id = ?", [$id], true);
      }
      public function getLast(){
        return $this->query("SELECT id, title FROM categories");
      }
      public function getPosts($id){
        return $this->query("SELECT * FROM articles WHERE category_id = ?", [$id]);
      }
  }

 ?>
