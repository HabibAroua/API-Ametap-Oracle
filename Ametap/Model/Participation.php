<?php
    require_once('Connexion.php');
	
	class Participation
	{
		private $id;
		private $date_part;
		private $etat;
		private $notif;
		private $matriculePart;
		private $idActivite;
		
		public function __Construct($id,$date_part,$etat,$notif,$matriculePart,$idActivite)
		{
			$this->id=$id;
			$this->date_part=$date_part;
			$this->etat=$etat;
			$this->notif=$notif;
			$this->matriculePart=$matriculePart;
			$this->idActivite=$idActivite;
		}
		
		//Getters
		public function getID()
		{
			return $this->id;
		}
		
		public function getDate_part()
		{
			return $this->date_part;
		}
		
		public function getEtat()
		{
			return $this->etat;
		}
		
		public function getNotif()
		{
			return $this->notif;
		}
		
		public function getMatriculePart()
		{
			return $this->matriculePart;
		}
		
		public function getIdActivite()
		{
			return $this->idActivite;
		}
		
		//Setters
		
		public function setId($id)
		{
			$this->id=$id;
		}
		
		public function setDate_part($date_part)
		{
			$this->date_part=$date_part;
		}
		
		public function setEtat($etat)
		{
			$this->etat=$etat;
		}
		
		public function setNotif($notif)
		{
			$this->notif=$notif;
		}
		
		public function setMatriculePart($matriculePart)
		{
			$this->matriculePart=$matriculePart;
		}
		
		public function setIdActivite($idActivite)
		{
			$this->idActivite=$idActivite;
		}
		
		public function insert($date_part,$matriculePart,$idActivite)
		{
			$sql="insert into Participation values(Participation_sec.nextval,'$date_part',0,'',$idActivite,$matriculePart,0)";
			global $conn;
			$res=$conn->exec($sql);
			if($res!=0)
			{
				echo 'Votre demande a été envoyé avec succés';
			}
			else
			{
				echo 'Erreur';
			}
		}
		
		public function participationIsExist($matricule,$idActivite)
		{
			$sql="select MATRICULEPART from Participation where MATRICULEPART=$matricule and idActivite=$idActivite";
			global $conn;
			$res=$conn->query($sql);
			$s="";
			while($tab=$res->fetch(PDO::FETCH_NUM))
			{
				$s=$tab[0];
			
			}
			if($s==$matricule)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public function afficheNotf($matricule)
		{
			$sql=	"
   				select Participation.notif ,Activite.Nom_Activite from Participation , Activite 
       				where matriculePart=$matricule and Activite.id=IdActivite 
	   			";
			global $conn;
			$res=$conn->query($sql);
			$i=0;
			$n=0;
			while($tab=$res->fetch(PDO::FETCH_NUM))
			{
				$T[$i]=$exampleArray = array('Notif'=>$tab[0]." ",'Nom_Activite'=>$tab[1],);
				$n=$i++;
			}
			return json_encode($T);
		}
		
		public function afficheLastNotif($matricule)
		{
		    $sql="
      				select Participation.Notif , Activite.NOM_ACTIVITE from Participation,Participant,Adherent,Personnel,Activite 
	  			where 
      					Participation.id=
	   				(
						select MAX(Participation.id) from Participation 
      						where matriculePart=$matricule) and
	    					Adherent.matriculeAmetap=Personnel.matricule and 
	  					Participant.matricule=Adherent.matriculeAmetap and 
						Participation.matriculePart=Adherent.matriculeEtap and 
      						Participation.matriculePart=Participant.matricule and 
	    					Activite.id=Participation.idActivite and Participation.matriculePart=$matricule
	  		";
			global $conn;
			$res=$conn->query($sql);
			$i=0;
			$n=0;
			while($tab=$res->fetch(PDO::FETCH_NUM))
			{
				$T[$i]=$exampleArray = array('Notif'=>$tab[0]." ",'Nom_Activite'=>$tab[1],);
				$n=$i++;
			}
			return json_encode($T);	
		}
	}


?>
