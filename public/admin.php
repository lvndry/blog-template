<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  ini_set("short_open_tag", 1);
  error_reporting(E_ALL);

  use Core\Auth\DbAuth;

  define ('ROOT', dirname(__DIR__));
  require ROOT.'/app/App.php';

  App::load();

  if(isset($_GET['page'])){
    $page  = $_GET['page'];
  } else {
    $page = 'home';
  }

  $app = App::getInstance();
  $auth = new DbAuth($app->getDb());

  // if(!$auth->logged()) {
  //   $app->forbidden();
  // }

  ob_start();
  if ($page === 'home') {
    require ROOT.'/view/admin/articles/index.php';
  }
  elseif($page === 'post.categorie') {
    require ROOT.'/view/admin/articles/categorie.php';
  }
  elseif($page === 'post.show') {
    require ROOT.'/view/admin/articles/post.php';
  }
  elseif ($page === '404') {
    require ROOT.'/view/templates/404.php';
  }
  elseif ($page === "forbidden") {
    require ROOT.'/view/templates/forbidden.php';
  }
  elseif ($page === "login") {
      require ROOT.'/view/users/login.php';
  }
  elseif ($page === "post.edit") {
      require ROOT.'/view/admin/articles/edit.php';
  } elseif ($page === 'post.add') {
    require ROOT.'/view/admin/articles/add.php';
  } elseif ($page === 'post.delete') {
    require ROOT.'/view/admin/articles/delete.php';
  }

  $content = ob_get_clean();
  require ROOT.'/view/templates/default.php';
 ?>
