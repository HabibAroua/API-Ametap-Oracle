<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Participation.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Conjoint.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
	require_once('C:\oraclexe\trabajo\Ametap\Model\Activite.php');
	$a=new Adherent();
	$conjoint=new Conjoint('','','','','','');
	$activite=new Activite(0,0,0,0,0,0,0,0,0,0,0,0);
	$date_part=date('d').'/'.date('m').'/'.date('Y');
    $cin=$conjoint->findCinByMatricule($a->findMatriculeByLogin($_POST['login']));	
	$idActivite=$_POST['idActivite'];
	if($cin==null)
	{
		echo "Vous n'avez pas un conjoint";
	}
	else
	{
		$p=new Participation(0,$date_part,0,'',$cin,$idActivite);
	    $test=$p->participationIsExist($cin,$idActivite);
	    if($test==true)
	    {
			echo 'Vous avez déjà envoyé votre demande';
	    }
	    else
	    {
			if($conjoint->getNombrePoint($a->findMatriculeByLogin($_POST['login']))<=0)
		    {
				echo 'Votre nombre des points ne sont pas suffisant';
		    }
			else
		    {
				if($conjoint->getNombrePoint($a->findMatriculeByLogin($_POST['login']))< $activite->findNombrePointById($idActivite))
			    {
					echo "Votre nombre des points ne sont pas suffisant car votre nombre de point est inférieur à le nombre de point de l'activité";
			    }
				else
			    {
					$p->insert($p->getDate_part(),$p->getMatriculePart(),$p->getIdActivite());			
			    }
		    }
	    }
	}
?>