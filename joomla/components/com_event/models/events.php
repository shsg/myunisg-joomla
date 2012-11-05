<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modellist');
jimport('joomla.utilities.date');

class EventModelEvents extends JModelList
{
  protected function getListQuery()
  {
	// Can this be done somewhere else ?
	$categoryFilter = JRequest::getVar('categories', array());
	$clubFilter = JRequest::getVar('clubs', array());
	JArrayHelper::toInteger($categoryFilter);
	JArrayHelper::toInteger($clubFilter);
	
	$dateBegin = JRequest::getString('dateBegin', null);
	$dateEnd = JRequest::getString('dateEnd', null);
	$dateDaysInFuture = JRequest::getInt('dateFutureDays', 30);
	
    // Create a new query object.         
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
	$query->select('e.id, e.name, e.category_id, e.place, e.record_updated, e.description, cat.title as category_name, e.club_id, #__clubs.name as club_name, e.date_begin, e.date_end, ((date(date_begin) = date(now()) && date(date_end) < date(now())) || (date(now()) between date(date_begin) and date(date_end))) as is_running ');
	$query->from('#__events e');
	$query->innerJoin('(SELECT id, title FROM #__categories WHERE extension=\'com_event\') cat ON (e.category_id = cat.id)');
	$query->innerJoin('#__clubs ON (#__clubs.id = e.club_id)');
	$query->where('e.record_visible=\'Y\'');
	
	// workaround to wrap where clause
	$query->where('(1=1');
	
	//Categories
	if(count($categoryFilter) > 0)
	{
		$query->where('e.category_id IN (' . implode(',', $categoryFilter) . ')');
	}
	
	// Clubs
	if(count($clubFilter) > 0)
	{
		$query->where('e.club_id IN (' . implode(',', $clubFilter) . ')');
	}
	
	//Dates
	$dateBeginFilter = '';
	
	if($dateBegin != null)
	{
		$dateBeginFilter = new JDate($dateBegin);
		$query->where('e.date_begin >= \'' . $dateBeginFilter->toMySQL() . '\'');
	} else
	{
		$query->where('e.date_begin >= date(now())');
	}
	
	if($dateEnd != null)
	{
		$dateEndFilter = new JDate($dateEnd);
		$query->where('e.date_begin <= \'' . $dateEndFilter->toMySQL() . '\'');
	}	else 
	{
		$query->where('e.date_begin <= DATE_ADD(now(), INTERVAL ' . (int)$dateDaysInFuture . ' DAY)');
	}
	
	// workaround to wrap where clause
	$query->where('1=1) OR ((date(date_begin) = date(now()) && date_end = 0) || (now() between date_begin and date_end))');

	$query->order('e.date_begin ASC');
	
    return $query;
  }
  
  public function getItems()
  {
	$this->getState('list.limit');
	$this->setState('list.limit', 9999);
	
	$items = &parent::getItems();
	
	if(is_array($items))
	foreach($items as $item)
	{
		$beginDate = new JDate($item->date_begin);
		$item->date_begin = $beginDate;
		
		$beginDate = str_replace(' 00:00', '', $beginDate->toFormat('%d.%m.%Y %H:%M'));
		$endDate = '';
		if($item->date_end != '0000-00-00 00:00:00')
		{
			$endDate = new JDate($item->date_end);
			$item->date_end = $endDate;
			
			$bDay = new JDate($item->date_begin);
			$eDay = new JDate($item->date_end);
			$beginDay = $bDay->toFormat('%d.%m.%Y');
			$endDay = $eDay->toFormat('%d.%m.%Y');
			if($beginDay == $endDay)
			{
				$endDate = ' - ' . str_replace(' 00:00', '', $endDate->toFormat('%H:%M'));
			} else 
			{			
				$endDate = ' - ' . str_replace(' 00:00', '', $endDate->toFormat('%d.%m.%Y %H:%M'));
			}
		}
		
		$item->date_span = $beginDate . $endDate;
	}
	return $items;
  }
  
  public function getClubs()
  {
	$db = JFactory::getDBO();
    $query = $db->getQuery(true);
	
	$query->select('id,name');
	$query->from('#__clubs');
	$query->order('name ASC');
	
	$db->setQuery($query);
	
	return $db->loadObjectList();
  }
  
	public function getCategories()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		
		$query->select('id, title as name');
		$query->from('#__categories');
		$query->where('extension = \'com_event\'');
		$query->order('name ASC');
		
		$db->setQuery($query);
		
		return $db->loadObjectList();
	}
}
