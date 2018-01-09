<?php
  namespace App\Controller;

  use Core\Controller\Controller;

  class AppController extends Controller
  {
    protected $template = 'templates/default';

    public function __construct() {
      $this->viewpath = ROOT.'/view/';
    }
  }

 ?>
