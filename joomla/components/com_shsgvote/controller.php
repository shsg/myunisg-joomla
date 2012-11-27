<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

class ShsgvoteController extends JController {
    function display() {
        //$link = JRoute::_('/', false);
        //$this->setRedirect($link);

        $user =& JFactory::getUser();
        if (ShsgvoteHelper::alreadyVoted($user->name) == false) {
            parent::display();
        } else {
            $app = JFactory::getApplication();
            $error = $app->logout();
            //JError::raiseWarning( 100, 'Dieser Benutzer (' . $user->name . ') hat bereits abgestimmt!' );
            $msg = JText::_( 'Dieser Benutzer (' . $user->name . ') hat bereits abgestimmt!' );
            $link = JRoute::_('/', false);
            $this->setRedirect($link, $msg, 'error');
        }
    }

    function vote() {
        //$link = JRoute::_('/', false);
        //$this->setRedirect($link);

        if (JRequest::getVar('form_sent', 'NO', 'POST') == "NO") {
            parent::display('display');
            return;
        } else {
            $user =& JFactory::getUser();
            if (ShsgvoteHelper::alreadyVoted($user->name) == false && strlen($user->name) == 8) {
                ShsgvoteHelper::logVoted('vote', JRequest::getVar('vote_asswiwi', 'NONE', 'POST'));
                ShsgvoteHelper::logVoted('vote', JRequest::getVar('vote_bvwl', 'NONE', 'POST'));
                ShsgvoteHelper::logVoted('vote', JRequest::getVar('vote_ble', 'NONE', 'POST'));
                ShsgvoteHelper::logVoted('vote', JRequest::getVar('vote_miqef', 'NONE', 'POST'));
                ShsgvoteHelper::logVoted('vote', JRequest::getVar('vote_mug', 'NONE', 'POST'));
                ShsgvoteHelper::logVoted('vote', JRequest::getVar('vote_som', 'NONE', 'POST'));
                ShsgvoteHelper::logVoted('vote', JRequest::getVar('vote_msc', 'NONE', 'POST'));
                ShsgvoteHelper::logVoted('vote', JRequest::getVar('vote_assnoch', 'NONE', 'POST'));

                // ShsgvoteHelper::logVoted('vote', JRequest::getVar('vote_skk3', 'NONE', 'POST'));

                ShsgvoteHelper::logVote($user->name);

                //JFactory::getApplication()->enqueueMessage( 'Danke für deine Stimme!' );
                $msg = JText::_('Danke für deine Stimme!');
                $link = JRoute::_('/voted.html', false);
                $this->setRedirect($link, $msg);
                $app = JFactory::getApplication();
                $error = $app->logout();
            } else {
                //JError::raiseWarning( 100, 'Dieser Benutzer (' . $user->name . ') hat bereits abgestimmt!' );
                $app = JFactory::getApplication();
                $error = $app->logout();

                $msg = JText::_( 'Dieser Benutzer (' . $user->name . ') hat bereits abgestimmt!' );
                $link = JRoute::_('/', false);
                $this->setRedirect($link, $msg, 'error');

            }
            return;
        }

        parent::display();
    }
}

