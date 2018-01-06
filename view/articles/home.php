<!--
// $db = pg_connect("host=localhost dbname=blog user=postgres password=adminboat");

function Insert()
{
    $db = new App\Database('blog');
    $count = $db->query("INSERT INTO article (title, date) VALUES ('Title', '".date('d-m-Y H:i:s') ."')");
    var_dump($count);
    //$count = $db->exec("INSERT INTO article (title, date) VALUES ('Title', '".date('Y-m-d H:i:s') ."')");
    // $query = "INSERT INTO article (title, date) VALUES ('title', '".date('Y-m-d H:i:s')."')";
    // $res = pg_query($db, $query);
}

function getArticles()
{
    // $db = new PDO("pgsql:dbname=blog;host=localhost", "postgres", "adminboat");
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db = new App\Database('blog');
    $query = "Select * FROM article";
    $data = $db->query($query);
    var_dump($data);
    var_dump($data[0]);
    var_dump($data[0]->title);
}
getArticles();
 -->
<div class="row">
  <div class="col-sm-7">
    <?php foreach (App::getInstance()->getTable('Post')->getLast() as $post): ?>
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
