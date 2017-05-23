<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Conjoint.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$a=new Adherent();
	$cin=$_POST['cin'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_naissance=$_POST['date_naissance'];
	$metier=$_POST['metier'];
	$matricule=$a->findMatriculeByLogin($_POST['login']);
	$c=new Conjoint($cin,$nom,$prenom,$date_naissance,$metier,$matricule);
	$c->update($c->getCin(),$c->getNom(),$c->getPrenom(),$c->getDate_naissance(),$c->getMetier(),$c->getMatricule());
?>