<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  ini_set("short_open_tag", 1);
  error_reporting(E_ALL);

  define ('ROOT', dirname(__DIR__));
  require ROOT.'/app/App.php';

  use App\Controller\PostController;
  App::load();

  if(isset($_GET['page'])){
    $page  = $_GET['page'];
  } else {
    $page = 'home';
  }

  $postController = new PostController();

  ob_start();
  if ($page === 'home') {
    $postController->index();
  }
  elseif($page === 'post.categorie') {
    $postController->categorie();
  }
  elseif($page === 'post.show') {
    $postController->show($_GET['id']);
  }
  elseif ($page === '404') {

  }
  $content = ob_get_clean();
  require ROOT.'/view/templates/default.php';
 ?>
