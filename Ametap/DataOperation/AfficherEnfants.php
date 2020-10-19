<?php
	require_once('C:\oraclexe\trabajo\Ametap\Model\Enfant.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$e=new Enfant(0,0,0,0,0,0);
	$a=new Adherent();
	if($_GET['login'])
	{
		echo $e->afficheEnfant($a->findMatriculeByLogin($_GET['login']));
	}
	else
	{
		echo "Error";
	}
?>
