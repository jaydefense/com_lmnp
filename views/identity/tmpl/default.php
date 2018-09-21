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
	<form method="POST" name="identity_form" action="<?php echo JROUTE::_("index.php?option=com_lmnp&task=identity&Itemid=".$this->Itemid);?>"> 
	<table class="lmnp-tab">	
	<tr>
		<td>
			<label for='name' style="float:left;"><?php echo JText::_( 'NAME' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="name" value='<?php if($this->model->name != null)echo htmlentities($this->model->name) ?>'>
		</td>
	</tr>
	<tr>
		<td>
			<label for='firstname' style="float:left;"><?php echo JText::_( 'FIRSTNAME' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="firstname" value='<?php if($this->model->firstname != null)echo htmlentities($this->model->firstname) ?>'>
		</td>
	</tr>	
	<tr>
		<td>
			<label for='siret' style="float:left;"><?php echo JText::_( 'SIRET' ); ?> </label>
		</td>
		<td>
			<input style="float:left;" type="text" name="siret" value='<?php if($this->model->siret != null)echo htmlentities($this->model->siret) ?>'>
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
	