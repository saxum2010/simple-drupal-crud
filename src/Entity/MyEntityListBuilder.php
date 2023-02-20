<?php
namespace Drupal\my_module\Entity;

use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Link;

/**
 * Provides a list controller for the MyEntity entity.
 */
class MyEntityListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('ID');
    $header['name'] = $this->t('Name');
    $header['operations'] = $this->t('Operations');

    return $header;
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['id'] = $entity->id();
    $row['name'] = $entity->getName();
    $row['operations']['data'] = [
      '#type' => 'operations',
      '#links' => [
        'edit' => [
          'title' => $this->t('Edit'),
          'url' => $entity->toUrl('edit-form'),
        ],
        'delete' => [
          'title' => $this->t('Delete'),
          'url' => $entity->toUrl('delete-form'),
        ],
      ],
    ];

    return $row;
  }
}
