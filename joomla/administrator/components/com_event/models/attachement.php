<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla modelform library
jimport('joomla.application.component.modeladmin');
 
class EventModelAttachement extends JModel
{	
	public function getAttachement($eventId)
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id, name, type, link, file, link_thumb, file_thumb');
		$query->from('#__events_attachement');
		$query->where('id='. (int)$eventId);
		
		$db->setQuery((string)$query);
		
		$attachement = $db->loadObject();
		
		return $attachement;
	}
	
	public function updateAttachement($eventId, $link, $file, $thumbLink, $thumbFile, $fileType)
	{
		$db = JFactory::getDBO();
		
		$db->setQuery('SELECT 1 FROM #__events_attachement WHERE id = '. (int)$eventId);
		$rows = $db->loadObjectList();
				
		$attachement = new stdclass();
		$attachement->id = $eventId;
		$attachement->link = $link;
		$attachement->type = $fileType;
		$attachement->file = $file;
		$attachement->link_thumb = $thumbLink;
		$attachement->file_thumb = $thumbFile;
		
		if(count($rows) == 0)
		{
			$db->insertObject('#__events_attachement', $attachement);
		} else 
		{
			$db->updateObject('#__events_attachement', $attachement, 'id', true);
		}
	}
	
	public function deleteAttachement($eventId)
	{
		$db = JFactory::getDBO();
		$db->setQuery('DELETE FROM #__events_attachement WHERE id = '. (int)$eventId);
		$db->query();
	}
}
?>