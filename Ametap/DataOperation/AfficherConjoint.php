<?php
	require_once('C:\oraclexe\trabajo\Ametap\Model\Conjoint.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');

	$c=new Conjoint(0,0,0,0,0,0);
	$a=new Adherent();
	echo $c->affiche($a->findMatriculeByLogin($_GET['login']));
?>
