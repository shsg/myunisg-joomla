<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelform library
jimport('joomla.application.component.modeladmin');
 
class ClubModelClub extends JModelAdmin
{
  public function getTable($type = 'Club', $prefix = 'ClubTable', $config = array()) 
  {
    return JTable::getInstance($type, $prefix, $config);
  }

  public function getForm($data = array(), $loadData = true) 
  {
    // Get the form.
    $form = $this->loadForm('com_club.club', 'club', array('control' => 'jform', 'load_data' => $loadData));
    if (empty($form)) 
    {
      return false;
    }
    return $form;
  }

  protected function loadFormData() 
  {
    // Check the session for previously entered form data.
    $data = JFactory::getApplication()->getUserState('com_club.edit.club.data', array());
    if (empty($data)) 
    {
      $data = $this->getItem();
    }
    return $data;
  }

  public function updateClubLogo($id, $filename)
  {
    $db = JFactory::getDbo();

    $updateItem = new stdclass;
    $updateItem->id = $id;
    $updateItem->file_logo = $filename;

    $db->updateObject('#__clubs', $updateItem, 'id');
  }

  public function updateClubConst($id, $filename)
  {
    $db = JFactory::getDbo();

    $updateItem = new stdclass;
    $updateItem->id = $id;
    $updateItem->file_constitution = $filename;

    $db->updateObject('#__clubs', $updateItem, 'id');
  }

  public function getClubUserManagerId($id)
  {
    $db = JFactory::getDbo();
    
    $query = $db->getQuery(true);
		$query->select('id, manager_user_id');
		$query->from('#__clubs');
		$query->where('id = ' . $id);
		$db->setQuery((string)$query);

    $queryResult = $db->query();
		if($queryResult)
		{
			$club = $db->loadObject();
      if($club)
      {
        return $club->manager_user_id;
      }
		}
    return -1;
  }
}
