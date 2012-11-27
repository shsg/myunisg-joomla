<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelform library
jimport('joomla.application.component.modeladmin');
 
class EventModelEvent extends JModelAdmin
{
  public function getTable($type = 'Event', $prefix = 'EventTable', $config = array()) 
  {
    return JTable::getInstance($type, $prefix, $config);
  }

  public function getForm($data = array(), $loadData = true) 
  {
    // Get the form.
    $form = $this->loadForm('com_event.event', 'event', array('control' => 'jform', 'load_data' => $loadData));
    if (empty($form)) 
    {
      return false;
    }
    return $form;
  }

  protected function loadFormData() 
  {
    // Check the session for previously entered form data.
    $data = JFactory::getApplication()->getUserState('com_event.edit.event.data', array());
    if (empty($data)) 
    {
      $data = $this->getItem();
    }
    return $data;
  }
}
