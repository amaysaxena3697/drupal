<?php

namespace Drupal\welcome_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilderInterface;

/**
 * Provides a 'WelcomeInfo' Block.
 *
 * @Block(
 *   id = "welcomeinfo_block",
 *   admin_label = @Translation("WelcomeinfoBlock"),
 *   category = @Translation("Information"),
 * )
 */

 class WelcomeInfoBlock extends BlockBase implements ContainerFactoryPluginInterface {
   protected $formBuilder;
   public function __construct(array $configuration, $plugin_id, $plugin_defination, FormBuilderInterface $formBuilder) {
     $this->formBuilder = $formBuilder;
   }
   public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_defination) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_defination,
      $container->get('form_builder')
    );
   }

   public function build() {
    $form = $this->formBuilder->getForm('Drupal\welcome_module\Form\CustomForm');
    return $form;
   }
 }