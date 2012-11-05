<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport( 'joomla.application.application' );
jimport('joomla.application.component.view');

class ClubViewDefault extends JView
{
    function display($tpl = null) 
    {
        $app    = &JFactory::getApplication();
        $doc =& JFactory::getDocument();

        $model = $this->getModel();
        $items = $model->getAllClubs();

        $groupedItems = array();
        foreach($items as $item) {
            $groupedItems[$item->category_name][] = $item;
        }

        $this->items = $groupedItems;

        #$doc->setMetaData('keywords', '', false);
        #$doc->setMetaData('description', '', false);

        // Display the view
        parent::display($tpl);
    }
}
