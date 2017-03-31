<?php
    require_once('Connexion.php');
    class Conjoint
	{
		private $cin;
		private $nom;
		private $prenom;
		private $date_naissance;
		private $metier;
		private $matricule;
		
		public function __construct($cin,$nom,$prenom,$date_naissance,$metier,$matricule)
		{
			$this->cin=$cin;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->date_naissance=$date_naissance;
			$this->metier=$metier;
			$this->matricule=$matricule;
		}
		//Getters
		public function getCin()
		{
			return $this->cin;
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
		
		public function getMetier()
		{
			return $this->metier;
		}
		
		public function getMatricule()
		{
			return $this->matricule;
		}
		
		//Setters
		public function setCin($cin)
		{
			$this->cin=$cin;
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
		
		public function setMetier($metier)
		{
			$this->metier=$metier;
		}
		
		public function setMatricule($matricule)
		{
			$this->matricule=matricule;
		}
		
		public function insert($cin,$nom,$prenom,$date_naissance,$metier,$matricule)
		{
			global $conn;
			$sql = "insert into Conjoint values ($cin,'$nom','$prenom','$date_naissance','$metier' ,'$matricule') ";
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

//$c=new Conjoint(12,'Habib','Aroua','15/11/1994','Ingenieur',3);
//echo $c->getCin().' '.$c->getNom().' '.$c->getPrenom().' '.$c->getDate_naissance().' '.$c->getMetier().' '.$c->getMatricule();

?>