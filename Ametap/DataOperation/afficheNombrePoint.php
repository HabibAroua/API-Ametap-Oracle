<?php
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$a=new Adherent();
	if(isset($_POST['login']))
	{
		echo 'Vous avez '.$a->getNombrePoint($a->findMatriculeByLogin($_POST['login'])).' points';
	}
	else
	{
		echo "Error !!";
	}
?>
