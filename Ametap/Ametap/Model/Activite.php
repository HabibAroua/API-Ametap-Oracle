<?php
    require_once('Connexion.php');
	class Activite
	{
		private $id;
		private $nom_activite;
		private $capacite;
		private $nombre_participant;
		private $date_debut;
		private $date_fin;
		private $prix_unitaire;
		private $montant_prevu;
		private $montant_actuel;
		private $id_TypeActivite;
		private $idBudget;
		private $idOrganisateur;
		
		public function __construct($id,$nom_activite,$capacite,$nombre_participant,$date_debut,$date_fin,$prix_unitaire,$montant_prevu,$montant_actuel,$id_TypeActivite,$idBudget,$idOrganisateur)
		{
			$this->id=$id;
			$this->nom_activite=$nom_activite;
			$this->capacite=$capacite;
			$this->nombre_participant=$nombre_participant;
			$this->date_debut=$date_debut;
			$this->date_fin=$date_fin;
			$this->prix_unitaire=$prix_unitaire;
			$this->montant_prevu=$montant_prevu;
			$this->montant_actuel=$montant_actuel;
			$this->id_TypeActivite=$id_TypeActivite;
			$this->idBudget=$idBudget;
			$this->idOrganisateur=$idOrganisateur;
		}
		
		public function sellectAllActivity()
		{
		 	$sql="select Activite.ID , Activite.Nom_activite , Activite.date_debut , Activite.date_fin , Activite.PRIX_UINITAIRE , Organisateur.nom_organisateur  from Activite , organisateur where (sysdate>=Activite.date_debut_inscription) and (sysdate<=Activite.date_fin_inscription)  and Organisateur.id=Activite.idOrganisateur";
            global $conn;
            $res=$conn->query($sql);
		 	$i=0;
		 	$n=0;
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
               $T[$i]=$exampleArray = array('ID'=>$tab[0]." ",'Nom_activite'=>$tab[1]." ",'date_debut'=>$tab[2]." ",'date_fin'=>$tab[3]." ",'prix_unitaire'=>$tab[4]." ",'nom_organisateur'=>$tab[5] ,);
		 		$n=$i++;
		 	}
		 	return json_encode($T);
		}
		
		public function AfficheHistorique($matricule)
		{
			$sql="select Activite.id , Activite.nom_activite , Activite.date_debut , Activite.date_fin from Activite , Participation , Participant , Personnel , Adherent where Personnel.matricule=Adherent.matriculeEtap and Adherent.matriculeAmetap=Participant.matricule and Participant.matricule=Participation.matriculePart and Participation.matriculePart=Adherent.matriculeEtap and Participation.matriculePart=Participant.matricule and Personnel.matricule=Participation.matriculePart and Participation.matriculePart=$matricule and Participation.etat=1 and Participation.ETATPAYAIMENT=1 and Activite.id=Participation.idActivite and Adherent.matriculeEtap=$matricule order by Activite.date_debut ";
            global $conn;
            $res=$conn->query($sql);
		 	$i=0;
		 	$n=0;
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
               $T[$i]=$exampleArray = array('ID'=>$tab[0]." ",'Nom_activite'=>$tab[1]." ",'date_debut'=>$tab[2]." ",'date_fin'=>$tab[3]." ",'prix_unitaire'=>$tab[4]." ",'nom_organisateur'=>$tab[5] ,);
		 		$n=$i++;
		 	}
		 	return json_encode($T);
		}
	}
?>