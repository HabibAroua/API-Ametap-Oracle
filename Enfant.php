<?php
    require_once('Connexion.php');
	class Enfant
	{
		private $id;
		private $nom;
		private $prenom;
		private $date_naissance;
		private $ecole;
		private $matricule;
		
		public function __construct($id,$nom,$prenom,$date_naissance,$ecole,$matricule)
		{
			$this->id=$id;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->date_naissance=$date_naissance;
			$this->ecole=$ecole;
			$this->matricule=$matricule;
		}
		//Getters
		public function getId()
		{
			return $this->id;
		}
		
		public function getNom()
		{
			return $this->nom;
		}
		
		public function getPrenom()
		{
			return $this->prenom;
		}
		
		public function getDate_naissance()
		{
			return $this->date_naissance;
		}
		
		public function getEcole()
		{
			return $this->ecole;
		}
		
		public function getMatricule()
		{
			return $this->matricule;
		}
		
		//Setters
		public function setId($id)
		{
			$this->id=$id;
		}
		
		public function setNom($nom)
		{
			$this->nom=$nom;
		}
		
		public function setPrenom($prenom)
		{
			$this->prenom=$prenom;
		}
		
		public function setDate_naissance($date_naissance)
		{
			$this->date_naissance=$date_naissance;
		}
		
		public function setEcole($ecole)
		{
			$this->ecole=$ecole;
		}
		
		public function setMatricule($matricule)
		{
			$this->matricule=matricule;
		}
		
		public function insert($cin,$nom,$prenom,$date_naissance,$ecole ,$matricule)
		{
			global $conn;
			$sql = "insert into Enfant values ($cin,'$nom','$prenom','$date_naissance','$ecole' ,$matricule) ";
			$res= $conn->exec($sql);
			if($res!=0)
			{
				echo "<script>alert('insertion effectué avec succes') </script>";
			}
			else
			{
				echo "<script>alert('Erreur') </script>";
			}
			
		}
	}
//$e=new Enfant(1,'Habib','Aroua','15/11/1994','Attarine',1);
//echo $e->getNom().' '.$e->getPrenom().' '.$e->getEcole().' '.$e->getMatricule().' '.$e->getId();
?>