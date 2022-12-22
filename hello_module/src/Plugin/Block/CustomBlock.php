<?php

namespace Drupal\hello_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provies a 'Custom' Block.
 * 
 * @Block(
 *   id = "custom_block",
 *   admin_label = @Translation("Custom block"),
 *   category = @Translation("Custom World"),
 * )
 */
class CustomBlock extends BlockBase{

    /**
     * {@inheritdoc}
    */
    public function build() {
      return [
        '#markup' => $this->t('Custom Block'),
      ];
    }
}