<?php session_start(); ?>
<?php include("function.php");
$bdd=bdd(); ?>
<?php include("includes/menu_principal.php");?>
<?php include("includes/menu_ligues.php"); ?>
<?php include("includes/monProfil_class.php"); ?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Profil</title>
		<link rel="stylesheet" href="main.css">
	</head>
<?php

	$utilisateur=$_GET['pseudo'];
	$req=$bdd->prepare('SELECT pseudo, ligue_id, Nom, Prenom, age FROM utilisateur WHERE pseudo = :utilisateur');
	$req->execute(array('utilisateur'=>$utilisateur));
	$donnees= $req->fetch();
?>
	<body>
		<h3> Profil de <?php echo $_GET['pseudo']; ?></h3>

		<table>
			<tr>
				<td>Pseudo: </td><td><?php if(isset($donnees['pseudo'])){echo($donnees['pseudo']);}else{echo('Non renseigné');} ?></td>
				<td>Ligue de références: </td><td><?php if(isset($donnees['ligue_id'])){echo($donnees['ligue_id']);}else{echo('Non renseigné');} ?></td>
			</tr>
			<tr>
				<td>nom: </td><td><?php if(isset($donnees['Nom'])){echo($donnees['Nom']);}else{echo('Non renseigné');} ?></td>
				<td>Prenom: </td><td><?php if(isset($donnees['Prenom'])){echo($donnees['Prenom']);}else{echo('Non renseigné');} ?></td>
				<td>Age: </td><td><?php if(isset($donnees['age'])){echo($donnees['age']);}else{echo('Non renseigné');} ?></td>
			</tr>
		</table>
	</body>
</html>