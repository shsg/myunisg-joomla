<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import joomla controller library
jimport('joomla.application.component.controller');

JLoader::register('ShsgvoteHelper', JPATH_COMPONENT . DS . 'helpers' . DS . 'helper.php');

// Get an instance of the controller prefixed by HelloWorld
$controller = JController::getInstance('shsgvote');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
