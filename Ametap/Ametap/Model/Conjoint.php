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
				
			}
			else
			{
				
			}
			
		}
		
		public function update($cin,$nom,$prenom,$date_naissance,$metier,$matricule)
		{
			global $conn;
			$sql="update Conjoint set cin=$cin , nom='$nom' , prenom='$prenom' , date_naissance='$date_naissance' , metier='$metier' where matricule=$matricule and cin=$cin";
			$res=$conn->exec($sql);
			if($res!=0)
			{
				echo 'modification effectué';
			}
			else
			{
				echo 'Erreur';
			}
		}
		
		public function affiche($matricule)
		{
			$sql="select cin , nom , prenom ,date_naissance , metier from Conjoint where matricule=$matricule";
			global $conn;
			$res=$conn->query($sql);
			$i=0;
			$n=0;
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
               $T[$i]=$exampleArray = array('cin'=>$tab[0]." ",'nom'=>$tab[1]." ",'prenom'=>$tab[2]." ",'date_naissance'=>$tab[3]." ",'metier'=>$tab[4] ,);
				$n=$i++;
			}
			return json_encode($T);
		}
		
		public function deleteConjoint($cin)
		{
			$sql="delete Conjoint where cin=$cin";
			global $conn;
			$res=$conn->exec($sql);
			if($res!=0)
			{
				echo 'Suppresion effectué avec succes';
			}
			else
			{
				echo 'Erreur de suppresion';
			}
		}
		
		public function findCinByMatricule($matricule)
		{
			$sql="select Conjoint.cin from Conjoint where Conjoint.matricule=$matricule";
			global $conn;
			$res=$conn->query($sql);
			$i=0;
			$n=0;
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
               $cin=$tab[0];
			}
			return $cin;
		}
		
	}	

?>