<?php
/**
 * LMNP component (Model)
 * @author  Perraudeau 
 * @email   perraudeau@gmail.com 
 * @uri     
 * @license    
 * Last update 
*/
 
// no direct access 
defined( '_JEXEC' ) or die( 'Restricted access' );
echo '<div style="color:red">';
echo '<u1>';
foreach($this->errors as $err){		
  echo '<li>'.$err.'</li>';
}
echo '</u1>';
echo '</div><br/><br/>';
echo $this->intro;

?>
<style>
table.lmnp-tab tr,table.lmnp-tab td
{
    border: none;
    padding: 1px 1px 1px 1px;
}
</style>
	<form method="POST" name="financement_form" action="<?php echo JROUTE::_("index.php?option=com_lmnp&task=financement&Itemid=".$this->Itemid);?>"> 
	<table class="lmnp-tab">	
	<tr>
		<td>
			<label for='tauxCredit' style="float:left;"><?php echo JText::_( 'TAUX_CREDIT' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="tauxCredit" value='<?php if($this->model->tauxCredit != null)echo htmlentities($this->model->tauxCredit) ?>'>
		</td>
	</tr>
	<tr>
		<td>
			<label for='nbAnneesCredit' style="float:left;"><?php echo JText::_( 'NB_ANNEES_CREDIT' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="nbAnneesCredit" value='<?php if($this->model->nbAnneesCredit != null)echo htmlentities($this->model->nbAnneesCredit) ?>'>
		</td>
	</tr>
	<tr>
		<td>
			<label for='fraisDossier' style="float:left;"><?php echo JText::_( 'FRAIS_DOSSIER' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="fraisDossier" value='<?php if($this->model->fraisDossier != null)echo htmlentities($this->model->fraisDossier) ?>'>
		</td>
	</tr>
	<tr>
		<td>
			<label for='assuranceEmprunteur' style="float:left;"><?php echo JText::_( 'ASSUR_EMPRUNT' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="assuranceEmprunteur" value='<?php if($this->model->assuranceEmprunteur != null)echo htmlentities($this->model->assuranceEmprunteur) ?>'>
		</td>
	</tr>	
	
	</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input type="submit" name='submit' style="float:left;">	
			</td>
	</tr>
	</table>
	</form>
	