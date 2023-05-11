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
				echo "L'insertion de votre enfant est effectué avec succés";
			}
			else
			{
				echo 'Erreur';
			}
		}
		
		public function update($id,$nom,$prenom,$date_naissance,$ecole,$matricule)
		{
			global $conn;
			$sql="update Enfant set id=$id , nom='$nom' , prenom='$prenom' , date_naissance='$date_naissance' , ECOLE='$ecole' where matricule=$matricule and id=$id";
			$res=$conn->exec($sql);
			if($res!=0)
			{
				echo 'La mise à jour de votre enfant est effectué avec succés';
			}
			else
			{
				echo 'Erreur';
			}
		}
		
		public function afficheEnfant($matricule)
		{
			$sql="select * from Enfant where matricule=$matricule ";
			global $conn;
			$res=$conn->query($sql);
			$i=0;
			$n=0;
            		while($tab=$res->fetch(PDO::FETCH_NUM))
            		{
               			$T[$i]=$exampleArray = array
							(
								'id'=>$tab[0],
								'nom'=>$tab[1],
								'prenom'=>$tab[2],
								'date_naissance'=>$tab[3],
								'ecole'=>$tab[4]
							);
				$n=$i++;
			}
			return json_encode($T);
		}
		
		public function deleteEnfant($id)
		{
			$sql="delete Enfant where id=$id";
			global $conn;
			$res=$conn->exec($sql);
			if($res!=0)
			{
				echo 'La suppression de votre enfant est effectué avec succés';
			}
			else
			{
				echo 'Erreur de suppresion';
			}
		}
		
		public function getNombrePoint($matricule)
		{
			$sql="select distinct Adherent.NOMBRE_POINT from Adherent , Enfant 
				where Adherent.matriculeEtap=Enfant.matricule
				and 
				Enfant.matricule=$matricule";
			
			global $conn;
			$res=$conn->query($sql);
            		while($tab=$res->fetch(PDO::FETCH_NUM))
            		{
               			$r=$tab[0];
			}
			return $r;
		}
	}

?>
