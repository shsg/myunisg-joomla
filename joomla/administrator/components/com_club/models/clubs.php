<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');

class ClubModelClubs extends JModelList
{
  public function hideClubs($ids)
  {
    $db = JFactory::getDbo();
    
		$db->setQuery("UPDATE #__clubs SET record_visible='N' WHERE id IN(" . implode(',', $ids) . ")" );
		$db->query();
  }

  public function showClubs($ids)
  {
    $db = JFactory::getDbo();
    
		$db->setQuery("UPDATE #__clubs SET record_visible='Y' WHERE id IN(" . implode(',', $ids) . ")" );
		$db->query();
  }

  protected function getListQuery()
  {
    // Create a new query object.         
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('c.id, c.name, c.category_id, cat.title as category_title, c.email, c.website, c.manager_user_id, u.name as user_fullname, u.username as user_loginname, c.record_visible, c.file_logo');
    $query->from('#__clubs c');
    
    if(!ClubPermissionChecker::isAdminUser())
    {
      $user	= JFactory::getUser();
      $query->where('c.manager_user_id = ' . (int) $user->id);
    }

    $query->leftjoin('#__users u ON (c.manager_user_id=u.id)');
    $query->leftjoin('(SELECT id,title FROM #__categories WHERE extension=\'com_club\') cat ON (c.category_id = cat.id)');
    $query->order('cat.title, c.name, c.id ASC');

    return $query;
  }
}
