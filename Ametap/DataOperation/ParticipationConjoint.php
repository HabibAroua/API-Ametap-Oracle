<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Participation.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Conjoint.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	$a=new Adherent();
	$conjoint=new Conjoint('','','','','','');
	$date_part=date('d').'/'.date('m').'/'.date('Y');
    $cin=$conjoint->findCinByMatricule($a->findMatriculeByLogin($_POST['login']));	
	$idActivite=$_POST['idActivite'];
	$p=new Participation(0,$date_part,0,'',$cin,$idActivite);
	$test=$p->participationIsExist($cin,$idActivite);
	if($test==true)
	{
		echo 'Vous avez déjà envoyé votre demande';
	}
	else
	{
		$p->insert($p->getDate_part(),$p->getMatriculePart(),$p->getIdActivite());
	}
?>