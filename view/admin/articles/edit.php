<?php
  use Core\HTML\BootstrapForm;

  $app = App::getInstance();
  $postable = $app->getTable('Post');
  $post = $postable->getOne($_GET['id']);
  $form = new BootstrapForm($post);
  $categories = $app->getTable('Categorie')->getList('id', 'title');

  if(!empty($_POST)) {
    $ok = $postable->update($_GET['id'], [
      'title' => $_POST['title'],
      'content' => $_POST['content'],
      'category_id' => $_POST['category_id']
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
   <?= $form->select('category_id', 'Categorie', $categories); ?>
   <button type="submit" class="btn btn-primary">Submit</button>
 </form>
