<?php
/**
 * LMNP component (Model)
 * @author  Perraudeau 
 * @email   perraudeau@gmail.com 
 * @uri     
 * @license    
 * Last update 
*/
/* error_reporting(E_ALL);
ini_set('display_errors', '1');*/
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR); 
// Require the base controller
 
require_once( JPATH_COMPONENT.DS.'controllers'.DS.'LmnpController.php' );
require_once( JPATH_COMPONENT.DS.'models'.DS.'identity.php' );
require_once( JPATH_COMPONENT.DS.'views'.DS.'identity'.DS.'view.html.php' );
require_once( JPATH_COMPONENT_ADMINISTRATOR.DS.'models'.DS.'lmnpParamsModel.php' );

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('Lmnp');
 
// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();

?>