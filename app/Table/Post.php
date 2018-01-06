<?php

  namespace App\Table;

  use Core\Table\Table;

  class Post extends Table
  {
    protected $table = "articles";

    public function getLast(){
      return $this->query("SELECT articles.id, articles.date, articles.content, articles.title, categories.title as categorie FROM articles LEFT JOIN categories ON category_id = categories.id ORDER BY articles.date DESC
      ");
    }

    public function getLastByCat($id) {
      return $this->query("SELECT articles.id, articles.date, articles.content, articles.title, categories.title as categorie FROM articles LEFT JOIN categories ON category_id = categories.id WHERE categories.id = ?", [$id]);
    }

    public function getOneById($id) {
        return $this->query("SELECT articles.id, articles.date, articles.content, articles.title, articles.category_id, categories.title as categorie FROM articles LEFT JOIN categories ON category_id = categories.id WHERE articles.id = ?", [$id], true);
    }
  }

 ?>
