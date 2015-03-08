<?php
//include 'function.php';
class addPost
	{
		private $titre;
		private $contenu;
		private $bdd;
		
		public function __construct($titre,$contenu)
			{
					$this->titre = htmlspecialchars($titre);
					$this->contenu = $contenu;
					$this->bdd = bdd();
			}
		public function verif()
			{
				if(strlen($this->contenu) > 2) // Si on a bien un message
					{
						return'ok';
					}
				else // si on a pas de contenu de message
					{
						$erreur= 'Veuillez entrez un message un peu plus long.... ';
						return $erreur;
					}
					
			}
		public function insert()
			{
				

				$requete=$this->bdd->prepare('SELECT topic_id  FROM topic WHERE titre=:titre');
				$requete->execute(array('titre'=>utf8_decode($this->titre)));
				$id=$requete->fetch();
				$requete2 = $this->bdd->prepare('INSERT INTO msg_forum(auteur_id,contenu,date,topic_id) VALUES (:idm,:contenu,NOW(),:id)');
				$requete2->execute(array('idm'=>$_SESSION['id'], 'contenu'=>$this->contenu,'id'=>$id['topic_id']));
				
				return 1;
			}
	}
?>