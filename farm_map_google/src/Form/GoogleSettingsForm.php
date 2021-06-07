<?php

namespace Drupal\farm_map_google\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a google maps settings form.
 */
class GoogleSettingsForm extends ConfigFormbase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'farm_map_google.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'farm_map_google_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateinterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Google Maps API Key'),
      '#description' => $this->t('Google Maps layers require that you obtain an API key. Refer to the <a href="@doc">API Keys</a> documentation on farmOS.org for instructions.', ['@doc' => 'https://farmos.org/hosting/apikeys/']),
      '#default_value' => $config->get('api_key'),
    ];

    return parent::buildForm($form, $form_state);

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->configFactory->getEditable(static::SETTINGS)
      ->set('api_key', $form_state->getValue('api_key'))
      ->save();

    // Clear library cache after saving a new google api key.
    // This is necessary because the api key is used in the url defined with the
    // google maps api library. This triggers the url to be rebuilt.
    \Drupal::service('library.discovery')->clearCachedDefinitions();

    parent::submitForm($form, $form_state);
  }

}
