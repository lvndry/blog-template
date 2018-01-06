<?php
  use Core\HTML\BootstrapForm;
  use Core\Auth\DbAuth;

  $app = App::getInstance();
  if(!empty($_POST)){
    $auth = new DbAuth($app->getDb());

    if($auth->login($_POST['login'], $_POST['password'])){
      header("Location: admin.php");
    } else {
      ?>
      <div class="alert alert-danger">
        Uncorrect login or password
      </div>
      <?php 
    }
  }
  $form = new BootstrapForm($_POST);
 ?>

 <form class="col-sm-8" method="post">
   <?= $form->input('login', 'Login'); ?>
   <?= $form->input('password', 'Password', array('type' => 'password')) ?>
   <button type="submit" class="btn btn-primary">Submit</button>
 </form>
