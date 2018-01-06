<?php
  use Core\HTML\BootstrapForm;

  $app = App::getInstance();
  $postable = $app->getTable('Post');
  $post = $postable->getOne($_GET['id']);
  $form = new BootstrapForm($post);
  $categorie = $app->getTable('Categorie')->getAll();

  if(!empty($_POST)) {
    $ok = $postable->update($_GET['id'], [
      'title' => $_POST['title'],
      'content' => $_POST['content']
    ]);
    if($ok) {
      ?>
      <div class="alert alert-success">
        Changes made !
      </div>
    <?php
  } else {
    ?>
    <div class="alert alert-danger">
      A problem append!
    </div>
    <?php
    }
  }
 ?>

 <form class="col-sm-8" method="post">
   <?= $form->input('title', 'Title'); ?>
   <?= $form->textarea('content', 'Content') ?>
   <button type="submit" class="btn btn-primary">Submit</button>
 </form>
