<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controlleradmin');
require_once JPATH_COMPONENT . DS . 'controllers' . DS . 'attachement.php'; 

class EventControllerEvents extends JControllerAdmin
{
	public function publish()
	{
		JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));

		$cid	= JRequest::getVar('cid', array(), '', 'array');
		JArrayHelper::toInteger($cid);

		$task = JRequest::getString('task', 'none');

		$model = $this->getModel('Events');

		if($task == 'publish')
		{
			$model->showEvents($cid);
		} else {
			$model->hideEvents($cid);
		}

		$this->setRedirect(JRoute::_('index.php?option=com_event&view=events', false));
	}
}
