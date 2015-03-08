<?php
	include '../function.php';
	$bdd=bdd();
	$requete = $bdd->prepare('SELECT designation,description,prix_unitaire,photo.url AS url_photo
								FROM produit 
								INNER JOIN categorie ON categorie.categorie_id=produit.categorie_id
								INNER JOIN photo ON photo.id_produit=produit.produit_id
								WHERE label=:objet');
	$requete->execute(array('objet'=>$_POST['req']));
		$i=0;
		$table_data=array();
		while($retour=$requete->fetch()){
			$table_data[$i]=array('designation'=>$retour['designation'],'description'=>$retour['description'],'prix_unitaire'=>$retour['prix_unitaire'],'url_photo'=>$retour['url_photo']);
			$i=$i+1;
		}
		if($table_data)
			echo json_encode($table_data);
?>