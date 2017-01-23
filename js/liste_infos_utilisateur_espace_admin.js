$("#contrat" ).submit(function(event){
    	var formContents = $(this).serialize();    	
    	  $.post("../req/liste_utilisateurs_espace_admin.php", formContents).done(function(data){
        console.log(data[0]);  
        $('#myDiv').html("</br>Utilisateur sélectionné : ");
        $('#myDiv').append(data[0].prenom_utilisateur);
        $('#myDiv').append(" ");
        $('#myDiv').append(data[0].nom_utilisateur);
        
        $('#myDiv3').html("Liste des villes qu'il a rajouté sur le site : ")
        for(var x=0; x<data.length; x++){
          $('#myDiv3').append(data[x].nom_ville);
          $('#myDiv3').append(" ");} ;
          
        $('#myDiv4').html("</br>Liste des pays qu'il a rajouté sur le site : ")
        for(var j=0; j<data.length; j++){
          $('#myDiv4').append(data[j].nom_pays);
          $('#myDiv4').append(" ");};
          
        $('#myDiv5').html("Liste des universités qu'il a rajouté sur le site : ")
        for(var j=0; j<data.length; j++){
          $('#myDiv5').append(data[j].nom_universite);
          $('#myDiv5').append(" ");};
          
        $('#myDiv6').html("Liste des entreprises qu'il a rajouté sur le site : ")
        for(var j=0; j<data.length; j++){
          $('#myDiv6').append(data[j].nom_entreprise);
          $('#myDiv6').append(" ");};
          
        $('#myDiv7').html("</br><input type='button' name='button_delete' id='button_delete' value='Supprimer cet incongru qui a mis des bêtises sur ton super super stylé'>");  
        $("#myDiv7").click(function(){
          var idUser=data[0].id_utilisateur;
          if(idUser !=1){
          $.ajax({
            type: "POST",
            url: "../req/supprimer_utilisateur_admin.php",
            data:{ id_utilisateur: idUser}});
          alert("Bravo, tu as triomphé de cet ingrat");
          location.reload();}
          else{
          alert("La vie est dure mais tiens bon, ne te supprime pas toi-même !")};
          });
         
      }); 
      return false;
});  
