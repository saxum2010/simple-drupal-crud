<?php
namespace Drupal\my_module\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the MyEntity entity.
 *
 * @ContentEntityType(
 *   id = "my_entity",
 *   label = @Translation("My entity"),
 *   base_table = "my_entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *   },
 * )
 */
class MyEntity extends ContentEntityBase {

  public function getName() {
    return $this->get('name')->value;
  }

  public function setName($name) {
    $this->set('name', $name);
  }

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the MyEntity entity.'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the MyEntity entity.'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the MyEntity entity.'))
      ->setRequired(TRUE)
      ->setSetting('max_length', 255);

    return $fields;
  }
}
