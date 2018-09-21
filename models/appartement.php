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
 * AppartementModel Component Model
 */
class AppartementModel
{
   
   public $_object = null;
   public $content= null;
   
   public $adresse= null;
   public $prixAchat= null;
   public $prixMeuble= null;
   public $fraisNotaire= null;
   public $dateAchat= null; 
   
   function __construct()
   {   
   }
   
   
   public function setAllNull()
   {
	   $this->_object = null;
	   $this->content = null;
	   $this->prixAchat = null;
	   $this->prixMeuble = null;
	   $this->fraisNotaire = null;
	   $this->dateAchat = null;
   }
 
}
?>