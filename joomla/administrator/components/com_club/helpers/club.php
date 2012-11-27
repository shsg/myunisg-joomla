<?php
// No direct access to this file
defined('_JEXEC') or die;
 
abstract class ClubHelper
{
	/**
	 * Configure Submenu. Used by com_categories
	 */
	public static function addSubmenu($submenu) 
	{

    JSubMenuHelper::addEntry(JText::_('COM_CLUB_ADMIN_MENU_CLUBS'), 'index.php?option=com_club', $submenu == 'clubs');
    JSubMenuHelper::addEntry(JText::_('COM_CLUB_ADMIN_MENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_club', $submenu == 'categories');
    
		$document = JFactory::getDocument();
    $document->addStyleDeclaration('.icon-48-categories {background-image: url(../media/com_club/images/icon48.png) !important;}');
    if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_CLUB_TITLE_CATEGORY'));
		}
	}
}
