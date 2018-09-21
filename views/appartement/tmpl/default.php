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
	<form method="POST" name="appartement_form" action="<?php echo JROUTE::_("index.php?option=com_lmnp&task=appartement&Itemid=".$this->Itemid);?>"> 
	<table class="lmnp-tab">	
	<tr>
		<td>
			<label for='adresse' style="float:left;"><?php echo JText::_( 'ADRESSE' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="adresse" value='<?php if($this->model->adresse != null)echo htmlentities($this->model->adresse) ?>'>
		</td>
	</tr>
	<tr>
		<td>
			<label for='prixAchat' style="float:left;"><?php echo JText::_( 'PRIX_ACHAT' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="prixAchat" value='<?php if($this->model->prixAchat != null)echo htmlentities($this->model->prixAchat) ?>'>
		</td>
	</tr>	

	<tr>
		<td>
			<label for='prixMeuble' style="float:left;"><?php echo JText::_( 'PRIX_MEUBLE' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="prixMeuble" value='<?php if($this->model->prixMeuble != null)echo htmlentities($this->model->prixMeuble) ?>'>
		</td>
	</tr>

	<tr>
		<td>
			<label for='fraisNotaire' style="float:left;"><?php echo JText::_( 'FRAIS_NOTAIRE' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="fraisNotaire" value='<?php if($this->model->fraisNotaire != null)echo htmlentities($this->model->fraisNotaire) ?>'>
		</td>
	</tr>
	
	<tr>
		<td>
			<label for='dateAchat' style="float:left;"><?php echo JText::_( 'DATE_ACHAT' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="dateAchat" value='<?php if($this->model->dateAchat != null)echo htmlentities($this->model->dateAchat) ?>'>
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
	