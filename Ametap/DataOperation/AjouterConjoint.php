<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Conjoint.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Participant.php');
	$a=new Adherent();
	$p=new Participant();
	$cin=$_POST['cin'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_naissance=$_POST['date_naissance'];
	$metier=$_POST['metier'];
	$matricule=$a->findMatriculeByLogin($_POST['login']);
	$c=new Conjoint($cin,$nom,$prenom,$date_naissance,$metier,$matricule);
	$date_inscription=date('d').'/'.date('m').'/'.date('Y');
	if (($a->estMarie($matricule)=='M') && ($a->nombreConjointEnregistrer($matricule)==0))
	{
		$p->insert($c->getCin(),$date_inscription);
		$c->insert($c->getCin(),$c->getNom(),$c->getPrenom(),$c->getDate_naissance(),$c->getMetier(),$matricule);
		echo "L'insertion de votre conjoint est effectué avec succes";
	}
	else
	{
		if($a->nombreConjointEnregistrer($matricule)==1)
		{
			echo 'vous avez un conjoint';
		}
		else
		{
			echo 'Vous êtes célibatire';
		}
	}
	
?>