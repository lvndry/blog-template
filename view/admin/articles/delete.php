<?php
  use Core\HTML\BootstrapForm;

  $app = App::getInstance();
  $postable = $app->getTable('Post');
  
  if(!empty($_POST)) {
    $postable->delete($_POST['id']);
    header("Location: admin.php");
  }
 ?>
