<?php

/**
* @file providing the service
*
*/


namespace Drupal\welcome_module;

use Drupal\Core\Datetime\DateFormatterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

  
class HelloWorldServices  {
/**
* The current user.
*
* @var \Drupal\Core\Session\AccountInterface
*/
protected $currentUser;

 /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;
 
/**
* Constructs a new UserLoginForm.
** @param \Drupal\Core\Session\AccountProxyInterface $current_user
*   The current user
*/

public function __construct(AccountProxyInterface $current_user,
EntityTypeManagerInterface $entity_type_manager) {
    $this->currentUser = $current_user;  
    $this->entityTypeManager = $entity_type_manager;
}
    public function sayHello($id){
        if (empty($currentuser)){
            $user =  $this->entityTypeManager->getStorage('user')->load($id);
           
           return $user->get('name')->value;
           
        }  
    }
}