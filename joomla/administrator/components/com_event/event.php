<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import joomla controller library
jimport('joomla.application.component.controller');

#JLoader::register('SimpleImage', JPATH_COMPONENT . DS . 'helpers' . DS . 'SimpleImage.php');
#JLoader::register('ClubPermissionChecker', JPATH_COMPONENT . DS . 'helpers' . DS . 'PermissionChecker.php');
JLoader::register('EventHelper', JPATH_COMPONENT . DS . 'helpers' . DS . 'event.php');
JLoader::register('EventImageHelper', JPATH_COMPONENT . DS . 'helpers' . DS . 'image.php');
JLoader::register('JFormFieldEventClubs', JPATH_COMPONENT . DS . 'models' . DS . 'fields' . DS . 'event.php');
JLoader::register('JFormFieldEventDateTime', JPATH_COMPONENT . DS . 'models' . DS . 'fields' . DS . 'event.php');

JLoader::register('EventPermissionHelper', JPATH_COMPONENT . DS . 'helpers' . DS . 'permission.php');


// Set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-48-generic {background-image: url(../media/com_event/images/icon48.png) !important;}');

// TODO Check permissions
$controller = JController::getInstance('Event');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));


$view = JRequest::getString('view', 'none');
if($view == 'events' || $view == 'categories')
{
	EventHelper::addSubmenu($view);
}
// Redirect if set by the controller
$controller->redirect();
