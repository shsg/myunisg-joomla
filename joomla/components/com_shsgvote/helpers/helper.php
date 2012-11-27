<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class ShsgvoteHelper
{
  public static function getMediaFileUrl($fileName)
  {
    return JURI::root() . 'images' . $fileName;
  }

  public static function getHelp()
  {
    return "Help";
  }
  
  public static function alreadyVoted($matr) {
        return ShsgvoteHelper::isContentInFile("/var/www/wahlen/students_voted.txt", $matr);
    }
  
  public static function isInGroup($groupname, $matr) {
      return ShsgvoteHelper::isContentInFile("/var/www/wahlen/students_" . $groupname . ".txt", $matr);
  }
  
  private static function isContentInFile($f, $contentToSearchFor) {
      $file = file_get_contents($f);
      if(strpos($file, $contentToSearchFor) === false) {
          return false;
      } else {
          return true;
      }
  }
  
  public static function logVote($matr) {
      file_put_contents("/var/www/wahlen/students_voted.txt", date("Y/m/d G:i") . "  " . $matr . "\n", FILE_APPEND | LOCK_EX);
  }
  
  public static function logVoted($groupname, $results) {
      $result = "";
      if (is_array($results)) {
          $result = join(", ", $results);
      } else {
          $result = $results;
      }
      
      //if ($result != "NONE") {
      file_put_contents("/var/www/wahlen/students_" . $groupname . "_results.txt", date("Y/m/d G") . "  " . $result . "\n", FILE_APPEND | LOCK_EX);
      //}
  }
  
}
