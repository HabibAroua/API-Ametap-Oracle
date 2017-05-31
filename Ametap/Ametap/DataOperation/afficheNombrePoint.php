<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$a=new Adherent();
	echo 'Vous avez '.$a->getNombrePoint($a->findMatriculeByLogin($_POST['login'])).' point';
?>