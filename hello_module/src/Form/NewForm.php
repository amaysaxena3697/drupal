<?php

namespace Drupal\hello_module\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class NewForm extends FormBase {
   public function getFormId(){
       return 'new_form_id';
   } 

   public function buildForm(array $form, FormStateInterface $form_state){
    $form['email'] = array(
        '#title' => '<p class="xy">' . $this->t('Email Address') . '</p>',
        '#type' => 'textfield',
        '#size' => '45',
        '#required' => TRUE,
        '#description' => t('Registration Form')
    );

    $form['student_dob'] = array (
        '#type' => 'date',
        '#title' => t('Enter DOB:'),
        '#required' => TRUE,
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('submit'),
    );
    return $form;
   }
   public function submitForm(array &$form, FormStateInterface $form_state)
  {
   \Drupal::messenger()->addMessage(t("Student Registration Procedure Has Finished Now !!"));
   
  }
}
