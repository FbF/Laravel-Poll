<?php

return array(

  /**
   * Model title
   *
   * @type string
   */
  'title' => 'Polls',

  /**
   * The singular name of your model
   *
   * @type string
   */
  'single' => 'poll',

  /**
   * The class name of the Eloquent model that this config represents
   *
   * @type string
   */
  'model' => 'Fbf\LaravelPoll\Poll',

  /**
   * The columns array
   *
   * @type array
   */
  'columns' => array(
    'question' => array(
      'title' => 'Question'
    ),
    'active' => array(
      'title' => 'Active'
    ),
    'updated_at' => array(
        'title' => 'Updated',
    ),
  ),

  /**
   * The edit fields array
   *
   * @type array
   */
  'edit_fields' => array(
    'question' => array(
      'title' => 'Question',
      'type' => 'text',
    ),
    'answer1' => array(
      'title' => 'First Answer',
      'type' => 'text',
    ),
    'answer2' => array(
        'title' => 'Second Answer',
        'type' => 'text',
	),
    'answer3' => array(
        'title' => 'Third Answer',
        'type' => 'text',
    ),
    'active' => array(
        'title' => 'Active',
        'type' => 'bool',
    ),
    'created_at' => array(
      'title' => 'Created',
      'type' => 'datetime',
      'editable' => false,
    ),
    'updated_at' => array(
      'title' => 'Updated',
      'type' => 'datetime',
      'editable' => false,
    ),
  ),

  /**
   * The filter fields
   *
   * @type array
   */
  'filters' => array(
     'question' => 'required',
     'answer1' => 'required',
     'answer2' => 'required',
     'answer3' => 'required',
  ),

  /**
   * The width of the model's edit form
   *
   * @type int
   */
  'form_width' => 500,

  /**
   * The validation rules for the form, based on the Laravel validation class
   *
   * @type array
   */
  'rules' => array(
  ),

  /**
   * The sort options for a model
   *
   * @type array
   */
  'sort' => array(
    'field' => 'updated_at',
    'direction' => 'desc',
  )
);