<?php

namespace Drupal\welcome_module\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CustomForm extends FormBase {
  public function getFormId(){
      return 'custom_form_id';
  } 
  
  public function buildForm(array $form, FormStateInterface $form_state){
    $form['email'] = array(
        '#title' => '<p class="ab">' . $this->t('Email Address') . '</p>',
        '#type' =>  'textfield',
        '#size' => 45,
        '#required' =>  TRUE,
        '#description'  => t('Registration Form'),
    );
    $form['student_phone'] = array (
        '#type' => 'tel',
        '#title' => t('Enter Contact Number'),
        '#size' => 15,
      );
      
      $form['gender'] = array(
        '#type' => 'radios',
        '#title' => t('Gender'),
        /*'#description' => t('Select a method for deleting annotations.'),*/
        '#options' => array('Male' => 'Male', 'Female' => 'Female' , 'Other' => 'Other'),
        '#default_value' => 'Other',
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
    $form['Select_Cast'] = array (
        '#type' => 'select',
        '#title' => ('Select Cast:'),
        '#options' => array(
          'GEN' => t('GENERAL'),
          'OBC' => t('Other Backward Class'),
          'Other' => t('Other'),
        ),
      );
      $form['student_dob'] = array (
        '#type' => 'date',
        '#title' => t('Enter DOB:'),
        '#required' => TRUE,
      );
      $form['text area'] = array(
        '#type' => 'text_format',
        '#title' => t('Important Achivements About Yourself'),
        '#weight' => 0,
      );
      $form['high_school']['tests_taken'] = array(
        '#type' => 'checkboxes',
        '#options' => array('SAT' => $this->t('REGULAR'), 'ACT' => $this->t('PRIVATE')),
        '#title' => $this->t('Academic Admission Type'),
    );
    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => t('submit'),
    );
   

    return $form;

  }
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if(strlen($form_state->getValue('student_phone')) < 10) {
        $form_state->setErrorByName('student_phone', $this->t('Please enter a valid 10-digit Contact Number'));
      }
    }
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
   \Drupal::messenger()->addMessage(t("Student Registration Done Sucessfully!!"));
   
  }

}