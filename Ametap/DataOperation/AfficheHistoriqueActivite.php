<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Activite.php');
    require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
    $adherent=new Adherent();
    $activite=new Activite(0,0,0,0,0,0,0,0,0,0,0,0);
    if(isset($_GET['login']))
    {
        echo $activite->AfficheHistorique($adherent->findMatriculeByLogin($_GET['login']));
    }
    else
    {
        echo "Error !!";
    }
?>
