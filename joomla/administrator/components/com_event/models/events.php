<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');

class EventModelEvents extends JModelList
{
    protected function getListQuery()
    {
        $editAbleClubs = EventPermissionHelper::getResponsibleUserClubs();
        $editAbleClubs[] = -1;
        // Create a new query object.         
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select('e.id, e.club_id, c.name as club_name, e.category_id, cat.title as category_name, e.name, e.date_begin, e.date_end, e.place, e.record_visible');
        $query->from('#__events e');
        $query->where('date(e.date_begin) >= date(now())');
        $query->where('e.club_id IN (' . implode(',', $editAbleClubs) . ')');
        $query->leftjoin('#__clubs c ON (e.club_id = c.id)');
        $query->leftjoin('(SELECT id,title FROM #__categories WHERE extension=\'com_event\') cat ON (e.category_id = cat.id)');
        $query->order('e.date_begin ASC');
        #$query->leftjoin('#__users u ON (c.manager_user_id=u.id)');
        #$query->leftjoin('(SELECT id,title FROM #__categories WHERE extension=\'com_club\') cat ON (c.category_id = cat.id)');
        #$query->order('cat.title, c.name, c.id ASC');

        return $query;
    }

    protected function executeQuery($query)
    {
        $db = JFactory::getDBO();
        $db->setQuery($query);
        return $db->query();
    }

    public function showEvents($ids)
    {
        return $this->executeQuery('UPDATE #__events SET record_visible=\'Y\' WHERE id in(' . implode(',',$ids) . ')');
    }

    public function hideEvents($ids)
    {
        return $this->executeQuery('UPDATE #__events SET record_visible=\'N\' WHERE id in(' . implode(',',$ids) . ')');
    }

    public function deleteEvent($id)
    {
        return $this->executeQuery('DELETE FROM #__events WHERE id = ' . $id);
    }

    public function getItems()
    {
        $items = &parent::getItems();

        if(is_array($items))
        foreach($items as $item)
        {
            $beginDate = new JDate($item->date_begin);
            $beginDate = str_replace(' 00:00', '', $beginDate->toFormat('%d.%m.%Y %H:%M'));
            $endDate = '';
            if($item->date_end != '0000-00-00 00:00:00')
            {
                $endDate = new JDate($item->date_end);
                $endDate = ' - ' . str_replace(' 00:00', '', $endDate->toFormat('%d.%m.%Y %H:%M'));
            }

            $item->date_span = $beginDate . $endDate;
        }
        return $items;
    }
}
