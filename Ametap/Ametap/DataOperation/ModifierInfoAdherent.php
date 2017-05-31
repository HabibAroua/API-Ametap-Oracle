<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$a=new Adherent();
	$oldLogin=$_POST['oldLogin'];
	$newLogin=$_POST['newLogin'];
	$newPassword=$_POST['y'];
	$a->modifierInformationPersonnel($oldLogin,$newLogin,$newPassword);
?>