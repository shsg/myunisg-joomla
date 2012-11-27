<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
jimport('joomla.utilities.arrayhelper');

class ClubControllerClub extends JControllerForm
{
  private static $allowedFileTypes = array('image/jpg', 'image/gif', 'image/jpeg', 'image/png', 'image/x-png');
  private static $logoResizeWidth = 300;
  private static $maxLogoFileSize = 512000; // 500Kb max file size

  // Jump back to last submenu after save
  public function edit()
  {
    $append = JRequest::getString('sub', '');
    if($append != '')
      $append = '&sub=' . $append;

    $id = JRequest::getInt('id');

    if(parent::edit())
    {
      $this->setRedirect(JRoute::_('index.php?option=com_club&view=club&layout=edit&id='. $id . $append, false));
    }
  }

  public function save()
  {
    JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));
    $id = JRequest::getInt('id', 0);

    if(!ClubPermissionChecker::checkEditPermission($id))
    {
      JError::raiseWarning(404, JText::_('Access denied'));
      return;
    }

    parent::save();

    // TODO find out the id of a newly created item    
    if($id > 0)
      $this->setRedirect(JRoute::_('index.php?option=com_club&task=club.edit&id=' . $id, false), JText::_('COM_CLUB_ADMIN_SETTINGS_SAVED'));
  }

  public function setLogo()
  {
    JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));
    $id = JRequest::getInt('id', 0);

    //Permission Check
    if(!ClubPermissionChecker::checkEditPermission($id))
    {
      JError::raiseWarning(404, JText::_('Access denied'));
      return;
    }

    $uploadPath = JPATH_ROOT . DS . 'images' . DS . 'com_club' . DS . 'clubs' . DS . 'logos';
    $fileUrlPath = JURI::root() . 'images/com_club/clubs/logos';

    @mkdir($uploadPath, 0777, true);

    $imageWidth = 200;
    $imageHeight = 120;
    
    if($id > 0)
    {
      $file = $_FILES['file_logo'];
      if(in_array($file['type'], self::$allowedFileTypes))
      {
        $url = $fileUrlPath . DS . $id . '-logo.png';
        $tmpDestination = $uploadPath . DS . $id . '-logo';
        $destination = $uploadPath . DS . $id . '-logo.png'; // always save as png to keep alpha transparency

        if($file && $file['size'] > 0 && $file['size'] <= self::$maxLogoFileSize)
        {
          $resizeOk = false;          

          // move file from temp
          @move_uploaded_file($file["tmp_name"], $tmpDestination);

          // resize image and save to destination
          try {
            $image = new SimpleImage();
            $image->load($tmpDestination);
            $image->resizeToWidth(self::$logoResizeWidth);
            $image->save($destination, IMAGETYPE_PNG);
            $resizeOk = true;
          } catch (Exception $e)
          {
            // Could not resize image, maybe the GD Library is not installed on the server
          }

          // delete temp file
          @unlink($tmpDestination);

          // Save to Database
          if($resizeOk == true)
          {
            $model = $this->getModel();
            $model->updateClubLogo($id, $url);
            $this->setRedirect(JRoute::_('index.php?option=com_club&sub=logo&task=club.edit&id=' . $id, false), JText::_('COM_CLUB_ADMIN_LOGO_UPLOADED'));
            return;
          } else
          {
            $this->setRedirect(JRoute::_('index.php?option=com_club&sub=logo&task=club.edit&id=' . $id, false), JText::_('COM_CLUB_ADMIN_LOGO_INVALID'));
            return;
          }
        } else 
        {
          $this->setRedirect(JRoute::_('index.php?option=com_club&sub=logo&task=club.edit&id=' . $id, false), JText::_('COM_CLUB_ADMIN_LOGO_INVALID'));
          return;
        }
      } else
      {
        $this->setRedirect(JRoute::_('index.php?option=com_club&sub=logo&task=club.edit&id=' . $id, false), JText::_('COM_CLUB_ADMIN_LOGO_INVALID'));
        return;
      }
    }
    $this->setRedirect(JRoute::_('index.php?option=com_club&view=clubs', false), JText::_('COM_CLUB_ADMIN_INVALID_ID'));
  }

  public function setConstitution()
  {
    JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));
    $id = JRequest::getInt('id', 0);

    //Permission Check
    if(!ClubPermissionChecker::checkEditPermission($id))
    {
      JError::raiseWarning(404, JText::_('Access denied'));
      return;
    }

    if($id > 0)
    {
      $constUploadPath = JPATH_ROOT . DS . 'images' . DS . 'com_club' . DS . 'clubs' . DS . 'constitutions';
      $constUploadUri = JURI::root() . 'images/com_club/clubs/constitutions';

      @mkdir($constUploadPath, 0777, true);

      $file = $_FILES['file_const'];

      if($file && ($file['type'] == 'application/pdf'))
      {
        // set dest file paths
        $destPath = $constUploadPath . DS . $id . '-const.pdf';
        $destUrl = $constUploadUri . DS . $id . '-const.pdf';

        // move uploaded file
        @move_uploaded_file($file['tmp_name'], $destPath);

        // Save to Database
        $model = $this->getModel();
        $model->updateClubConst($id, $destUrl);
        $this->setRedirect(JRoute::_('index.php?option=com_club&sub=const&task=club.edit&id=' . $id, false), JText::_('COM_CLUB_ADMIN_CONST_UPLOADED'));
        return;
      } 
      else 
      {
        $this->setRedirect(JRoute::_('index.php?option=com_club&sub=const&task=club.edit&id=' . $id, false), JText::_('COM_CLUB_ADMIN_CONST_PDF_ONLY'));
        return;
      }      
    } 
    $this->setRedirect(JRoute::_('index.php?option=com_club&view=clubs', false), JText::_('COM_CLUB_ADMIN_INVALID_ID'));
  }

  public function deleteLogo()
  {
    JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));
    $id = JRequest::getInt('id', 0);

    //Permission Check
    if(!ClubPermissionChecker::checkEditPermission($id))
    {
      JError::raiseWarning(404, JText::_('Access denied'));
      return;
    }

    if($id > 0)
    {
      // Save to Database
      $model = $this->getModel();
      $model->updateClubLogo($id, '');

      // Delete File
      $uploadPath = JPATH_ROOT . DS . 'images' . DS . 'com_club' . DS . 'clubs' . DS . 'logos';
      $destination = $uploadPath . DS . $id . '-logo.png';
      @unlink($destination);

      $this->setRedirect(JRoute::_('index.php?option=com_club&sub=logo&task=club.edit&id=' . $id, false), JText::_('COM_CLUB_ADMIN_LOGO_DELETED'));
    }
    else 
    {
      $this->setRedirect(JRoute::_('index.php?option=com_club&view=clubs', false), JText::_('COM_CLUB_ADMIN_INVALID_ID'));
    }
  }

  public function deleteConstitution()
  {
    JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));
    $id = JRequest::getInt('id', 0);

    //Permission Check
    if(!ClubPermissionChecker::checkEditPermission($id))
    {
      JError::raiseWarning(404, JText::_('Access denied'));
      return;
    }

    if($id > 0)
    {
      // Save to Database
      $model = $this->getModel();
      $model->updateClubConst($id, '');

      // Delete File
      $uploadPath = JPATH_ROOT . DS . 'images' . DS . 'com_club' . DS . 'clubs' . DS . 'constitutions';
      $destination = $uploadPath . DS . $id . '-const.pdf';
      @unlink($destination);

      $this->setRedirect(JRoute::_('index.php?option=com_club&sub=const&task=club.edit&id=' . $id, false), JText::_('COM_CLUB_ADMIN_CONST_DELETED'));
    }
    else 
    {
      $this->setRedirect(JRoute::_('index.php?option=com_club&view=clubs', false), JText::_('COM_CLUB_ADMIN_INVALID_ID'));
    }
  }
}
