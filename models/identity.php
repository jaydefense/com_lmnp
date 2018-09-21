<?php
/**
 * LMNP component (Model)
 * @author  Perraudeau 
 * @email   perraudeau@gmail.com 
 * @uri     
 * @license    
 * Last update 
*/
 
// No direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
 
/**
 * LmnpModelIdentity Component Model
 */
class LmnpModelIdentity extends JModelItem
{
   
   public $_object = null;
   public $content= null;
   
   public $name= null;
   public $firstname= null;
   public $siret= null;
   
   function __construct()
   {   
   }
   
   
   public function setAllNull()
   {
	   $this->_object = null;
	   $this->content = null;
	   $this->name = null;
	   $this->firstname = null;
	   $this->siret = null;
   }
 
}
?>