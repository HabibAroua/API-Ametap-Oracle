<?php
    	require_once('C:\oraclexe\trabajo\Ametap\Model\Participation.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Enfant.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Activite.php');
	$date_part=date('d').'/'.date('m').'/'.date('Y');
	$p=new Participation(0,$date_part,0,'',$_POST['id'],$_POST['idActivite']);
	$e=new Enfant(0,0,0,0,0,0);
	$a=new Adherent();
	$activite=new Activite(0,0,0,0,0,0,0,0,0,0,0,0);
	$test=$p->participationIsExist($_POST['id'],$_POST['idActivite']);
	
	if($test==true)
	{
		echo 'Vous avez déjà envoyé votre demande';
	}
	else
	{
		if($e->getNombrePoint($a->findMatriculeByLogin($_POST['login']))<=0)
		{
			echo 'Votre nombre des points ne sont pas suffisant';
		}
		else
		{
			if($e->getNombrePoint($a->findMatriculeByLogin($_POST['login']))< $activite->findNombrePointById($_POST['idActivite']))
			{
				echo "Votre nombre des points ne sont pas suffisant car votre nombre de point est inférieur à le nombre de point de l'activité";
			}
			else
			{
				$p->insert($p->getDate_part(),$p->getMatriculePart(),$p->getIdActivite());
			}
			
		}
	}
	
?>
