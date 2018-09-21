<?php
/**
 * LMNP component (Administration)
 * @author  Perraudeau
 * @email   perraudeau@free.fr
 * @uri    
 * @license    
*/
 
// No direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport('joomla.application.component.controller');
 
/**
 * LmnpController Component Controller
 */
class LmnpController extends JControllerLegacy
{
	private $model;
	private $config;
	private $errors;	
	private $intro; 
	private $sid;
	
	function __construct()
	{
echo "IdentityController.__construct";
		$this->model =  new LmnpModelIdentity();
		$configModel = new LmnpParamsModel();
		$this->intro = $configModel->queryContent();
		$this->config = $configModel->queryParams();
		$this->errors = array();				
	}
    /**
     * Method to display the view
     *
     * @access    public
     */
    public function display($cachable = false, $urlparams = false)
    {	
echo "IdentityController.display";	
		$view = new LmnpViewIdentity();
		$view->assignRef('model', $this->model);		
		$view->assignRef('intro', $this->intro);	
		$view->assignRef('errors', $this->errors);
		$view->assignRef('sid', $this->sid);
		$session =JFactory::getSession();	
		$view->assignRef('sid', $session->getId());
		// get a menu item based on Itemid or currently active
		$app	= JFactory::getApplication();
		$menu	= $app->getMenu();	

		if (empty($query['Itemid'])) {
			$menuItem = $menu->getActive();
		} else {
			$menuItem = $menu->getItem($query['Itemid']);
		}		
		$view->assignRef('Itemid', $menuItem->id);	
		
		/*
		Removed since 1.1 by	w.jied
		if(isset($_GET['Itemid']))	
			$view->assignRef('Itemid', $_GET['Itemid']);
		else
			$view->assignRef('Itemid', $menuItem->id;);
		*/
		JRequest::setVar('view', 'appartement');
		$view->display();		
    }
	
	/**
	* Method to execute requested actions
	*
	*@access	public
	*/

	function execute($task=null)
	{

		switch($task)
		{
			case 'do'     :  $this->processForm();
		    default	      :  $this->display();
		}
	}

