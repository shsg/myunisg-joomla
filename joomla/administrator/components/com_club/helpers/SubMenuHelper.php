<?php
defined('_JEXEC') or die('Restricted access');

class ClubSubMenuHelper
{
  public static function addClubsSubMenu($currentPage = 'clubs')
  {
    $view = JRequest::getString('view', 'clubs');

    if($view == 'clubs')
    {
      JSubMenuHelper::addEntry(JText::_('COM_CLUB_ADMIN_MENU_CLUBS'), 'index.php?option=com_club', $currentPage == 'clubs');
      JSubMenuHelper::addEntry(JText::_('COM_CLUB_ADMIN_MENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_club', $currentPage == 'categories');
    }
  }
}
