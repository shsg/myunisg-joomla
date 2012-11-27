<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');

class ClubViewClub extends JView
{
  public function display($tpl = null) 
  {
    // get the Data
    $form = $this->get('Form');
    $item = $this->get('Item');

    if(!ClubPermissionChecker::checkEditPermission($item->id))
    {
      JError::raiseWarning(404, JText::_('Access denied'));
      return false;
    }

    // Check for errors.
    if (count($errors = $this->get('Errors'))) 
    {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }
    // Assign the Data
    $this->form = $form;
    $this->item = $item;

    $isNew = ($this->item->id == 0);

    $sub = JRequest::getString('sub', 'none');
    switch($sub)
    {
      case 'logo':
        parent::display('logo');
        JToolBarHelper::custom('club.setLogo', 'upload', 'upload', 'COM_CLUB_ADMIN_ACTION_LOGO_UPLOAD', false);

        if($this->item->file_logo != '')
          JToolBarHelper::custom('club.deleteLogo', 'trash', 'trash', 'COM_CLUB_ADMIN_ACTION_LOGO_DELETE', false);
  
        JToolBarHelper::cancel('club.cancel', 'JTOOLBAR_CLOSE');
        break;
      case 'const':
        parent::display('const');
        JToolBarHelper::custom('club.setConstitution', 'upload', 'upload', 'COM_CLUB_ADMIN_ACTION_CONST_UPLOAD', false);

        if($this->item->file_constitution != '')
          JToolBarHelper::custom('club.deleteConstitution', 'trash', 'trash', 'COM_CLUB_ADMIN_ACTION_CONST_DELETE', false);

        JToolBarHelper::cancel('club.cancel', 'JTOOLBAR_CLOSE');
        break;
      default:
        parent::display($tpl);
        JToolBarHelper::save('club.save', 'COM_CLUB_ADMIN_ACTION_SAVE');
        JToolBarHelper::cancel('club.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    }
    
    if(!$isNew)
    {
      JSubMenuHelper::addEntry(JText::_('COM_CLUB_ADMIN_MENU_CLUB_BASIC'), 'index.php?option=com_club&view=club&layout=edit&id=' . $this->item->id, $sub == 'none');
      JSubMenuHelper::addEntry(JText::_('COM_CLUB_ADMIN_MENU_CLUB_LOGO'), 'index.php?option=com_club&view=club&sub=logo&layout=edit&id=' . $this->item->id, $sub == 'logo');
      JSubMenuHelper::addEntry(JText::_('COM_CLUB_ADMIN_MENU_CLUB_CONST'), 'index.php?option=com_club&view=club&sub=const&layout=edit&id=' . $this->item->id, $sub == 'const');  
    }

    JToolBarHelper::title($isNew ? JText::_('COM_CLUB_ADMIN_TITLE_CLUB_CREATE') : JText::_('COM_CLUB_ADMIN_TITLE_CLUB_EDIT'), 'club');
  }
}
