<?php
  namespace Core\Controller;

  class Controller
  {
    protected $viewpath;
    protected $template;

    public function render($view, $variables = []){
      ob_start();
      $view = $this->viewpath. str_replace('.', '/', $view). '.php';
      extract($variables);
      require $view;
      $content = ob_get_clean();
      require $this->viewpath.$this->template.'.php';
    }
  }

 ?>
