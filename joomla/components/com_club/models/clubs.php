<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modellist');

class ClubModelClubs extends JModelList
{
  protected function getListQuery()
  {
    // Create a new query object.         
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('c.id, c.name, c.category_id, cat.title as category_title, c.email, c.website, c.record_visible, c.year_founded, c.file_logo');
    $query->from('#__clubs c');
    $query->innerJoin('(SELECT id,title FROM #__categories WHERE extension=\'com_club\') cat ON (c.category_id = cat.id)');
    $query->where('c.record_visible = \'Y\'');
    $query->order('cat.title, c.name, c.id ASC');

    return $query;
  }
  
  function getAllClubs()
  {
      $query = self::getListQuery();
      $db = JFactory::getDBO();
      $db->setQuery($query);
      return $db->loadObjectList();
  }
}
