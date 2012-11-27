<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');

class EventViewEvent extends JView
{
  public function display($tpl = null) 
  {
	$id = JRequest::getInt('id', -1);
	if($id != -1)
	{
		if(!EventPermissionHelper::isUserAllowedtoEditEvent($id))
		{
			JError::raiseError(403, JText::_('COM_EVENT_ADMIN_EVENT_NOT_EDITABLE'));
			return;
		}
	}
	
    // get the Data
    $form = $this->get('Form');
    $item = $this->get('Item');

     // Check for errors.
    if (count($errors = $this->get('Errors'))) 
    {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }

    // Assign the Data
    $this->form = $form;
    $this->item = $item;

    JToolBarHelper::title(JText::_('COM_EVENT_ADMIN_MENU_EVENT'));    
    JToolBarHelper::apply('event.apply', 'JTOOLBAR_APPLY');
    JToolBarHelper::cancel('event.cancel', $this->item->id > 0 ? 'JTOOLBAR_CLOSE' : 'JTOOLBAR_CANCEL');
	
	if($id > 0)
	{
		JSubMenuHelper::addEntry(JText::_('COM_EVENT_ADMIN_MENU_EVENT'), 'index.php?option=com_event&task=event.edit&layout=edit&id=' . $id, true);
		JSubMenuHelper::addEntry(JText::_('COM_EVENT_ADMIN_MENU_EVENT_UPLOAD'), 'index.php?option=com_event&task=attachement.view&id=' . $id, false);
	}

    parent::display($tpl);
  }
}
