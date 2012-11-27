<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
jimport('joomla.utilities.arrayhelper');

class EventControllerEvent extends JControllerForm
{
	public function edit()
	{
		$id = JRequest::getInt('id', -1);
		
		if($id != -1)
		{
			if(EventPermissionHelper::isUserAllowedtoEditEvent($id))
			{
				parent::edit();
			} else 
			{
				JError::raiseError(403, JText::_('COM_EVENT_ADMIN_EVENT_NOT_EDITABLE'));
				return;
			}
		} else 
		{
			parent::edit();
		}
	}
	
	public function display()
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
		parent::display();
	}
	
	public function save($key = null, $urlVar = null)
	{
		parent::save($key, $urlVar);
	}
}
