<?php
    /**
     *
     */
    class CarFactory extends AnotherClass
    {
      public static function getCar($type){
        $type = ucfirst($type);
        $className = "Car".$type;
        return new Car($className);
      }
    }

 ?>
