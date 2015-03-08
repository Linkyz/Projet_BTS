<?php
	$titre='Deconnexion';

	include 'includes/head.php';
	include 'includes/connexion_class.php';
	$bdd= bdd();
	if (isset($_POST['pseudo']) AND isset($_POST['mdp']))
		{
			$connexion = new connexion($_POST['pseudo'],$_POST['mdp']);
			$verif = $connexion->verif();
			if ($verif == 'ok')
				{
					if($connexion->session())
						{
							header('Location: index.php');
						}
				}
			else
				{
					$erreur=$verif;
				}
			
		}
	
?>

<body>
		<h1>bienvenue</h1>
			<form method="post" action="connexion.php">
				<p>
					<input name="pseudo" type="text" placeholder="Pseudo..." required /><br>
					<input type="password" name="mdp" placeholer="Mot de passe ..." required /><br>
					<input type="submit" value="Se connecter!"  /> <br>
					<?php 
						if (isset($erreur))
							{
								echo $erreur;
							}
					?>
				</p>
			</form>
</body>
</html>