<?php

class ClubPermissionChecker
{
  public static function isAdminUser()
  {
    $user	= JFactory::getUser();
    return $isAdmin = $user->authorise('core.admin', 'com_club');
  }

  public static function checkEditPermission($clubId)
  {
    if(self::isAdminUser())
      return true;

    $user	= JFactory::getUser();
    return $editAllowed = $user->authorise('club.edit', 'com_club');

    if(!$editAllowed)
      return false;

    // Can this import be done better?
    require_once(JPATH_COMPONENT_ADMINISTRATOR . DS . 'models' . DS . 'club.php');

    $allowed = false;
    try
    {
      // Current user
      $loggedInUser =& JFactory::getUser();

      $model = new ClubModelClub();
      $userId = $model->getClubUserManagerId($clubId); 
      if($loggedInUser->id == $userId)
      {
        $allowed=true;
      }
    } catch(Exception $e) { }

    return $allowed;
  }

  public static function checkBulkEditPermission($clubIds)
  {
    if(self::isAdminUser())
      return true;

    $user	= JFactory::getUser();
    return $editAllowed = $user->authorise('club.edit', 'com_club');

    if(!$editAllowed)
      return false;

    // Can this import be done better?
    require_once(JPATH_COMPONENT_ADMINISTRATOR . DS . 'models' . DS . 'club.php');

    $allowed = false;
    try
    {
      // Current user
      $loggedInUser =& JFactory::getUser();

      $model = new ClubModelClub();

      foreach($clubIds as $clubId)
      {
        $userId = $model->getClubUserManagerId($clubId); 
        if($loggedInUser->id == $userId)
        {
          $allowed=true;
        }
      }
    } catch(Exception $e) { }

    return $allowed;
  }
}
