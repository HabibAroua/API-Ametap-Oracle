<?php
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$a=new Adherent();
	$oldLogin=$_POST['oldLogin'];
	$newLogin=$_POST['newLogin'];
	$newPassword=$_POST['newPassword'];
	$a->modifierInformationPersonnel($oldLogin,$newLogin,$newPassword);
?>
