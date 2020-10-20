<?php
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Participation.php');
	$a=new Adherent();
	$p=new Participation(1,1,1,1,1,1);
	if(isset($_GET['login']))
	{
		echo $p->afficheNotf($a->findMatriculeByLogin($_GET['login']));	
	}
	else
	{
		echo "Error !!";
	}
?>
