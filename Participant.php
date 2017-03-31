<?php
    require_once('Connexion.php');
    
	class Participant
	{
		function __construct()
		{
			
		}
	    function insert($matricule,$date_inscription)
	    {
            $sql="insert into Participant values ($matricule,'$date_inscription')";
			global $conn;
			$res=$conn->exec($sql);
			//echo $sql ;
			if($res!=0)
			{
				echo "<script>alert('Enregistrer')</script>";
				return true ;
			}
			else
			{
				echo "<script>alert('Erreur de ')</script>";
				return false;
			}		
	    }
		
		function deletes($matricule)
		{
			$sql="delete participant where matricule=$matricule";
			global $conn;
			$res=$conn->exec($sql);
			if($res!=0)
			{
				echo "<script>alert('participant supprimer')</script>";
				return true ;
			}
			else
			{
				echo "<script>alert('Erreur de ')</script>";
				return false;
			}
			
		}
	}

?>