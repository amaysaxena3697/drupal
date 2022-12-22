<?php
namespace  Drupal\welcome_module\Controller;
class ServiceTest2 {
    public function content(){
        $service = \Drupal::service('welcome_module.hello');
        $user_name = $service->sayHello(2);
        $build['#markup'] = $user_name;
        return $build;

    }

}