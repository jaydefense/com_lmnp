<?php
/**
 * JQuickContact component (Router)
 * @author  wassim jied 
 * @email   jiwassim@gmail.com 
 * @uri     jiedwassim.1free.ws
 * @license    GNU/GPL
 * @last update 21 July 2011
*/
 
//
defined('_JEXEC') or die;
define('SEND','send');
jimport('joomla.application.categories');

/**
 * Build the route for the com_contact component
 *
 * @param	array	An array of URL arguments
 *
 * @return	array	The URL arguments to use to assemble the subsequent URL.
 */
function JQuickContactBuildRoute(&$query){
	$segments = array();


	if(isset($query['view']))		
		unset($query['view']);
	
	if(isset($query['task']))
	{
		$segments[]= SEND;
		unset($query['task']);
	}	
	return $segments;
}
/**
 * Parse the segments of a URL.
 *
 * @param	array	The segments of the URL to parse.
 *
 * @return	array	The URL attributes to be used by the application.
 */
function JQuickContactParseRoute($segments)
{
	$vars = array();
	$vars['view']='contact';
	if(count($segments>0))
		$vars['task'] = 'do';	
	return $vars;
}

