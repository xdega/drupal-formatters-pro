<?php

namespace Drupal\text_formatter_pro\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class FormatterConfigForm extends ConfigFormBase
{

  /**
  
   * {@inheritdoc}
  
   */

  public function getFormId()
  {

    return 'formatter_config_form';
  }

  /**
  
   * {@inheritdoc}
  
   */

  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $form = parent::buildForm($form, $form_state);
    $config = $this->config('text_formatter_pro.settings');

    $form['slug_divider'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Slug Divider'),
      '#default_value' => $config->get('slug_divider'),
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
  
   * {@inheritdoc}
  
   */

  public function submitForm(array &$form, FormStateInterface $form_state)
  {

    $config = $this->config('text_formatter_pro.settings');
    $config->set('slug_divider', $form_state->getValue('slug_divider'));
    $config->save();

    return parent::submitForm($form, $form_state);
  }

  /**
  
   * {@inheritdoc}
  
   */

  protected function getEditableConfigNames()
  {
    return ['text_formatter_pro.settings'];
  }
}
