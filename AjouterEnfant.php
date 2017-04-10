<?php
    require_once('Enfant.php');
	require_once('Adherent.php');
	require_once('Participant.php');
	$id=$_POST['id'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_naissance=$_POST['date_naissance'];
	$ecole=$_POST['ecole'];
	
	$a=new Adherent();
	$matricule=$a->findMatriculeByLogin($_POST['login']);
	$e=new Enfant($id,$nom,$prenom,$date_naissance,$ecole,$matricule);
	echo $matricule;
	$p=new Participant();
	$date_inscription=date('d').'/'.date('m').'/'.date('Y');
	$x=$a->nombreEnfant(3);
	$y=$a->nombreEnfantEnregistrer(3);
	
	
	if($x>$y)
	{
		$p->insert($e->getId(),$date_inscription);
		$e->insert($e->getId(),$e->getNom(),$e->getPrenom(),$e->getDate_naissance(),$e->getEcole(),$e->getMatricule());
		echo 'insertion effectué avec succes';
        //echo $e->getId().' '.$e->getNom().' '.$e->getPrenom().' '.$e->getDate_naissance().' '.$e->getEcole().' '.$e->getMatricule();
	}
	else
	{
		if($x==$y)
		{
			echo "vous n'avez pas ajouter un nouveau enfant";
		}
		else
		{
			if($x<$y)
			{
				echo "vous n'avez pas ajouter un nouveau enfant";
			}
		}
	}

?>