<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.application');
jimport('joomla.application.component.view');
jimport( 'joomla.utilities.date' );

class EventViewEvents extends JView
{
	function display($tpl = null) 
	{
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;

		foreach($this->items as $item)
		{
			$beginDate = new JDate($item->date_begin);
			$beginDate = str_replace('00:00', '', $beginDate->toFormat('%d.%m.%Y %H:%M'));
			$endDate = '';
			if($item->date_end != '0000-00-00 00:00:00')
			{
				$endDate = new JDate($item->date_end);
				$endDate = ' - ' . str_replace('00:00', '', $endDate->toFormat('%d.%m.%Y %H:%M'));
			}

			$item->date_span = $beginDate . $endDate;
		}

		JToolBarHelper::title(JText::_('COM_EVENT_ADMIN_MENU_EVENTS'));    
		JToolBarHelper::editList('event.edit');

		JToolBarHelper::addNew('event.add');
		JToolBarHelper::deleteList('', 'events.delete');

		if(EventPermissionHelper::isAdminUser())
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_event');
		}

		// Display the template
		parent::display($tpl);
	}
}
