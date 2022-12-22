<?php
namespace  Drupal\welcome_module\Controller;
class ServicesTest {
    public function content(){
        $service = \Drupal::service('welcome_module.hello');
        $testvar = $service->sayHello('hhh');
        print '<pre>';
        print_r($testvar);
        exit('Test');

    }

}