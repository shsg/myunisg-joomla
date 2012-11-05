<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modellist');
jimport('joomla.utilities.date');

class EventModelEvent extends JModel
{
	public function getEvent($id)
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		
		$query->select('e.id, e.name, e.club_id, e.category_id, e.date_begin, e.date_end, e.place, e.description, club.name as club_name, cat.title as category_name');
		$query->from('#__events e');
		$query->where('e.record_visible = \'Y\'');
		$query->where('e.id = ' . (int)$id);
		$query->leftJoin('(SELECT id, title from #__categories WHERE extension=\'com_event\') cat ON (cat.id = e.category_id)');
		$query->leftJoin('#__clubs club ON (club.id = e.club_id)');
		$db->setQuery((string)$query);
		
		$result = $db->loadObject();
		
		if($result)
		{
			$result->date_begin = new JDate($result->date_begin);
			$result->date_end = new JDate($result->date_end);
			
			// empty date
			if($result->date_end < $result->date_begin)
				$result->date_end = null;
				
			$beginDate = new JDate($result->date_begin);
			$beginDate = str_replace(' 00:00', '', $beginDate->toFormat('%d.%m.%Y %H:%M'));
			$endDate = '';
			if($result->date_end != '0000-00-00 00:00:00')
			{
				$endDate = new JDate($result->date_end);
				$endDate = ' - ' . str_replace(' 00:00', '', $endDate->toFormat('%d.%m.%Y %H:%M'));
			}
			
			$result->date_span = $beginDate . $endDate;
			
			// load attachements
			$query = $db->getQuery(true);
			$query->select('id,name,link,type,link_thumb');
			$query->from('#__events_attachement');
			$query->where('id = ' . (int)$id);
			$db->setQuery((string)$query);
			
			$attachement = $db->loadObject();
			
			if($attachement)
			{
				$result->attachement = $attachement;
			} else 
			{
				$result->attachement = null;
			}
		}
		return $result;
	}
}