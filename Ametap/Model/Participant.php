<?php
	require_once('Connexion.php');
    
	class Participant
	{
		
	    	function insert($matricule,$date_inscription)
	    	{
			$sql="insert into Participant values ($matricule,'$date_inscription')";
			global $conn;
			$res=$conn->exec($sql);
			if($res!=0)
			{
				return true ;
			}
			else
			{
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
				return true ;
			}
			else
			{
				return false;
			}
		}
	}
?>
