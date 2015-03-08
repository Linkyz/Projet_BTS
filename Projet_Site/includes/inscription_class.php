<?php
// je ne t'ai pas commenter toutes les initialisation de variable je pense que t'auras compris...
//include 'function.php';
	class inscription
	{
		private $pseudo;
		private	$email;
		private $mdp;
		private $mdp2;
		
		
		public function __construct($pseudo, $email, $mdp, $mdp2) 
		{
			$pseudo = htmlspecialchars($pseudo);
			$email = htmlspecialchars($email);
			
			$this->pseudo = $pseudo;
			$this->email =  $email;
			$this->mdp = $mdp;
			$this->mdp2 = $mdp2;
			$this->bdd = bdd();
		}
		
		
		public function verif()
			{
				if(strlen($this->pseudo) > 5 AND strlen($this->pseudo) < 20 )
					{// si le pseudo est bon
						// on tchek la syntacxe du mail
						
						$syntaxe = ' #^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
						if(preg_match($syntaxe, $this->email))
							{	//si la syntaxe du mail est bon
								//on tcheck si le mot de passe à entre 5 et 20 caractéres
								if(strlen($this->mdp) > 5 AND strlen($this->mdp) < 20)
									{//si le mot de pase est bon
										// on tcheck si les deux mots de passes sont identiques...
										if($this->mdp == $this->mdp2) 
											{
												return 'ok';
											}
										else
											{ /* les deux mots de passes sont mauvais */
												$erreur=' Les mots de passes renseignés ne sont pas identiques! ';
												return $erreur;
											}
									}
								else 
									{/* le premier mot de passe ne contient pas entre 5 et 20 caractéres */
										$erreur=' Le  mot de passe doit contenir entre 5 et 20 caractéres';
										return $erreur;
									}
							}
							
						else 
							{ /* email mauvais */
								$erreur = 'Syntaxe de l\'adresse email incorrect ';
								return $erreur;
							}
							
					}
					
				else
					{
					//pseudo mauvais
						$erreur = ' Le pseudo doit contenir entre 5 et 20 caractéres';
						return $erreur;
					}
				
			}
		
		public function enregistrement()
			{
				$requete = $this->bdd->prepare('INSERT INTO utilisateur (pseudo,mail,mdp) VALUES (:pseudo, :email, :mdp)');
				$requete->execute(array(
					'pseudo' => $this->pseudo,
					'email' => $this->email,
					'mdp' => $this->mdp
				));
				return 1;
			}
		
		public function  session()
			{
				$requete = $this->bdd->prepare('SELECT utilisateur_id FROM utilisateur WHERE pseudo = :pseudo');
				$requete->execute(array(':pseudo' => $this->pseudo));
				$requete = $requete->fetch();
				$_SESSION['utilisateur_id'] = $requete['utilisateur_id'];
				$_SESSION['pseudo'] = $this->pseudo;
				return 1;
			}
				
	}