<?php
  namespace Core\HTML;

  use Core\HTML\Form;

  class BootstrapForm extends Form
  {
    public function surround($html) {
      return "<div class='form-group'>{$html}</div>";
    }

    public function input($name, $label, $settings = []) {
      $type = (isset($settings['type'])) ? $settings['type'] : 'text';
      $label = "<label>".$label."</label> ";
      $input = "<input class='form-control' type='{$type}' name='{$name}' value='{$this->getValue($name)}'>";
      return $this->surround($label.$input);
    }

    public function textarea($name, $label, $ettings = []) {
      $label = "<label>".$label."</label> ";
      $area = "<textarea class='form-control' name='{$name}'>{$this->getValue($name)}</textarea>";
      return $this->surround($label.$area);
    }

    public function submit($name) {
      return $this->surround("<button type='submit' class='btn btn-primary'>Submit</button>");
    }

    public function select($name, $label, $options){
      $label = "<label>".$label."</label> ";
      $select = "<select class='form-control class='form-control' name='{$name}'>";
      foreach ($options as $key => $value) {
        $attributes = '';
        if($key === $this->getValue($name)){
          $attributes = ' selected ';
        }
        $select .= "<option value='{$key}' {$attributes}>{$value}</option>";
      }
      $select .= "</select>";

      return $this->surround($label.$select);
    }
  }

 ?>
