function changeCat(donnee){
	var req=donnee;
	$.post(
		"scriptPHP/AJAX_boutique_bdd.php",
		{
			req:req
		},
		function(data){
			$('#content').empty();
			if(data){
				var result = jQuery.parseJSON(data);
				var i=0;
				var conteneur;
				while(result[i]){
					conteneur=$('#content').html();
					var ctext=	
						"<div id=\"produit\">"+
							"<h1>" +result[i].designation+"</h1>"+
							"<img src=\""+result[i].url_photo+"\"/>"+
							"<div id=\"description\">"+
								"<p>"+
									"Prix: "+result[i].prix_unitaire+"€<br/>"+
									"Description:" +result[i].description+
								"</p>"+
									"<input type=\"button\" id=\"submit_commande\" value=\"Commander\"/>"+
							"</div>"+
						"</div>"
					;
					i=i+1;
					$('#content').html(conteneur+ctext);
				}	
			}
		}
	);
};