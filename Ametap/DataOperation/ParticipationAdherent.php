<?php
    	require_once('C:\oraclexe\trabajo\Ametap\Model\Participation.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Activite.php');
	$a=new Adherent();
	$date_part=date('d').'/'.date('m').'/'.date('Y'); 
	$idActivite=$_POST['idActivite'];
	$activite=new Activite(0,0,0,0,0,0,0,0,0,0,0,0);
	$p=new Participation(0,$date_part,0,'',$a->findMatriculeByLogin($_POST['login']),$idActivite);
	$test=$p->participationIsExist($a->findMatriculeByLogin($_POST['login']),$idActivite);
	if($test==true)
	{
		echo 'Vous avez déjà envoyé votre demande';
	}
	else
	{
		if($a->getNombrePoint($a->findMatriculeByLogin($_POST['login']))<=0)
		{
			echo 'Votre nombre des points ne sont pas suffisant';
		}
		else
		{
			if(($a->getNombrePoint($a->findMatriculeByLogin($_POST['login'])))< $activite->findNombrePointById($idActivite))
			{
				echo " Votre nombre des points ne sont pas suffisant car ils est inférieur à le nombre de point de l'activité";
			}
		    	else
			{
				$p->insert($p->getDate_part(),$p->getMatriculePart(),$p->getIdActivite());
			}
		}
	}	
?>
