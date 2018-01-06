<?php
namespace App\Table;
use \App\App;
  /**
   * @attributes: id, content, title
   */
  class Article extends Table
  {
    public function __get($key) {
      $method = 'get'. ucfirst($key);
      $this->$key = $this->$method();
      return $this->$key;
    }

    public function getUrl(){
      return "index.php?page=post&id=".$this->id;
    }

    public static function gets($id) {
      return static::query("
        Select articles.date, articles.id, articles.title, articles.content, categories.title as categorie
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        WHERE articles.id = ?
      ", [$id], true);
    }

    public function getPreview(){
      $html = '<p>'. substr($this->content, 0, strlen($this->content)/3).'...</p>';
      $html .= '<p><a href="'. $this->getURL() .'"> Voir la suite </a></p>';
      return $html;
    }

    public static function getLast() {
      return self::query("
                              Select articles.date, articles.id, articles.title, articles.content, categories.title as categorie
                              FROM articles
                              LEFT JOIN categories ON category_id = categories.id
                              ORDER BY articles.date DESC");
    }

    public static function getLastByCat($cat_id){
      return self::query("
                              Select articles.date, articles.id, articles.title, articles.content, categories.title as categorie
                              FROM articles
                              LEFT JOIN categories ON category_id = categories.id
                              WHERE category_id = ?",
                              [$cat_id]);
    }

    public function getDate(){
      return $this->date;
    }
  }

 ?>
