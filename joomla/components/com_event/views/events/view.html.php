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

		$items = $this->get('Items');
		if(!is_array($items))
			$items = array();
		
		$currentItems = array();
		foreach($items as $i => $item)
		{
			if($item->is_running == 1)
			{
				$currentItems[] = $item;
				unset($items[$i]);
			}
		}
    
		$this->categories = $model->getCategories();
		$this->clubs = $model->getClubs();
		
		$this->items = $items;
		$this->currentItems = $currentItems;
		
		// Display the view
		parent::display($tpl);
	}
}
