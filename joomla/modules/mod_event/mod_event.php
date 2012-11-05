<?php
// no direct access
defined('_JEXEC') or die;

$numEvents = $params->def('num_events', 10);
        
$db = JFactory::getDBO();
$query = $db->getQuery(true);
$query->select('e.id, e.name, e.category_id, e.place, e.record_updated, e.description, cat.title as category_name, e.club_id, #__clubs.name as club_name, e.date_begin, e.date_end, ((date(date_begin) = date(now()) && date(date_end) < date(now())) || (date(now()) between date(date_begin) and date(date_end))) as is_running ');
$query->from('#__events e');
$query->innerJoin('(SELECT id, title FROM #__categories WHERE extension=\'com_event\') cat ON (e.category_id = cat.id)');
$query->innerJoin('#__clubs ON (#__clubs.id = e.club_id)');
$query->where('e.record_visible=\'Y\'');
$query->where('date(e.date_begin) >= date(now())');
$query->order('e.date_begin ASC LIMIT ' . $numEvents);
$db->setQuery($query);

$events = $db->loadObjectList();

if(!is_array($events))
	$events = array();
	
foreach($events as $item)
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

require JModuleHelper::getLayoutPath('mod_event', $params->get('layout', 'default'));
