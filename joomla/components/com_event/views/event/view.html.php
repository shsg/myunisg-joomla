<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport( 'joomla.application.application' );
jimport('joomla.application.component.view');

class EventViewEvent extends JView
{
	function display($tpl = null) 
	{
		$app	= &JFactory::getApplication();
		$doc =& JFactory::getDocument();

		$model = $this->getModel();
		$id = JRequest::getInt('id', -1);
		
		if($id != -1)
		{
			$event = $model->getEvent($id);
			if($event != null)
			{
				$this->event = $event;
				$pathway = $app->getPathway();
				$pathway->addItem($this->event->name);
				parent::display($tpl);
			} else 
			{
				JError::raiseWarning(404, 'Not found');
			}
		}
	}
}
