<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controlleradmin');

class ClubControllerClubs extends JControllerAdmin
{
  private function hide($cid)
  {
    $model = $this->getModel('Clubs');
    $model->hideClubs($cid);
    $this->setRedirect(JRoute::_('index.php?option=com_club&view=clubs', false));
  }

  private function show($cid)
  {
    $model = $this->getModel('Clubs');
    $model->showClubs($cid);
    $this->setRedirect(JRoute::_('index.php?option=com_club&view=clubs', false));
  }


  public function publish()
  {
    JRequest::checkToken() or die(JText::_('JINVALID_TOKEN'));

    $cid	= JRequest::getVar('cid', array(), '', 'array');
		JArrayHelper::toInteger($cid);

    if(!ClubPermissionChecker::checkBulkEditPermission($cid))
    {
      JError::raiseWarning(404, JText::_('Access denied'));
      return;
    }

    $task = JRequest::getString('task', 'none');

    if($task == 'publish')
    {
      $this->show($cid);
    } else 
    {
      $this->hide($cid);
    }
  }
}
