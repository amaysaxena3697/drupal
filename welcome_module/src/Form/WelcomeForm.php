<?php

namespace Drupal\welcome_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *  Class WelcomeForm
 */

class WelcomeForm extends ConfigFormBase
{
    /**
     *  {inheritDoc}
     */
    protected function getEditableConfigNames()
    {
        return [
            'welcome_module.settings',
        ];
    }
    /**
     * {@inheritDoc} 
     */
    public function getFormId()
    {
        return 'welcome_module';
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
        
        $form['email'] = array(
            '#title' =>  t('Email Address'),
            '#type' =>  'textfield',
            '#size' => 45,
            '#required' =>  TRUE,
            '#description'  => t('Registration Form'),
        );
        
        $form['select_class'] = array (
            '#type' => 'select',
            '#title' => ('Select Class:'),
            '#options' => array(
              '1stClass' => t('First Class'),
              '2ndClass' => t('Second Class'),
              '3rdClass' => t('Third Class'),
            ),
          );
        
        $form['Student_Section']['Sections'] = array(
            '#type' => 'checkboxes',
            '#options' => array('SAT' => $this->t('A'), 'ACT' => $this->t('B')),
            '#title' => $this->t('Select Your Section'),
        );    

          $form['student_dob'] = array (
            '#type' => 'date',
            '#title' => t('Enter Your Date Of Birth:'),
            '#required' => TRUE,
          );
        
        $form['profile_image'] = array(
            '#type' => 'managed_file',
            '#title' => t('Upload Image '),
            '#upload_validators' => array(
                'file_validate_extensions' => array('gif png jpg jpeg'),
                'file_validate_size' => array(25600000),
            ),
            '#upload_location' => 'public://profile-pictures',
            '#required' => TRUE,
        );  
        
        $form['options'] = array(
            '#type' => 'radios',
            '#title' => t('Various Options by Checkbox'),
            '#options' => array(
              'key1' => t('Option One'),
              'key2' => t('Option Two'),
              'key3' => t('Option Three'),
              'key4' => t('Option Four'),
            ),
        );
        $form['gender'] = array(
            '#type' => 'radios',
            '#title' => t('Gender'),
            /*'#description' => t('Select a method for deleting annotations.'),*/
            '#options' => array('Male' => 'Male', 'Female' => 'Female' , 'Other' => 'Other'),
            '#default_value' => 'Other',
            '#required' => TRUE,
        );

        $form['terms'] = array(
            '#type' => 'checkbox',
            '#title' => t('I accept Terms and Conditions'),
        );

        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => t('Save Configuration'),
        );

        

        return $form;
    }

    /**
     *  {@inheritDoc}
     */

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        parent::submitForm($form, $form_state);

        $this->config('welcome_module.welcome_module')
            ->set('key', $form_state->getValue('key'))
            ->save();
    }
}    