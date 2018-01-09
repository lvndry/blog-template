<?php
  namespace App\Controller;

  use App\Controller\AppController;
  use \App;

  class PostController extends AppController
  {

    public function index() {
      $posts = App::getInstance()->getTable('Post')->getLast();
      $categories = App::getInstance()->getTable('Categorie')->getLast();
      $this->render('post.index', compact('posts', 'categories'));
    }

    public function categorie() {
      $app = App::getInstance();
      $categorie = $app->getTable('Categorie')->getName($_GET['id']);
      if($categorie === false) {
        App::Error404();
      }
      $posts = $app->getTable('Categorie')->getPosts($_GET['id']);
      $categories = $app->getTable('Categorie')->getAll();
      $this->render('post.categorie', compact('categorie', 'posts', 'categories'));
    }

    public function show ($id) {
      $post = App::getInstance()->getTable('Post')->getOneById($id);
      if($post == false) {
        App::Error404();
      }
      $this->render('post.post', compact('post'));
    }
   }

 ?>
