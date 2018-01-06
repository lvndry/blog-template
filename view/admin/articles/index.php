<?php
  $app = App::getInstance();
  $posts = $app->getTable('Post')->getAll();
 ?>
  <h1> <small>Admin Page</small></h1>
  <table class="table">
    <thead>
      <tr>
        <td>Id</td>
        <td>Title</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($posts as $post): ?>
        <tr>
          <td> <?= $post->id ?> </td>
          <td> <?= $post->title ?> </td>
          <td>
            <a class="btn btn-primary" href="?page=post.edit&id=<?=$post->id ?>">Edit</a>
          </td>
        </tr>
    <?php endforeach ?>
    </tbody>
  </table>
