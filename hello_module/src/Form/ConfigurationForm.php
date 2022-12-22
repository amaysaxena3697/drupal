<?php

namespace Drupal\hello_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *  Class ConfigurationForm
 */

 class ConfigurationForm extends ConfigFormBase
 {
    /**
     *   {inheritDoc}
     */
    protected function getEditableConfigNames()
    {
        return[
            'hello_module.settings',
        ];
    }
    /**
     * {@inheritDoc}
     */
    public function getFormId()
    {
        return 'hello_module';
    }
    /**
     * {@inheritDoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $config = $this->config('welcome_module.welcome_module');
        $form['Student Name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Student Name:'),
            '#maxlength' => 30,
            '#size' => 35,
            '#default_value' => $config->get('Student Name'),
        ];
        
        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => t('Save Configuration')
        );

        return $form;
    }
    /**
     *  {@inheritDoc}
     */
    
    public function submitForm(array &$form, FormStateInterface $fom_state)
    {
        parent::submitForm($form, $form_state);

        $this->config('hello_module.hello_module')
          ->set('key', $form_state->getValue('key'))
          ->save();
    } 
 }