<div class="row">
  <div class="col-sm-7">
    <?php foreach ($posts as $post): ?>
      <h2>
        <a href="<?= $post->url; ?>">  <?= $post->title; ?> </a>
        <p><em><?= $post->categorie ?></em></p>
      </h2>
      <p><?= $post->preview; ?></p>
    <?php endforeach; ?>
  </div>
  <div class="col-sm-4">
    <ul>
      <?php foreach (App::getInstance()->getTable('Categorie')->getAll() as $categorie): ?>
        <li><a href="<?= $categorie->url ?>"><?=$categorie->title ?></a></li>
      <?php endforeach ?>
    </ul>
  </div>
</div>
