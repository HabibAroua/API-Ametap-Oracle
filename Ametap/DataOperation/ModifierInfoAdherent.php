<?php
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$a=new Adherent();
	if(($_POST['oldLogin']) && ($_POST['newLogin']))
	{
		$oldLogin=$_POST['oldLogin'];
		$newLogin=$_POST['newLogin'];
		$newPassword=$_POST['newPassword'];
		$a->modifierInformationPersonnel($oldLogin,$newLogin,$newPassword);
	}
	else
	{
		echo "Error !";
	}
?>
