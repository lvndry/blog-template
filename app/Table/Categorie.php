<?php

  namespace App\Table;

  use Core\Table\Table;

  class Categorie extends Table
  {
      protected $table = "categories";

      public function getName($id) {
        return $this->query("SELECT categories.title as name FROM categories where categories.id = ?", [$id], true);
      }
  }

 ?>
