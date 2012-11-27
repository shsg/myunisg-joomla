<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');

class EventViewAttachement extends JView
{
  public function display($tpl = null) 
  {
     // Check for errors.
    if (count($errors = $this->get('Errors'))) 
    {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }

	$model = $this->getModel();
	
	$id = JRequest::getInt('id', -1);
	
	if($id > 0)
	{	
		$this->id = $id;
		$this->attachement = $model->getAttachement($id);

		JToolBarHelper::title(JText::_('COM_EVENT_ADMIN_MENU_EVENT'));    
		
		if($this->attachement != null)
		{
			JToolBarHelper::custom('attachement.delete', 'delete', 'delete', 'COM_EVENT_ADMIN_DELETE_ATTACHEMENT', false, false);
		}
		JToolBarHelper::custom('attachement.save', 'upload', 'upload', 'COM_EVENT_ADMIN_UPLOAD_ATTACHEMENT', false, false);
		JToolBarHelper::divider();
		JToolBarHelper::cancel('attachement.close', 'JTOOLBAR_CLOSE');

		JSubMenuHelper::addEntry(JText::_('COM_EVENT_ADMIN_MENU_EVENT'), 'index.php?option=com_event&task=event.edit&layout=edit&id=' . $id, false);
		JSubMenuHelper::addEntry(JText::_('COM_EVENT_ADMIN_MENU_EVENT_UPLOAD'), 'index.php?option=com_event&task=attachement.view&id=' . $id, true);
		
		parent::display($tpl);
	}
  }
}
