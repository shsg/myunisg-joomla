<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.application');
jimport('joomla.application.component.view');

class ClubViewClubs extends JView
{
	function display($tpl = null) 
	{
    $items = $this->get('Items');
    $pagination = $this->get('Pagination');

    // Check for errors.
    if (count($errors = $this->get('Errors'))) 
    {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
    }
    // Assign data to the view
    $this->items = $items;
    $this->pagination = $pagination;

    JToolBarHelper::title(JText::_('COM_CLUB_ADMIN_MENU_CLUBS'), 'club');    
    JToolBarHelper::editList('club.edit');
    

    if(ClubPermissionChecker::isAdminUser())
    {
      JToolBarHelper::addNew('club.add');
      JToolBarHelper::deleteList('', 'clubs.delete');
      JToolBarHelper::divider();
		  JToolBarHelper::preferences('com_club');
    }
    // Display the template
    parent::display($tpl);
	}
}
