<?php
  use Core\HTML\BootstrapForm;

  $app = App::getInstance();
  $postable = $app->getTable('Post');
  $categories = $app->getTable('Categorie')->getList('id', 'title');
  $form = new BootstrapForm($_POST);

  if(!empty($_POST)) {
    $ok = $postable->create([
      'title' => $_POST['title'],
      'content' => $_POST['content'],
      'category_id' => $_POST['category_id'],
      'date' => date("d-m-Y H:m:s")
    ]);
    if($ok) {
      header("Location: ?page=post.show&id=".$app->getDb()->lastInsertId());
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
   <button type="submit" class="btn btn-primary">Add</button>
 </form>
