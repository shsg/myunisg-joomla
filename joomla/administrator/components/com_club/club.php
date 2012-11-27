<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import joomla controller library
jimport('joomla.application.component.controller');

JLoader::register('SimpleImage', JPATH_COMPONENT . DS . 'helpers' . DS . 'SimpleImage.php');
JLoader::register('ClubPermissionChecker', JPATH_COMPONENT . DS . 'helpers' . DS . 'PermissionChecker.php');
JLoader::register('ClubSubMenuHelper', JPATH_COMPONENT . DS . 'helpers' . DS . 'SubMenuHelper.php');

// Set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-48-club {background-image: url(../media/com_club/images/icon48.png);}');

// TODO Check permissions
$controller = JController::getInstance('Club');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
