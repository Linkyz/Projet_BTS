<?php
	include 'includes/head.php';
	//include 'function.php';
	include 'includes/addPost_class.php';
	$bdd = bdd();
?>
<div id="forum3">
	<?php
		// SI ON A POSTE UN MESSAGE
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
		// SI ON EST DANS UN FORUM
		if(isset($_GET['forum']) AND!isset($_GET['topic'])){ 	
			$forum_titre=$bdd->prepare('SELECT titre FROM forum WHERE forum_id=:id'); // RECUPERE LE TITRE DU FORUM
			$forum_titre->execute(array('id'=>$_GET['forum']));
			$rep=$forum_titre->fetch();
	?> 
			<div class="categorie">
				<h3> <?php echo $rep['titre']; ?> </h3>
			</div>
			<p class="retour"> <a href="javascript:history.go(-1)">Retour à la page précédente</a></p>

	<?php
			$requete = $bdd->prepare('SELECT titre,	topic_id,forum_id FROM topic WHERE  forum_id= :forum '); // RECUPERE LES TOPIC APPARTENANT AU FORUM
			$requete->execute(array('forum' =>$_GET['forum']  ));
			while($reponse =$requete->fetch()){	// On affiche les sujets
	?>
				<div class="categorie">
					<a href="indexforum.php?forum=<?php echo $_GET['forum']?>&topic=<?php echo $reponse['topic_id']; ?>"> 
						<h1><?php echo utf8_encode($reponse['titre']); ?></h1>
					</a>
				</div>
	<?php
			}
			// SI ON EST LOGGE ON PEUT CREER UN SUJET
			if(isset($_SESSION['id'])){
	?>
				<a class="bouton2 "href="addSujet.php?forum=<?php echo $_GET['forum']; ?>"> Ajouter un sujet</a>
	<?php
			}	
		}
		// SI ON EST DANSUN TOPIC
		else if(isset($_GET['topic'])){	
			$requete = $bdd->prepare('SELECT titre,contenu,utilisateur.pseudo AS pseudo
						FROM topic 
						INNER JOIN utilisateur ON topic.auteur_id=utilisateur.utilisateur_id
						WHERE topic_id = :topic');
			$requete->execute(array('topic'=> $_GET['topic']));
			$res=$requete->fetch();	
	?>
			<p class="retour"> <a href="javascript:history.go(-1)">Retour à la page précédente</a></p>
			<div class="categorie">
				<h1> <?php echo utf8_encode($res['titre']); ?> </h1>
				<div class="categorie" >
					<?php	echo $res['pseudo']; echo ': <br>';?>
					<p><?php echo utf8_encode($res['contenu']); ?></p>
				</div>
			</div>
	<?php
			$requete = $bdd->prepare('SELECT contenu,pseudo,date
						FROM msg_forum 
						INNER JOIN utilisateur ON utilisateur.utilisateur_id=msg_forum.auteur_id
						WHERE topic_id = :topic');
			$requete->execute(array('topic'=> $_GET['topic']));
			while ($reponse = $requete->fetch()){ 
	?>
				<div class="categorie" >
					<div class="categorie" >
						<?php	echo '<h6>' .$reponse['pseudo']. '</h6> <h5>       à '.$reponse['date']. ':</h5><br>';	?>
						<p><?php echo utf8_encode($reponse['contenu']); ?></p>
					</div>
				</div>
						
	<?php
			}
			// SI ON EST LOGGE ON PEUT ENVOYAER UN MESSAGE
			if(isset($_SESSION['id'])){
	?>
				<form method="post" action="indexforum.php?topic=<?php echo $_GET['topic']; ?>" >
					<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
					<textarea name="contenu" id="sujet" placeholder="votre message" ></textarea>
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
	<?php
				}
			}
		// SI ON EST SUR LA PAGE D'INDEX DU FORUM
		else {	
	?>
			<h1>Bienvenue a la page d acceuil</h1>
			<p class="retour"> <a href="javascript:history.go(-1)">Retour à la page précédente</a></p>
	<?php 
			$requete = $bdd->query ('SELECT forum_id,titre FROM forum');
			while ($reponse = $requete->fetch()){	
	?>
				<div class="categorie">
					<a href=" indexforum.php?forum=<?php echo utf8_encode($reponse['forum_id']); ?>"> <?php echo utf8_encode($reponse['titre']); ?> </a>
				</div>
	<?php
			}
		}
			
	?>
	</section>
	</body>
</div>
</html>
		