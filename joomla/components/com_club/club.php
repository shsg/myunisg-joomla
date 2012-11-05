<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import joomla controller library
jimport('joomla.application.component.controller');

#JLoader::register('ClubHelper', JPATH_COMPONENT . DS . 'helpers' . DS . 'verein.php');

// Get an instance of the controller prefixed by HelloWorld
$controller = JController::getInstance('Club');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
