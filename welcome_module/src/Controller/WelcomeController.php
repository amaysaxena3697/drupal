<?php
namespace Drupal\welcome_module\Controller;

class WelcomeController {
  public function welcome() {
    return array(
      '#markup' => 'Hello! Welcome to our Website.'
    );
  }
}