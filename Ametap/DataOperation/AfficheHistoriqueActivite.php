<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Activite.php');
    require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$adherent=new Adherent();
	$activite=new Activite(0,0,0,0,0,0,0,0,0,0,0,0);
	echo $activite->AfficheHistorique($adherent->findMatriculeByLogin($_GET['login']));



?>