	/**
	* Method invoked after ajax call failure (session broken ?)
	* @acess private
	* since 1.2.2
	*/
	/*
	private function manageExpiration()
	{
			$link	= 'index.php?option=com_jquickcontact&Itemid=';
		    if(isset($_GET['Itemid']))	
			   $link.=htmlspecialchars($_GET['Itemid']);
			$msg	= JText::_( 'SESSION_RESETED' );		
			$this->setRedirect($link, $msg);
	}
	*/
	/**
	* Method invoked to refresh captcha
	* @acess private
	* since 1.2.1
	*/
	/*
	private function refreshCaptcha()
	{
		if(!isset($_GET['sid']))
			die('invalid request');
		
		$session_id = htmlspecialchars($_GET['sid']);
		$captcha = $this->model->checkSid($session_id);				
		//For security (massive insertion),	we must check if the sid exists.
		if($captcha)
		{
			header( 'Cache-Control: no-store, no-cache, must-revalidate' );
			header( 'Pragma: no-cache' );
			// -->	
			$this->prepareCaptcha($session_id);						
		}					
		else
			die('expired');	
	}
	*/
	/**
	* Method to process form when submit is invoked
	*
	*@access private
	*/
	/*
	private function processForm()
	{
		$this->errors = array();
		$link	= 'index.php?option=com_lmnp&Itemid=';
		if(isset($_GET['Itemid']))	
			$link.=htmlspecialchars($_GET['Itemid']);//htmlspecialchars since 1.2.1
		
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['object'] )&& isset($_POST['message']) && isset($_POST['captcha']))
		{
			if($this->checkContents() == 1)
			{
				$row = $this->config['FIELD3'];		
				$to = $row['VAL'];				
				$subject= JText::_ ('NEW_MAIL' );
				$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';		
				$body = JText::sprintf( 'MAIL_BODY', $this->model->senderName)." \r\n".
				JText::_ ('SUBJECT').": \r\n". $this->model->_object." \r\n".
				JText::_ ('CONTENT').": \r\n".$this->model->content."\r\n".
				"Email: ".$this->model->senderMail."\r\n".
				"IP: ".$ip."\r\n";
				// From header symbol removed due to security restriction on some smtp servers that don't accept non local senders
				$headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' /*. "\r\n"."From: ".$this->model->senderMail." \r\n";

				if(mail($to, $subject, $body,$headers))
				{
					$this->model->setAllNull();
					$msg	= JText::_( 'SENT' );		
					$this->setRedirect($link, $msg);		
				}
				else					
					JError::raiseNotice( 500, JText:: _ ('EMAIL_NOT_SENT' ));
			}
			else
			{
				JError::raiseNotice( 500, JText:: _ ('EMAIL_NOT_SENT' ));
			}
		}
		else die('Invalid Request');
	}
	*/
   /**
	* Method to check new contact contstraints
	*
	*@access private
	*/
	/*
	private function checkContents()
	{
		$captcha = $this->model->getCorrectCaptcha();	
		$this->model->senderName = $_POST['name'];
		$this->model->senderMail = $_POST['email'];
		$this->model->_object = $_POST['object'];
		$this->model->content= $_POST['message'];

		$row = $this->config['FIELD0'];				
		$min_sz = $row['MIN_SZ'];
		$max_sz = $row['MAX_SZ'];
		if(strlen($this->model->senderName)<$min_sz)
			$this->errors[] = JText:: _ ('USER_NAME' ).' '.JText::sprintf( 'TOO_SHORT', $min_sz);	
		if(strlen($this->model->senderName)>$max_sz)
			$this->errors[] = JText:: _ ('USER_NAME' ).' '.JText::sprintf( 'TOO_SHORT', $max_sz);			
			jimport('joomla.mail.helper');
		if(!JMailHelper::isEmailAddress ($this->model->senderMail))		
			$this->errors[] = JText:: _ ('INCORRECT_MAIL_FORMAT' );
		
		$row = $this->config['FIELD1'];				
		$min_sz = $row['MIN_SZ'];
		$max_sz = $row['MAX_SZ'];
		if(strlen($this->model->_object)<$min_sz)
			$this->errors[] = JText:: _ ('SUBJECT' ).' '.JText::sprintf( 'TOO_SHORT', $min_sz);	
		if(strlen($this->model->_object)>$max_sz)
			//since 1.2.1 (Correction TOO_SHORT-> TOO_LONG
			$this->errors[] = JText:: _ ('SUBJECT' ).' '.JText::sprintf( 'TOO_LONG', $max_sz); 			
		//die('object = '.$this->model->_object.' '.$min_sz.' '.$max_sz);

		$row = $this->config['FIELD2'];				
		$min_sz = $row['MIN_SZ'];
		$max_sz = $row['MAX_SZ'];
		if(strlen($this->model->content)<$min_sz)
			$this->errors[] = JText:: _ ('CONTENT' ).' '.JText::sprintf( 'TOO_SHORT', $min_sz);	
		if(strlen($this->model->content)>$max_sz)
			//since 1.2.1 (Correction TOO_SHORT-> TOO_LONG
			$this->errors[] = JText:: _ ('CONTENT' ).' '.JText::sprintf( 'TOO_LONG', $max_sz);		
			
		if(htmlspecialchars($_POST['captcha']) != $captcha)
				$this->errors[] = JText:: _ ('CPATCHA_ERROR' );
		if(count($this->errors)>0)	
			return 0;		
		return 1;
	}
*/
	/**
	* To check mail format
	*
	*@access private
	*/
	private function isValidInetAddress($data, $strict = false) 
	{ 
	  $regex = $strict? 
		  '/^([.0-9a-z_-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,4})$/i' : 
		   '/^([*+!.&#$¦\'\\%\/0-9a-z^_`{}=?~:-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,4})$/i' 
	  ; 
	  if (preg_match($regex, trim($data), $matches)) { 
		return array($matches[1], $matches[2]); 
	  } else { 
		return false; 
	  } 
	}


	private function hexrgb ($hexstr)
	{
	  $int = hexdec($hexstr);

	  return array("red" => 0xFF & ($int >> 0x10),
				   "green" => 0xFF & ($int >> 0x8),
				   "blue" => 0xFF & $int);
	}
}
?>