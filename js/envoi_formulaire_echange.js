$("#contrat").submit(function(event){
event.preventDefault();
    var formContents = $(this).serialize();
    console.log(formContents);
    $.post("../req/envoi_formulaire_echange.php", formContents).always(function(){
      alert("Merci pour l'ajout");
      window.location.href = ("../site/site_accueil.php");
      });
       
    
    });
                                  
  
