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
 * FinancementModel Component Model
 */
class FinancementModel
{
   
   public $_object = null;
   public $content= null;
   
   public $tauxCredit= null;
   public $nbAnneesCredit= null;
   public $fraisDossier= null;
   public $assuranceEmprunteur= null;
   
   function __construct()
   {   
   }
   
   
   public function setAllNull()
   {
	   $this->_object = null;
	   $this->content = null;
	   $this->tauxCredit = null;
	   $this->nbAnneesCredit = null;
	   $this->fraisDossier = null;
	   $this->assuranceEmprunteur = null;
   }
 
}
?>