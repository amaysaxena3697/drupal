<?php
namespace Drupal\hello_module\Controller;

class HelloController {
   public function hello () {
     return array(
        '#markup' => 'Namaste!!!! Welcome to our Website.'
     );
   } 
}

