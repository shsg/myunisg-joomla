<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

class EventController extends JController
{
	function display()
	{

		$profiler = new JProfiler;
		$app = &JFactory::getApplication();

		JRequest::setVar('view', JRequest::getCmd('view', 'events'));

		parent::display();
 		#$app->enqueueMessage($profiler->mark(' Verarbeitungszeit'));
  }
}

