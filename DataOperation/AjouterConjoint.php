<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Conjoint.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Participant.php');
	$cin=$_POST['cin'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_naissance=$_POST['date_naissance'];
	$metier=$_POST['metier'];
	$c=new Conjoint($cin,$nom,$prenom,$date_naissance,$metier,$matricule);
	$a=new Adherent();
	$p=new Participant();
	$matricule=$a->findMatriculeByLogin($_POST['login']);
	echo $matricule;
	$date_inscription=date('d').'/'.date('m').'/'.date('Y');
	if ($a->estMarie($matricule)=='M')
	{
		$p->insert($c->getCin(),$date_inscription);
		$c->insert($c->getCin(),$c->getNom(),$c->getPrenom(),$c->getDate_naissance(),$c->getMetier(),$matricule);
        //echo $c->getCin().' '.$c->getNom().' '.$c->getPrenom().' '.$c->getDate_naissance().' '.$c->getMetier().' '.$c->getMatricule();
		echo "L'insertion de votre conjoint est effectué avec succes";
	}
	else
	{
		echo 'Impossible'; 
	}
?>