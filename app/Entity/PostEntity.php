<?php

    namespace App\Entity;

    use Core\Entity\Entity;

    class PostEntity extends Entity
    {
      public function getUrl(){
        return 'index.php?page=post.show&id='. $this->id;
      }

      public function getPreview(){
        $html = '<p>'. substr($this->content, 0, 200). '</p>';
        $html .= '<p><a href="'. $this->getUrl() .'"> Voir la suite </a></p>';

        return $html;
      }
    }

 ?>
