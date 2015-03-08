<?php include("function.php"); ?>
<?php session_start();?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="main.css">
		<meta charset="UTF-8"/>
		<title>Bienvenue!</title>

	</head>
	<body>
		<?php include("includes/menu_principal.php");?>
		<?php include("includes/menu_ligues.php"); ?>
		<section id="boutique">
			<nav id="categorie">
				<ul>
					<?php 
						$bdd=bdd();
						$res = $bdd->query('SELECT label FROM categorie');
						while($donnee=$res->fetch()){	
					?>
						<a href="javascript:changeCat('<?php echo utf8_encode($donnee['label'])?>')">
							<li>
								<?php echo utf8_encode("$donnee[label]"); ?>
							</li>
						</a>
					<?php
						}
					?>
				</ul>	
			</nav>
			<section id="content">
				<ul>
					<?php 
						$res2 = $bdd->query('SELECT photo.url AS URL,designation,prix_unitaire,description,tva.tva_id AS TVA 
											FROM produit 
											INNER JOIN tva ON produit.tva_id=tva.tva_id
											INNER JOIN photo ON produit.produit_id=photo.id_produit
											');
						while($donnee2=$res2->fetch()){
					?>	
					<div id="produit">
						<h1> <?php echo "$donnee2[designation]";?></h1>
						<img src="<?php echo "$donnee2[URL]"; ?>"/>
						<div id="description">
							<p>
								Prix: <?php echo "$donnee2[prix_unitaire]";?>€<br/>
								Description: <?php echo utf8_encode("$donnee2[description]");?>
							</p>
								<input type="button" id="submit_commande" value="Commander"/>
						</div>
					</div>
				
					<?php
						}
					?>
				</ul>
			</section>
		</section>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="JQuery/AJAX_boutique.js"></script>
	</body>
</html>