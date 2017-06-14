<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Enfant.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Participant.php');
	$id=$_POST['id'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_naissance=$_POST['date_naissance'];
	$ecole=$_POST['ecole'];
	
	$a=new Adherent();
	$matricule=$a->findMatriculeByLogin($_POST['login']);
	$e=new Enfant($id,$nom,$prenom,$date_naissance,$ecole,$matricule);
	$p=new Participant();
	$date_inscription=date('d').'/'.date('m').'/'.date('Y');
	$x=$a->nombreEnfant($a->findMatriculeByLogin($_POST['login']));
	$y=$a->nombreEnfantEnregistrer($a->findMatriculeByLogin($_POST['login']));
	
	
	if($x>$y)
	{
		$p->insert($e->getId(),$date_inscription);
		$e->insert($e->getId(),$e->getNom(),$e->getPrenom(),$e->getDate_naissance(),$e->getEcole(),$e->getMatricule());
	}
	else
	{
		if($x==$y)
		{
			echo "Vous ne pouvez pas ajouter enfant";
		}
		else
		{
			if($x<$y)
			{
				echo "Vous ne pouvez pas ajouter un nouvel enfant";
			}
		}
	}

?>