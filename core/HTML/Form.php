<?php
  namespace Core\HTML;

  class Form
  {
    /**
     *  @var array data
     *  @var string $tag
     */
    private $data;
    private $tag = 'p';

    function __construct($data = array()) {
        $this->data = $data;
    }

    public function surround($html) {
      return "<{$this->tag}>".$html."</{$this->tag}>";
    }

    public function getValue($index) {
      if(is_object($this->data)) {
        return isset($this->data->$index) ? $this->data->$index : null;
      }
      if(is_array($this->data)) {
        return isset($this->data[$index]) ? $this->data[$index] : null;
      }
    }

    public function input($name, $label, $settings = []) {
      $type = (isset($settings['type'])) ? $settings['type'] : 'text';
      return $this->surround("<label>". $label . "</label> <input type='{$type}' name='".$name."' value='".$this->getValue($name)."'>");
    }

    public function submit($name) {
      return $this->surround("<button type='submit'>Submit</button>");
    }

  }

 ?>
