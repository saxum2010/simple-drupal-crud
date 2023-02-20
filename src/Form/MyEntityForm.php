<?php
namespace Drupal\my_module\Form;

use Drupal\Core\Entity\ContentEntityForm;

/**
 * Form controller for the MyEntity entity edit forms.
 */
class MyEntityForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, array &$form_state) {
    $entity = $this->getEntity();
    $status = $entity->isNew() ? t('created') : t('updated');
    $entity->save();

    drupal_set_message($this->t('My entity %label has been %status.', [
      '%label' => $entity->label(),
      '%status' => $status,
    ]));

    $form_state['redirect_route'] = [
      'route_name' => 'entity.my_entity.collection',
    ];
  }
}
