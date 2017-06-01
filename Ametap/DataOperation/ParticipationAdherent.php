<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Participation.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$a=new Adherent();
	$date_part=date('d').'/'.date('m').'/'.date('Y'); 
	$idActivite=$_POST['idActivite'];
	$p=new Participation(0,$date_part,0,'',$a->findMatriculeByLogin($_POST['login']),$idActivite);
	$test=$p->participationIsExist($a->findMatriculeByLogin($_POST['login']),$idActivite);
	if($test==true)
	{
		echo 'Vous avez déjà envoyé votre demande';
	}
	else
	{
		$p->insert($p->getDate_part(),$p->getMatriculePart(),$p->getIdActivite());
	}
?>