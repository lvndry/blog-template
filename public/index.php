<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  ini_set("short_open_tag", 1);
  error_reporting(E_ALL);

  define ('ROOT', dirname(__DIR__));
  require ROOT.'/app/App.php';

  App::load();

  if(isset($_GET['page'])){
    $page  = $_GET['page'];
  } else {
    $page = 'home';
  }

  ob_start();
  if ($page === 'home') {
    require ROOT.'/view/articles/home.php';
  }
  elseif($page === 'post.categorie') {
    require ROOT.'/view/articles/categorie.php';
  }
  elseif($page === 'post.show') {
    require ROOT.'/view/articles/post.php';
  }
  elseif ($page === '404') {
    require ROOT.'/view/templates/404.php';
  }
  $content = ob_get_clean();
  require ROOT.'/view/templates/default.php';
 ?>
