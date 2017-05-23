<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Participation.php');
	$date_part=date('d').'/'.date('m').'/'.date('Y');
    $id=$_GET['id'];	
	$idActivite=$_GET['idActivite'];
	$p=new Participation(0,$date_part,0,'',$id,$idActivite);
	$test=$p->participationIsExist($id,$idActivite);
	if($test==true)
	{
		echo 'Vous avez déjà envoyé votre demande';
	}
	else
	{
		$p->insert($p->getDate_part(),$p->getMatriculePart(),$p->getIdActivite());
	}
?>