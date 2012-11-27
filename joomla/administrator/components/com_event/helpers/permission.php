<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class EventPermissionHelper
{
	public static function isAdminUser()
	{
		$user	= JFactory::getUser();
		return $user->authorise('core.admin', 'com_event');
	}
	
	public static function getResponsibleUserClubs()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		
		$query->select('id');
		$query->from('#__clubs');
		
		if(!self::isAdminUser())
		{
			$user = JFactory::getUser();
			$query->where('manager_user_id = ' . (int)$user->id);
		}
		
		$db->setQuery($query);
		
		$dbResult = $db->loadObjectList();
		if(!is_array($dbResult))
			$dbResult = array();
		
		$result = array();
		foreach($dbResult as $rec)
		{
			$result[] = $rec->id;
		}
		
		return $result;
	}
	
	public static function isUserAllowedtoEditEvent($eventId)
	{
		if(self::isAdminUser())
			return true;
		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,club_id');
		$query->from('#__events');
		$query->where('id = ' . (int) $eventId);
		$db->setQuery($query);
		
		$event = $db->loadObject();
		
		$editableClubs = self::getResponsibleUserClubs();
		
		return in_array($event->club_id, $editableClubs);
	}
}