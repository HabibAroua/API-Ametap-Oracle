<?php
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
    	require_once('C:\oraclexe\trabajo\Ametap\Model\Participant.php');
	if((isset($_POST['matricule'])) && (isset($_POST['login'])) && (isset($_POST['password'])))
	{
		$matricule=$_POST['matricule'];
		$login=$_POST['login'];
		$password=$_POST['password'];
		$date_inscription=date('d').'/'.date('m').'/'.date('Y'); 
		$p=new Participant();
		$p->insert($matricule,$date_inscription);
		$a=new Adherent();
		$test=$a->insert($matricule,$matricule,$login,$password);

		if($test==true)
		{
			//is it true	
		}
		else
		{
			$p->deletes($matricule);
		}
	}
	else
	{
		echo "Error !!";
	}	
?>
