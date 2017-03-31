<?php
     require_once('Connexion.php');
	 require_once('Adherent.php');
	
	 $a=new Adherent();
	 if((isset($_GET['login'])) && (isset($_GET['password'])))
	 {
	    $login=$_GET['login'];
	    $password=$_GET['password'];
	    echo $a->affiche($login,$password);
	 }
?>