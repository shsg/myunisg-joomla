<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport( 'joomla.application.application' );
jimport('joomla.application.component.view');

class EventViewEvents extends JView
{
	function display($tpl = null) 
	{
		$app	= &JFactory::getApplication();
		$doc =& JFactory::getDocument();

		$model = $this->getModel();
		//$items = $model->getTotal();
		
		$items = $this->get('Items');
    
		$this->categories = $model->getCategories();
		$this->clubs = $model->getClubs();
		
		$this->items = $items;
		// Display the view
		parent::display('rss');
	}
}
