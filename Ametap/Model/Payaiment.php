<?php
	require_once('Connexion.php');
	
	class Payaiment
	{
		private $id;
		private $etat;
		private $idParticipation ;
		
		public function __construct($id,$etat,$idParticipation)
		{
			$this->id=$id;
			$this->etat=$etat;
			$this->$idParticipation=$idParticipation;
		}
		
		//Getters
		public function getId()
		{
			return $this->id=$id;
		}
		
		public function getEtat()
		{
			return $this->etat;
		}
		
		public function getIdParticipation()
		{
			return $this->idParticipation;
		}
		
		//Setters
		public function setId($id)
		{
			$this->id=$id;
		}
		
		public function setEtat($etat)
		{
			$this->etat=$etat;
		}
		
		public function setIdParticipation($idParticipation)
		{
			$this->idParticipation=$idParticipation;
		}
	}
	 
?>
