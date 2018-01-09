<?php
  $app = App::getInstance();
  $posts = $app->getTable('Post')->getAll();
 ?>
  <h1> <small>Admin Page</small></h1>
  <p>
    <a href="?page=post.add" class="alert alert-succes">Ajouter un article</a>
  </p>
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
            <form action="?page=post.delete" method="post" style="display:inline">
                <input name="id" type="hidden" value='<?=$post->id ?>'>
                <button class='btn btn-danger' type="submit" href="?page=post.delete&id=<?=$post->id ?>">Delete</button>
            </form>
          </td>
        </tr>
    <?php endforeach ?>
    </tbody>
  </table>
