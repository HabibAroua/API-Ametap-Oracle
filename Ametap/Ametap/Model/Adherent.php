<?php
    require_once("connexion.php");
	
	class Adherent
	{
		private $cin;
		private $nom;
		private $prenom;
		private $situation;
		private $email;
		private $nombre_enfant;
		private $nombre_point;
		private $telephone;
		
		public function __construct()
		{}
		public function insert($matriculeEtap,$matriculeAmetap,$login,$password)
		{

			$sql="insert into ADHERENT values ($matriculeEtap, $matriculeAmetap,'$login','$password',0)";
			global $conn;
			$res=$conn->exec($sql);
			if($res!=0)
			{
				echo "<script>alert('L'adherent est ajouté avec succes')</script>";
				return true ;
			}
			else
			{
				echo "<script>alert('Erreur de ')</script>";
				return false;
			}

		}
		
		//Cin
		public function getCin()
		{
			return $this->cin;
		}
		
		public function setCin($cin)
		{
			$this->cin=$cin;
		}
		
		//Nom
		public function getNom()
		{
			return $this->nom;
		}
		
		public function setNom($nom)
		{
			$this->nom=$nom;
		}
		
		//Prenom
		public function getPrenom()
		{
			return $this->prenom;
		}
		public function setPrenom($prenom)
		{
			$this->prenom=$prenom;
		}
		
		//Sistuation
		public function getSituation()
		{
			return $this->situation;
		}
		public function setSituation($situation)
		{
			$this->situation=$situation;
		}
		
		//Email
		public function getEmail()
		{
			return $this->email;
		}
		
		public function setEmail($email)
		{
			$this->email=$email;
		}
		
		//Nombre enfant
		public function getNombre_enfant()
		{
			return $this->nombre_enfant;
		}
		
		public function setNombre_enfant($nombre)
		{
			$this->nombre=$nombre;
		}

		
		//Telephone
		public function getTelephone()
		{
			return $this->telephone;
		}
		public function setTelephone()
		{
			$this->telephone=telephone;
		}
		
		public function affiche($login,$password)
		{
			$sql="select login , password from Adherent where login='$login' and password='$password' ";
            global $conn;
            $res=$conn->query($sql);
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
                $exampleArray = array('login'=>$tab[0]." ",'password'=>$tab[1],);
			}
			return json_encode($exampleArray);
		}
		
		public function estMarie($matricule)
		{
			$sql="select Etat_civil from Personnel where matricule=$matricule" ;
			global $conn;
			$res=$conn->query($sql);
			while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				$etat_civil= $tab[0];
			}
			return $etat_civil;
		}
		
		public function nombreEnfant($matricule)
		{
			$sql="select NBR_ENFANT from Personnel where matricule=$matricule" ;
			global $conn;
			$res=$conn->query($sql);
			while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				$nbr_enfant= $tab[0];
			}
			return $nbr_enfant;
		}
		
		public function nombreEnfantEnregistrer($matricule)
		{
			$sql="select count(*) from Enfant where matricule=$matricule ";
			global $conn;
			$res=$conn->query($sql);
			while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				$nbr_enfant= $tab[0];
			}
			return $nbr_enfant;
		}
		
		public function findMatriculeByLogin($login)
		{
			$sql="select matriculeAmetap from Adherent where login='$login' ";
			global $conn;
			$res=$conn->query($sql);
			while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				$matricule= $tab[0];
			}
			return $matricule;
			
		}
		
		public function afficheFamile($matricule)
		{
			$sql="select conjoint.cin as Identificateur , conjoint.nom, conjoint.prenom , conjoint.date_naissance from conjoint where conjoint.matricule=$matricule union all select Enfant.id , Enfant.nom, Enfant.prenom , Enfant.date_naissance from Enfant where Enfant.matricule=$matricule";
			global $conn;
			$res=$conn->query($sql);
			$i=0;
			$n=0;
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
               $T[$i]=$exampleArray = array('identificateur'=>$tab[0]." ",'nom'=>$tab[1]." ",'prenom'=>$tab[2]." ",'date_naissance'=>$tab[3] ,);
				$n=$i++;
			}
			return json_encode($T);
		}
		
		public function modifierInformationPersonnel($oldLogin,$newLogin,$newPassword)
		{
			$sql="update Adherent set login='$newLogin' , password='$newPassword' where Login='$oldLogin' ";
			global $conn;
			$res=$conn->exec($sql);
			if($res!=0)
			{
				echo 'Modification effectué avec succes';
			}
			else
			{
				echo 'Erreur de modification';
			}
		}
		
		public function getNombrePoint($matricule)
		{
			$sql="select Nombre_point from adherent where matriculeEtap=$matricule";
			global $conn;
			$res=$conn->query($sql);
			$ch='';
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
               $ch=$tab[0];
			}
			return $ch;
		}
	}

?>