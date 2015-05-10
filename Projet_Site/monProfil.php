<?php session_start(); ?>
<?php include("function.php"); ?>
<?php include("includes/menu_principal.php");?>
<?php include("includes/menu_ligues.php"); ?>
<?php include("includes/monProfil_class.php"); ?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title> Mon Profil </title>
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
	<?php 
		if(isset($_SESSION['pseudo']) && isset($_SESSION['mail']) && isset($_SESSION['id']))
		{
	?>
			<h3> Bienvenue <?php echo $_SESSION['pseudo']; ?></h3>
	<?php 		$class= new monProfil($_SESSION['pseudo'],$_SESSION['mail'],$_SESSION['id']); 
				$donnees=$class->donneesProfil();
	?>
			<table>
				<tr>
					<td>Votre e-mail: </td><td><?php if(isset($donnees['mail'])){echo($donnees['mail']);}else{echo('Non renseigné');} ?></td>
					<td>Votre Pseudo: </td><td><?php if(isset($donnees['pseudo'])){echo($donnees['pseudo']);}else{echo('Non renseigné');} ?></td>
					<td>Votre Ligue de références: </td><td><?php if(isset($donnees['ligue_id'])){echo($donnees['ligue_id']);}else{echo('Non renseigné');} ?></td>
				</tr>
				<tr>
					<td>Votre nom: </td><td><?php if(isset($donnees['Nom'])){echo($donnees['Nom']);}else{echo('Non renseigné');} ?></td>
					<td>Votre Prenom: </td><td><?php if(isset($donnees['Prenom'])){echo($donnees['Prenom']);}else{echo('Non renseigné');} ?></td>
					<td>Votre Age: </td><td><?php if(isset($donnees['age'])){echo($donnees['age']);}else{echo('Non renseigné');} ?></td>
					<td>Votre adresse: </td><td><?php if(isset($donnees['adresse'])){echo($donnees['adresse']);}else{echo('Non renseigné');} ?></td>
				</tr>
				<tr>
					<td><a href="modifierProfil.php"><input type="button" value="Modifier mes infos"></a></td>
				</tr>
			</table>
	<?php 
		}
		else
		{
	?>
			<span id="error">Vous devez être connecter pour afficher cette page. Si vous rencontrez des problemes de avec votre compte vous pouvez consulter la rubrique <a href="faq.php"> Foire Aux Questions</a>;
								Si vos problemes persistent merci de nous <a href="contact.php" > contacter .</a>
			</span>
	<?php
		}
	?>
	</body>
</html>



