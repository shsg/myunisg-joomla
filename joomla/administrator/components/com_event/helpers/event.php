<?php
// No direct access to this file
defined('_JEXEC') or die;

require_once(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_event' . DS . 'helpers' . DS . 'permission.php');
 
abstract class EventHelper
{
	/**
	 * Configure Submenu. Used by com_categories
	 */
	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(JText::_('COM_EVENT_ADMIN_MENU_EVENTS'), 'index.php?option=com_event', $submenu == 'events');
		
		if(EventPermissionHelper::isAdminUser())
		{
			JSubMenuHelper::addEntry(JText::_('COM_EVENT_ADMIN_MENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_event', $submenu == 'categories');
		}
		
		$document = JFactory::getDocument();
//		$document->addStyleDeclaration('.icon-48-categories {background-image: url(../media/com_club/images/icon48.png) !important;}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_EVENT_TITLE_CATEGORY'));
		}
	}
}
