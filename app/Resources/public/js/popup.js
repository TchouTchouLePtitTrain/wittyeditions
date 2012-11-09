$(document).ready(function() {
	
	//Lorsque vous cliquez sur un lien de la classe poplight et que le href commence par #
	//$('a.poplight[href^=#]').
	$('[class*=popup_caller\\:]').click(function()
	{
		var popWidth = 410;

		//Faire apparaitre la pop-up et ajouter le bouton de fermeture
			//Traitement de la liste de classes de l'élément pour récupérer le type de popup à afficher
		var classes = $(this).attr('class'); //Liste des classes de l'élément caller
		var chaine_temporaire = classes.substring(classes.indexOf('popup_caller:') + 'popup_caller:'.length, classes.length); //Sous chaîne, étape intermédiaire
		var index_fin = chaine_temporaire.indexOf(' ');
		if (index_fin = -1){ index_fin = chaine_temporaire.length;}
		var type_popup = chaine_temporaire.substring(0, index_fin); //Le type de la popup, extrait de la liste de classes
		var popup = $('.popup.'+type_popup); //Détermination de la popup à afficher
		
		popup.css({
			'width': popWidth
		});
		
		popup.css({
			'width': popWidth
		});
		popup.fadeIn();

		//Récupération du margin, qui permettra de centrer la fenêtre - on ajuste de 80px en conformité avec le CSS
		var popMargTop = (popup.height() + 80) / 2;
		var popMargLeft = (popup.width() + 80) / 2;

		//On affecte le margin
		popup.css({
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});

		//Effet fade-in du fond opaque
		$('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
		
		//Apparition du fond - .css({'filter' : 'alpha(opacity=80)'}) pour corriger les bogues de IE
		$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();

		//Focus sur le premier champ
		popup.find('input[type!="hidden"]').first().focus();
		
		return false;
	});

	//Fermeture de la pop-up et du fond
	$('a.close, #fade').live('click', function() //Au clic sur le bouton ou sur le calque...
	{
		$('#fade , .popup').fadeOut(function()
		{
			$('#fade').remove();  //...ils disparaissent ensemble
		});
		return false;
	});
	
});