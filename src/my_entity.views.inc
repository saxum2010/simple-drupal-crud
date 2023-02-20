<?php

/**
 * @file
 * Provides views data for the MyEntity entity type.
 */

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides views data for the MyEntity entity type.
 */
class MyEntityViewsData extends EntityViewsData implements EntityViewsDataInterface {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['my_entity']['table']['group'] = $this->t('MyEntity');

    $data['my_entity']['name'] = [
      'title' => $this->t('Name'),
      'field' => [
        'id' => 'standard',
      ],
      'help' => $this->t('The name of the MyEntity entity.'),
    ];

    return $data;
  }
}