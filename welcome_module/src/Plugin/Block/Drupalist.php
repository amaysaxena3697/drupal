<?php

namespace Drupal\welcome_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Provides a 'Drupalist' block.
 *
 * @Block(
 *  id = "drupalist",
 *  admin_label = @Translation("Drupalist"),
 * )
 */
class Drupalist extends BlockBase implements ContainerFactoryPluginInterface {
  
  /**
   * @var AccountInterface $account
   */
  protected $account;

   /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param \Drupal\Core\Session\AccountInterface $account
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, AccountInterface $account, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->account = $account;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_user'),
      $container->get('entity_type.manager')
    );
  }
  
  /**
   * {@inheritdoc}
   */
  
  public function build() {
    $build = [];
    $build =[];
    $node = $this->entityTypeManager->getStorage('node')->load(13);
   
    $build['drupalist_activate_block']['#markup'] = '<p class="drupal_list">Your user Name is ' . $this->account->getDisplayName() .' and this uers has created a content whose title is ' . $node->title->value .' </p>';
    $build['#attached']['library'][] =  'welcome_module/myform';

    return $build;
  }

} 