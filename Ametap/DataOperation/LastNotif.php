<?php
	require_once('C:\oraclexe\trabajo\Ametap\Model\Participation.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$p=new Participation('','','','','','');
	$a=new Adherent();
	if(isset($_GET['login']))
	{
		echo $p->afficheLastNotif($a->findMatriculeByLogin($_GET['login']));
	}
	else
	{
		echo "Error !!";
	}
?>
