<?php
  use Core\Database\PgDatabase;
  use Core\Config;

  class App
  {
    private static $_instance;
    private $db;
    public $title = "lvndry";

    public static function load(){
        session_start();
        require ROOT.'/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT.'/core/Autoloader.php';
        Core\Autoloader::register();
    }

    public static function getInstance(){
      if(is_null(self::$_instance)){
        self::$_instance = new App();
      }
      return self::$_instance;
    }

    public function getDb(){
      $config = Config::_getInstance(ROOT. '/config/config.php');
      if($this->db === null) {
        $this->db = new PgDatabase($config->get('db_name'), $config->get('db_host'), $config->get('db_user'), $config->get('db_pass'));
      }
      return $this->db;
    }

    public function getTable($name) {
      $classename = "\\App\\Table\\" . ucfirst($name);
      return new $classename($this->getDb());
    }

    public function Error404() {
      header("HTTP/1.1 404 Not Found");
      header("Location: ?page=404");
    }

    public function forbidden() {
      header("HTTP/1.1 403 Forbidden");
      die("Acces Forbidden");
    }
  }

 ?>
