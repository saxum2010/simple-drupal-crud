<?php
namespace Drupal\my_module\Form;

use Drupal\Core\Entity\ContentEntityDeleteForm;

/**
 * Provides a form for deleting a MyEntity entity.
 */
class MyEntityDeleteForm extends ContentEntityDeleteForm {

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete %name?', [
      '%name' => $this->entity->getName(),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return $this->entity->toUrl('collection');
  }

  /**
   * {@inheritdoc}
   */
  public function submit(array $form, array &$form_state) {
    $this->entity->delete();
    drupal_set_message($this->t('The My entity %name has been deleted.', [
    '%name' =>
      $this->entity->getName(),
    ]));
    $form_state['redirect_route'] = [
      'route_name' => 'entity.my_entity.collection',
    ];
 }
}