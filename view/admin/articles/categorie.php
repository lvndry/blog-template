<?php
  $id = $_GET['id'];

  $app = App::getInstance();

  $categorie = $app->getTable('Categorie')->getName($id);
  $article = $app->getTable('Post')->getLastbyCat($id);
  $categories = $app->getTable('Categorie')->getAll();

  if($categorie === false ){
    $app->Error404();
  }

 ?>
 <h1> <small> <?= $categorie->name ?>s </small></h1>
 <div class="row">
   <div class="col-sm-7">
     <?php foreach ($article as $post): ?>
       <h2>
         <a href="<?= $post->url; ?>">  <?= $post->title; ?> </a>
         <p><em><?= $post->categorie ?></em></p>
       </h2>
       <p><?= $post->preview; ?></p>
     <?php endforeach; ?>
   </div>
   <div class="col-sm-4">
     <ul>
       <?php foreach ($categories as $category): ?>
         <li><a href="<?= $category->url ?>"><?=$category->title ?></a></li>
       <?php endforeach ?>
     </ul>
   </div>
 </div>
