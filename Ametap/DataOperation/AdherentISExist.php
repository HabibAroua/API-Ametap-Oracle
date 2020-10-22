<?php
    require_once('C:\oraclexe\trabajo\Ametap\Model\Connexion.php');
    require_once('C:\oraclexe\trabajo\Ametap\Model\Adherent.php');
    $a=new Adherent();
    if((isset($_GET['login'])) && (isset($_GET['password'])))
    {
	    $login=$_GET['login'];
	    $password=$_GET['password'];
	    echo $a->affiche($login,$password);
    }
    else
    {
	    echo "Error !!";
    }
?>
