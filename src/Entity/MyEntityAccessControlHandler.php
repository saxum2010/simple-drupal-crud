<?php

namespace Drupal\my_module\Entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Access control handler for the MyEntity entity.
 */
class MyEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\my_module\Entity\MyEntityInterface $entity */

    switch ($operation) {
      case 'view':
        return $entity->access('view', $account);

      case 'update':
        return $entity->access('update', $account);

      case 'delete':
        return $entity->access('delete', $account);
    }

    return parent::checkAccess($entity, $operation, $account);
  }
}
