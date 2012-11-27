<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
 
// import Joomla table library
jimport('joomla.database.table');
jimport( 'joomla.utilities.date' );
jimport( 'joomla.application.application' );

require_once(JPATH_COMPONENT . DS . 'helpers' . DS . 'permission.php');

if (!function_exists('strptime'))
{
    function strptime($date, $format) {
        $masks = array(
            '%d' => '(?P<d>[0-9]{2})',
            '%m' => '(?P<m>[0-9]{2})',
            '%Y' => '(?P<Y>[0-9]{4})',
            '%H' => '(?P<H>[0-9]{2})',
            '%M' => '(?P<M>[0-9]{2})',
            '%S' => '(?P<S>[0-9]{2})'
            // usw..
        );

        $rexep = "#".strtr(preg_quote($format), $masks)."#";
        if(!preg_match($rexep, $date, $out))
            return false;

        $ret = array(
            "tm_sec"  => (int) $out['S'],
            "tm_min"  => (int) $out['M'],
            "tm_hour" => (int) $out['H'],
            "tm_mday" => (int) $out['d'],
            "tm_mon"  => $out['m']?$out['m']-1:0,
            "tm_year" => $out['Y'] > 1900 ? $out['Y'] - 1900 : 0,
        );
        return $ret;
    }
}
  

class EventTableEvent extends JTable
{
    function __construct(&$db) 
    {
        parent::__construct('#__events', 'id', $db);
    }
  
    function load($id)
    {
        parent::load($id);

        $this->date_begin = $this->transformMysqlToDisplayDate($this->date_begin);
        $this->date_end = $this->transformMysqlToDisplayDate($this->date_end);
    }
  
    function transformMysqlToDisplayDate($input)
    {
        $result = '';
        if($input != '0000-00-00 00:00:00')
        {
            $date = new JDate($input);
            $result = str_replace(' 00:00', '', $date->toFormat('%d.%m.%Y %H:%M'));
        }

        return $result;
    }
  
    function transformToMysqlDate($input)
    {
        $result = false;

        $dBegin = strptime($input, '%d.%m.%Y %H:%M'); 
        if($dBegin == false)
            $dBegin = strptime($input, '%d.%m.%Y');

        if(!$dBegin)
            return false;

        //convert date to RFC compatible format see http://www.ietf.org/rfc/rfc3339.txt?number=3339
        $dBegin2 = new JDate(($dBegin['tm_year'] + 1900) . '-' . ($dBegin['tm_mon'] + 1) . '-' . $dBegin['tm_mday'] . 'T' . $dBegin['tm_hour'] . ':' . $dBegin['tm_min']);
        $result = $dBegin2->toMySQL();

        return $result;
    }
  
    function check()
    {
        $this->date_begin = $this->transformToMysqlDate($this->date_begin);
        $this->date_end = $this->transformToMysqlDate($this->date_end);

        // Check if club id is allowed
        $allowedClubs = EventPermissionHelper::getResponsibleUserClubs();
        $clubOk = in_array($this->club_id, $allowedClubs);	

        $valid = $this->date_begin && $clubOk;

        if(!$valid)
        {
            $this->setError(JText::_('Invalid Input'));
        }

        return $valid;
    }
}
