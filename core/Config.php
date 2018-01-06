<?php

 namespace Core;

  class Config
  {

    private $settings = array();
    private static $_instance;

    function __construct($file)
    {
        $this->settings = require($file);
    }

    public static function _getInstance($file) {
      if(self::$_instance === null) {
        self::$_instance = new Config($file);
      }
      return self::$_instance;
    }

    public function get($key) {
        return (isset($key)) ? $this->settings[$key] : null;
    }
  }

 ?>
