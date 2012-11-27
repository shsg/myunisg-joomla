<?php
// No direct access to this file
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
class JFormFieldEventClubs extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'eventClubs';
 
	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		// $query = new JDatabaseQuery;
		$query = $db->getQuery(true);
		$query->select('id, name');
		$query->from('#__clubs');
		
		$clubIds = EventPermissionHelper::getResponsibleUserClubs();
		$query->where('id IN (' . implode(',', $clubIds) . ')');
		
		$db->setQuery((string)$query);
		
		$clubs = $db->loadObjectList();
		if(!is_array($clubs))
			$clubs = array();
		
		$options = array();
		foreach($clubs as $club) 
		{
			$options[] = JHtml::_('select.option', $club->id, $club->name);
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
