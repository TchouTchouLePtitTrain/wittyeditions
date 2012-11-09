$(document).ready(function(){

	$('.lien_mw').click(function(event){

		//Arrêt du lien
		event.stopImmediatePropagation();

		//Détermination de l'URL à appeler
		//L'URL d'action du formulaire devient l'URL du lien
		$('#form_token').attr('action', event.target.href);
		$('#form_token').submit();
	});
	
	/*
	$('.btn_deconnexion').click(function()
	{
		FB.Connect.logout(function() 
		{ 
			window.location = 'logout'; 
		});return false;
	});*/
});
