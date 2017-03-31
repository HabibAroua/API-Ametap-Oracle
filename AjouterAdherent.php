<?php
    require_once('Adherent.php');
    require_once('Participant.php');
    
    $matricule=$_POST['matricule'];
	$login=$_POST['login'];
	$password=$_POST['password'];
	echo $matricule.' '.$login.'.'.$password ;
	$date_inscription=date('d').'/'.date('m').'/'.date('Y'); 
    $p=new Participant();
	$p->insert($matricule,$date_inscription);
	$a=new Adherent();
	$test=$a->insert($matricule,$matricule,$login,$password);
	
	if($test==true)
	{
		
	}
	else
	{
		$p->deletes($matricule);
	}
	
	
?>
