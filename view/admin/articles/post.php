<?php
$id = $_GET['id'];

$app = App::getInstance();

$post = $app->getTable('Post')->getOneById($id);

if($post === false ){
  $app->Error404();
}
$app->title = $post->title;
 ?>

 <h1>
   <?= $post->title ?>
  </h1>
  <h3> <em>  <?= $post->categorie ?> </em> </h3>
 <p>
 <?= $post->content ?>
</p>
<footer>
  <span>
    Publié le: <?= $post->date ?>
  </span>
</footer>
