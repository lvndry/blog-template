<?php

  namespace Core\Auth;

  use Core\Database\Database;

  class DbAuth
  {

    function __construct(Database $db)
    {
      $this->db = $db;
    }

    public function login($username, $password) {
      $user = $this->db->prepare("SELECT * FROM users WHERE username = ?", [$username], null, true);
      if($user) {
        if($user->password === sha1($password)) {
          $_SESSION['auth'] = $user->id;
          return true;
        }
      }
      return false;
    }

    public function getUserId(){
      if($user->logged()) return $_SESSION['auth'];
      else return false;
    }
    public function logged(){
      return isset($_SESSION['auth']);
    }
  }

 ?>
