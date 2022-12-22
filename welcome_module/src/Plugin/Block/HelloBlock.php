<?php

namespace Drupal\welcome_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 *   category = @Translation("Hello World"),
 * )
 */
class HelloBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $build = [
      '#markup' => '<p class="node__links">' . $this->t('Hello, Amay') . '</p>',
    ];
    $build['#attached']['library'][] =  'welcome_module/myform';
    return $build;
  }

}