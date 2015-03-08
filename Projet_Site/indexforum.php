<?php
	include 'includes/head.php';
	//include 'function.php';
	include 'includes/addPost_class.php';
	$bdd = bdd();
?>
<div id="forum3">
	<?php

		if (!isset($_SESSION['id'])){
			if(isset($_GET['forum'])){ // si on est dans une categorie	
				$_GET['forum'] = htmlspecialchars($_GET['forum']);
	?> 
				<div class="categorie">
					<h3> <?php echo $_GET['forum']; ?> </h3>
				</div>
				<p class="retour"> <a href="javascript:history.go(-1)">Retour à la page précédente</a></p>

	<?php
				$requete = $bdd->prepare('SELECT 
							topic.titre AS titre,
							topic.topic_id AS id
							FROM topic 
							INNER JOIN forum ON topic.forum_id=forum.forum_id
							WHERE forum.titre = :forum ');
				$requete->execute(array('forum' =>$_GET['forum']  ));
				
				while($reponse =$requete->fetch()){	
	?>
					<div class="categorie">
						<a href="indexforum.php?topic=<?php echo utf8_encode($reponse['titre']); ?>">
							<h1><?php echo utf8_encode($reponse['titre']); ?></h1>
						</a>
					</div>
	<?php
				}
			}	

			else if(isset($_GET['topic'])){	
				$requete = $bdd->prepare('SELECT contenu,
							utilisateur.pseudo AS pseudo
							FROM topic 
							INNER JOIN utilisateur ON topic.auteur_id=utilisateur.utilisateur_id
							WHERE topic.titre = :topic');
				$requete->execute(array('topic'=> utf8_decode($_GET['topic'])));
				$res=$requete->fetch();	
	?>
				<p class="retour"> <a href="javascript:history.go(-1)">Retour à la page précédente</a></p>
				<div class="categorie">
					<h1> <?php echo $_GET['topic']; ?> </h1>
					<div class="categorie" >
						<?php	echo $res['pseudo']; echo ': <br>';?>
						<p><?php echo utf8_encode($res['contenu']); ?></p>
					</div>
				</div>
	<?php
				$requete = $bdd->prepare('SELECT 
							msg_forum.contenu AS contenu,
							msg_forum.auteur_id AS auteur
							FROM msg_forum 
							INNER JOIN topic ON topic.topic_id=msg_forum.topic_id
							WHERE topic.titre = :topic');
				$requete->execute(array('topic'=> utf8_decode($_GET['topic'])));
				while ($reponse = $requete->fetch()){ 
	?>
					<div class="categorie" >
						
	<?php 
						$requete2 = $bdd->prepare('SELECT pseudo FROM utilisateur WHERE utilisateur_id =:id');
						$requete2->execute(array('id'=>$reponse['auteur']));
						$membres = $requete2->fetch();

	?>
						<div class="categorie" >
							<?php echo $membres['pseudo']; echo ': <br>';?>
							<p><?php echo utf8_encode($reponse['contenu']); ?></p>
						</div>
					</div>
						
	<?php
				}	 
			}


			else {	//sinon on est sur la page d'index...
	?>
				<h1>Bienvenue a la page d acceuil</h1>
				<p class="retour"> <a href="javascript:history.go(-1)">Retour à la page précédente</a></p>
	<?php 
				$requete = $bdd->query ('SELECT * FROM forum');
				while ($reponse = $requete->fetch()){	
	?>
					<div class="categorie">
						<a href=" indexforum.php?forum=<?php echo utf8_encode($reponse['titre']); ?>"> <?php echo utf8_encode($reponse['titre']); ?> </a>
					</div>
	<?php
				}
			}
		}

		else{					
			if (isset($_POST['contenu']) AND isset($_POST['topic'])){
				$addPost = new addPost($_POST['topic'],$_POST['contenu']);
				$verif = $addPost->verif();
				// si tout est bon
				if($verif == 'ok'){
					if($addPost->insert()){
						// on reste sur la même page!
					}
				}
				else{ // si on a une erreur
					$erreur =$verif;
				}
			}
			if(isset($_GET['forum'])){// si on est dans une categorie	
				$_GET['forum'] = htmlspecialchars($_GET['forum']);
	?>
				<p class="retour"> <a href="javascript:history.go(-1)">Retour à la page précédente</a></p>
				<div class="categorie"> <p> <?php echo $_GET['forum']; ?></p></div>
				<a class="bouton2 "href="addSujet.php?forum=<?php echo $_GET['forum']; ?>"> Ajouter un sujet</a>		

	<?php	
					$requete = $bdd->prepare('SELECT 
								topic.titre AS titre,
								topic.topic_id AS id
								FROM topic 
								INNER JOIN forum ON topic.forum_id=forum.forum_id
								WHERE forum.titre = :forum ');
					$requete->execute(array('forum' =>$_GET['forum']  ));
					
				while($reponse =$requete->fetch()){	
	?>
					<div class="categorie">
						<a href="indexforum.php?topic=<?php echo utf8_encode($reponse['titre']); ?>">
							<h1><?php echo utf8_encode($reponse['titre']); ?></h1>
						</a>
					</div>
	<?php
				}
			}

			elseif(isset($_GET['topic'])){	
				//$i=0;
				/*$req = $bdd->prepare('SELECT COUNT(*) AS nb FROM postsujet WHERE sujet= :sujet');
				$req->execute(array('sujet'=>$_GET['sujet']));
				$req = $req->fetch();
				$nbmsg = $req['nb'];*/

				$requete3 = $bdd->prepare('SELECT forum.titre AS titre FROM forum 
							INNER JOIN topic ON topic.forum_id=forum.forum_id	
							WHERE topic.titre= :name');
				$requete3->execute(array('name'=>utf8_decode($_GET['topic'])));
				$categorie = $requete3->fetch();
	?>
				<div class="categorie">
					<h3><?php echo $categorie['titre']; ?></h3>
				</div>
				
				<div id="allpost">
	<?php
					$requete = $bdd->prepare('SELECT contenu,
								utilisateur.pseudo AS auteur,
								date
								FROM topic 
								INNER JOIN utilisateur ON topic.auteur_id=utilisateur.utilisateur_id
								WHERE topic.titre = :topic');
					$requete->execute(array('topic'=> utf8_decode($_GET['topic'])));
					$res=$requete->fetch();	
	?>
					<p class="retour"> <a href="javascript:history.go(-1)">Retour à la page précédente</a></p>
					<div class="categorie">
						<div class="sujet">
							<h1> <?php echo $_GET['topic']; ?> </h1>
						</div>
						<div class="categorie" >	
							<?php	echo '<h6>' .$res['auteur']. '</h6> <h5>       à '.$res['date']. ':</h5><br>'?>
							<p><?php echo utf8_encode($res['contenu']); ?></p>
						</div>
					</div>
	<?php

					$requete = $bdd->prepare('SELECT 
								msg_forum.contenu AS contenu,
								utilisateur.pseudo AS auteur,
								msg_forum.date AS date
								FROM msg_forum 
								INNER JOIN topic ON topic.topic_id=msg_forum.topic_id
								INNER JOIN utilisateur ON msg_forum.auteur_id=utilisateur.utilisateur_id
								WHERE topic.titre = :topic');
					$requete->execute(array('topic'=> utf8_decode($_GET['topic'])));
					while ($reponse = $requete->fetch()){
	?>
						<div class="categorie" >
							<div class="categorie" >
								<?php	echo '<h6>' .$reponse['auteur']. '</h6> <h5>       à '.$reponse['date']. ':</h5><br>';	?>
								<p><?php echo utf8_encode($reponse['contenu']); ?></p>
							</div>
						</div>
						
	<?php
					}	 
					
	?>
					<form method="post" action="indexforum.php?topic=<?php echo $_GET['topic']; ?>" >
						<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
						<textarea name="contenu" id="sujet" placeholder="votre masseage" ></textarea>
						<script type="text/javascript">
						    CKEDITOR.replace( 'sujet');
						</script>
						<input type="hidden" name="topic" value="<?php echo $_GET['topic']; ?>">
						<input type ="submit" class="bouton1" value="ajouter à la conversation"> 
	<?php 
						if(isset($erreur)){
							echo $erreur;
						}
	?>
					</form>

				</div>
						
	<?php
			}
			else {	//sinon on est sur la page d'index...
	?>
				<p class="retour"> <a href="javascript:history.go(-1)">Retour à la page précédente</a></p>
				<h1>Bienvenue sur la page d'acceuil du forum <?php echo $_SESSION['pseudo']; ?></h1>
	<?php 
				$requete = $bdd->query ('SELECT * FROM forum');
				while ($reponse = $requete->fetch()){	
	?>
					<div class="categorie">
						<a class="linkin" href="indexforum.php?forum=<?php echo utf8_encode($reponse['titre']); ?>"> <?php echo utf8_encode($reponse['titre']); ?> </a>
					</div>
	<?php
				}
			}
		}
	?>
	</section>
	</body>
</div>
</html>
		