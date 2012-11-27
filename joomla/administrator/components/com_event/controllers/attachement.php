<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
jimport('joomla.utilities.arrayhelper');

class EventControllerAttachement extends JControllerForm
{
	private static $allowedFileTypes = array('image/jpg', 'image/gif', 'image/jpeg', 'image/png', 'image/x-png', 'application/pdf'); 
    private static $imageFileTypes = array('image/jpg', 'image/gif', 'image/jpeg', 'image/png', 'image/x-png');
	private static $maxFileSize = 2048000; // 2MB max File Upload size
	
	function display()
	{		
		$view = JRequest::getString('view', 'attachement');
		JRequest::setVar('view', $view);
		
		$id = JRequest::getInt('id', -1);
		if($id != -1)
		{
			if(!EventPermissionHelper::isUserAllowedtoEditEvent($id))
			{
				JError::raiseError(403, JText::_('COM_EVENT_ADMIN_EVENT_NOT_EDITABLE'));
				return;
			}
		}
		
		parent::display();
	}
	
	function delete()
	{
		JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));		
		
		$id = JRequest::getInt('id', -1);
		if($id != -1)
		{
			if(!EventPermissionHelper::isUserAllowedtoEditEvent($id))
			{
				JError::raiseError(403, JText::_('COM_EVENT_ADMIN_EVENT_NOT_EDITABLE'));
			}
		}
		
		if($id > 0)
		{	
			$this->deleteAttachement($id); 
			$this->setRedirect(JRoute::_('index.php?option=com_event&task=attachement.view&id='. $id, false), JText::_('COM_EVENT_ADMIN_ATTACHEMENT_DELETED'));
			return;
		}
		 JError::raiseWarning(404, JText::_('Error'));
	}
	
    function deleteAttachement($id) 
    { 
        $model = $this->getModel(); 
        $currentAttachement = $model->getAttachement($id); 
        if($currentAttachement != null && $currentAttachement->file && $currentAttachement->file != '') 
        { 
            @unlink($currentAttachement->file); 

            if($currentAttachement->file_thumb != '') 
            { 
                @unlink($currentAttachement->file_thumb); 
            } 
        } 
        $model->deleteAttachement($id); 
    }
	
	function save()
	{
		JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));
				
		$id = JRequest::getInt('id', -1);
		if($id != -1)
		{
			if(!EventPermissionHelper::isUserAllowedtoEditEvent($id))
			{
				JError::raiseError(403, JText::_('COM_EVENT_ADMIN_EVENT_NOT_EDITABLE'));
				return;
			}		
		}
		
		if($id > 0)
		{	
			$uploadPath = JPATH_ROOT . DS . 'images' . DS . 'events';
			$fileUrlPath = JURI::root() . 'images/events';
			@mkdir($uploadPath, 0777, true);
			
			$file = $_FILES['file_attachement'];
			
			if(in_array($file['type'], self::$allowedFileTypes) && $file['size'] > 0 && $file['size'] <= self::$maxFileSize)
			{
				$model = $this->getModel();
				$currentAttachement = $model->getAttachement($id);
				if($currentAttachement != null && $currentAttachement->file && $currentAttachement->file != '')
				{
					@unlink($currentAttachement->file);
				}
				
				$fileType = in_array($file['type'], self::$imageFileTypes) ? 'image' : 'other'; 
			
				$extension = end(explode('.',$file['name']));
				
				$hashFileName = dechex($id) . substr(md5($id . '-event'), 0, 6);
				
				$destPath = $uploadPath . DS . $hashFileName . '.' . $extension;
				$destUrl = $fileUrlPath . '/' . $hashFileName . '.' . $extension;

				// move uploaded file
				@move_uploaded_file($file['tmp_name'], $destPath);
				
				$thumbUrl = '';
				$thumbPath = '';
				
				// create thumbnail currently only for images
				if($fileType == 'image')
				{
					$thumbPath = $uploadPath . DS . $hashFileName . '-thumb.png';
					$thumbUrl = $fileUrlPath . '/' . $hashFileName . '-thumb.png';
				
					try {
						$image = new EventImageHelper();
						$image->load($destPath);
						$image->resizeToWidth(400);
						$image->save($thumbPath, IMAGETYPE_PNG);
						$resizeOk = true;
					} catch (Exception $e)
					{
						$thumbUrl = '';
						$thumbPath = '';
						// Could not resize image, maybe the GD Library is not installed on the server
					}
				} else 
				{
					// TODO : Create pdf thumb
					// http://stackoverflow.com/questions/467793/how-do-i-convert-a-pdf-document-to-a-preview-image-in-php
				}

				// Save to Database
				$model->updateAttachement($id, $destUrl, $destPath, $thumbUrl, $thumbPath, $fileType);
				$this->setRedirect(JRoute::_('index.php?option=com_event&task=attachement.view&id='. $id, false), JText::_('COM_EVENT_ADMIN_ATTACHEMENT_UPLOADED'));
			} else 
			{
				JError::raiseWarning(500, JText::_('Invalid File'));
			}
		
			return;
		}
		JError::raiseWarning(404, JText::_('Error'));
	}

	function close()
	{
		$this->setRedirect(JRoute::_('index.php?option=com_event', false));
	}
}
