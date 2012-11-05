<?php
/**
 * @version    $Id: myauth.php 7180 2007-04-23 16:51:53Z jinx $
 * @package    Joomla.Tutorials
 * @subpackage Plugins
 * @license    GNU/GPL
 */
 
// error_reporting(E_ALL); 
// ini_set("display_errors", 1);
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
 
jimport('joomla.event.plugin');

 
/**
 * Example Authentication Plugin.  Based on the example.php plugin in the Joomla! Core installation
 *
 * @package    Joomla.Tutorials
 * @subpackage Plugins
 * @license    GNU/GPL
 */
class plgAuthenticationUnisg extends JPlugin
{
    /**
     * Constructor
     *
     * For php4 compatability we must not use the __constructor as a constructor for plugins
     * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
     * This causes problems with cross-referencing necessary for the observer design pattern.
     *
     * @param object $subject The object to observe
     * @since 1.5
     */
    function plgAuthenticationUnisg(& $subject) {
        parent::__construct($subject);
    }
 
    /**
     * This method should handle any authentication and report back to the subject
     * This example uses simple authentication - it checks if the password is the reverse
     * of the username (and the user exists in the database).
     *
     * @access    public
     * @param     array     $credentials    Array holding the user credentials ('username' and 'password')
     * @param     array     $options        Array of extra options
     * @param     object    $response       Authentication response object
     * @return    boolean
     * @since 1.5
     */
    function onUserAuthenticate( $credentials, $options, & $response ) {

        if ($credentials['param1'] == null) { // For admin area
            return false;
        }
        
       if ($credentials['param4'] === md5($credentials['param1'] . $credentials['param2'] . $credentials['param3'] . '$tuDschaft09' )) { // TODO check referrer
            $response->username = $credentials['param1'];
            $response->fullname = $credentials['param1'];
            $response->password = md5($credentials['param1'] . '$tuDschaft09');
            $response->email = '';
            $response->status		= JAUTHENTICATE_STATUS_SUCCESS;
            $response->error_message = '';
            $response->type = 'Unisg';
        } else {
            $response->status		= JAUTHENTICATE_STATUS_FAILURE;
   			$response->error_message	= JText::sprintf('JGLOBAL_AUTH_FAILED', "HSG-Authentication did not return correct values.");
        }
    }
}
?>