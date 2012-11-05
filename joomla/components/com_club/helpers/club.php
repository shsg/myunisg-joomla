<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class ClubHelper
{
  public static function getMediaFileUrl($fileName)
  {
    return JURI::root() . 'images' . $fileName;
  }

  public static function getHelp()
  {
    return "Help";
  }
}
