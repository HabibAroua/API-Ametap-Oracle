<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Enfant.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$a=new Adherent();
	$id=$_POST['id'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_naissance=$_POST['date_naissance'];
	$ecole=$_POST['ecole'];
	$matricule=$a->findMatriculeByLogin($_POST['login']);
	$e=new Enfant($id,$nom,$prenom,$date_naissance,$ecole,$matricule);
	$e->update($e->getId(),$e->getNom(),$e->getPrenom(),$e->getDate_naissance(),$e->getEcole(),$e->getMatricule());
?>