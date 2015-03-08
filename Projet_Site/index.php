<?php session_start(); ?> <!--initialisation de sesssion -->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="main.css">
		<meta charset="UTF-8"/>
		<title>Bienvenue!</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="JQuery/slideshow_boutons.js"></script>
		<script type="text/javascript" src="JQuery/slideshow.js"></script>
	</head>
	<body>
		<?php include("function.php"); ?>
		<?php include("includes/menu_principal.php");?>
		<?php include("includes/menu_ligues.php"); ?>
		<section id="wrapper">
			<ul id="diaporama">
				<li>
					<a href="" title =""><img src="img/sport2.jpeg"/></a>
					<h1>La maison des ligues de Lorraine</h1>
					<p>
						Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales de Lorraine 
						et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au 
						Comité Régional Olympique et Sportif de Lorraine (CROSL). Installée depuis 2003 dans la banlieue Nancéienne, la M2L accueille l'ensemble du 
						mouvement sportif Lorrain 	qui représente près de 6 500 clubs, plus de 525 000 licenciés et près de 50 000 bénévoles. vous pouvez accédez sur d
						e site aux ligues de sports,  à leurs boutiques à leurs actualités.
					</p>
				</li>
				<li>
					<a href="" title =""><img src="img/sport2.jpeg"/></a>
					<h1>La maison des ligues de Lorraine</h1>
					<p>
						Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales de Lorraine 
						et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au 
						Comité Régional Olympique et Sportif de Lorraine (CROSL). Installée depuis 2003 dans la banlieue Nancéienne, la M2L accueille l'ensemble du 
						mouvement sportif Lorrain 	qui représente près de 6 500 clubs, plus de 525 000 licenciés et près de 50 000 bénévoles. vous pouvez accédez sur d
						e site aux ligues de sports,  à leurs boutiques à leurs actualités.
					</p>
				</li>
				<li>
					<a href="" title =""><img src="img/sport2.jpeg"/></a>
					<h1>La maison des ligues de Lorraine</h1>
					<p>
						Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales de Lorraine 
						et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au 
						Comité Régional Olympique et Sportif de Lorraine (CROSL). Installée depuis 2003 dans la banlieue Nancéienne, la M2L accueille l'ensemble du 
						mouvement sportif Lorrain 	qui représente près de 6 500 clubs, plus de 525 000 licenciés et près de 50 000 bénévoles. vous pouvez accédez sur d
						e site aux ligues de sports,  à leurs boutiques à leurs actualités.
					</p>
				</li>
				<li>
					<a href="" title =""><img src="img/sport2.jpeg"/></a>
					<h1>La maison des ligues de Lorraine</h1>
					<p>
						Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales de Lorraine 
						et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au 
						Comité Régional Olympique et Sportif de Lorraine (CROSL). Installée depuis 2003 dans la banlieue Nancéienne, la M2L accueille l'ensemble du 
						mouvement sportif Lorrain 	qui représente près de 6 500 clubs, plus de 525 000 licenciés et près de 50 000 bénévoles. vous pouvez accédez sur d
						e site aux ligues de sports,  à leurs boutiques à leurs actualités.tés.
					</p>
				</li>
				<li>
					<a href="" title =""><img src="img/sport2.jpeg"/></a>
					<h1>La maison des ligues de Lorraine</h1>
					<p>
						Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales de Lorraine 
						et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au 
						Comité Régional Olympique et Sportif de Lorraine (CROSL). Installée depuis 2003 dans la banlieue Nancéienne, la M2L accueille l'ensemble du 
						mouvement sportif Lorrain 	qui représente près de 6 500 clubs, plus de 525 000 licenciés et près de 50 000 bénévoles. vous pouvez accédez sur d
						e site aux ligues de sports,  à leurs boutiques à leurs actualités.
					</p>
				</li>
			</ul>
			<ul id="index_defilement">
				<li><img src="img/index_defil_on.jpg" id="bouton_defil1"/></li>
				<li><img src="img/index_defil_off.jpg" id="bouton_defil2"/></li>
				<li><img src="img/index_defil_off.jpg" id="bouton_defil3"/></li>
				<li><img src="img/index_defil_off.jpg" id="bouton_defil4"/></li>
				<li><img src="img/index_defil_off.jpg" id="bouton_defil5"/></li>
			</ul>
			<div id="defilement">
				<a href="javascript:diaposScroll(-1)" title="Diapo précédente" class="precedente"> <img src="img/precedent_diap.png" id="img_prec"/></a>
				<a href="javascript:diaposScroll(1)" title="Diapo suivante" class="suivante"><img src="img/suivant_diap.png" id="img_suiv"/> </a>
			</div>
		</section>
	</body>
</html>