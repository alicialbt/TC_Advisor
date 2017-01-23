$(document).ready(function() {
    $('#liste_villes').hide();
    $('#infos_ville').hide();
    $('#nouvelle_recherche').hide();
    $.ajax({
        url: "../req/liste_pays_stages.php"
    }).then(function(data) {
       
   	   $('#intropage').append("<h2>Recherche par Pays</h2><span class='byline'>Puis par ville !</span></header><p>Choisis le pays qui t'intéresse dans la liste :</p>");
       for(var x=0; x<data.length; x++){
          var pays = data[x].nom_pays;
          $('#liste_pays').append("<OPTION value='"+pays+"'>"+pays+"</option></br>");
          }       

    });
     $.ajax({
        url: "../req/liste_stages.php"
    }).then(function(data) {       
   	   $('#introstage').append("<br><br><h2>Recherche par entreprise</h2></br><p>Choisis l'entreprise qui t'intéresse dans la liste :</p>");
       for(var x=0; x<data.length; x++){
          var entreprise = data[x].nom_entreprise;
          $('#liste_entreprise').append("<OPTION value='"+entreprise+"'>"+entreprise+"</option></br>");
          }       

    });
});


function checkField(){
  var pays = document.getElementById("liste_pays").value;
  $.ajax({
            type: "POST",
            url: "../req/liste_villes_stage.php",
            data:{ nom_pays: pays}})
    .done(function(data){
        console.log(data);
      $('#introstage').hide();
      $('#liste_entreprise').hide();
       $('#liste_villes').show();
       $('#introvilles').html("</br><p>Choisis la ville qui t'intéresse dans le pays :  " +pays+"</p> Si elle n'est pas présente dans la liste, c\'est qu\'il n\'y a pas encore d\'informations disponibles dessus :(");
       $('#liste_villes').html("<OPTION value=''></option>");
       for(var x=0; x<data.length; x++){
        var ville = data[x].nom_ville;
        $('#liste_villes').append("<OPTION value='"+ville+"'>"+ville+"</option>");
        
        }
       
      });
}

function checkFieldVille(){
  var ville = document.getElementById("liste_villes").value;
  $.ajax({
          type: "POST",
          url: "../req/infos_stage.php",
          data:{ nom_ville: ville }})
  .done(function(data){ 
    $('#intropage').hide();
  $('#liste_villes').hide();  
  $('#liste_pays').hide();    
  $('#introvilles').hide(); 
  $('#nouvelle_recherche').show();
      console.log(data);
      for(var x=0; x<data.length; x++){
      $('#infostage').append("<FONT color=\"#FDAA00\"><p>Voilà les commentaires de " +data[x].prenom_utilisateur +" "+data[x].nom_utilisateur+ " sur son stage chez "+data[x].nom_entreprise+" dans la ville de " +ville+" :</br><p></FONT>");
      $('#infostage').append("<p>Pour le contacter: " +data[x].adresse_mail_utilisateur+"</p>");
      if(data[x].numero_telephone_utilisateur != '0')
      	{$('#infostage').append("<p>Son numéro de tél:" +data[x].numero_telephone_utilisateur+ "</p>");}
      	
      $('#infostage').append("<p>Annee de son stage: "+data[x].annee_stage+"</p>");
      $('#infostage').append("<p>Durée de son stage: "+data[x].duree_stage+" mois </p>");

        }
      
      
      
      
      
      });
      
  
}


function checkFieldStage(){
  var entreprise = document.getElementById("liste_entreprise").value;
  $.ajax({
          type: "POST",
          url: "../req/infos_entreprise.php",
          data:{ nom_entreprise: entreprise }})
  .done(function(data){ 
           $('#accueilpage').hide();
           $('#intropage').hide();
           $('#liste_villes').hide();  
           $('#liste_pays').hide();    
           $('#introvilles').hide();
           $('#liste_entreprise').hide();
           $('#nouvelle_recherche').show();
      console.log(data);
      for(var x=0; x<data.length; x++){
      $('#introstage').hide();
       $('#infoentreprise').append("</br><FONT color=\"#FDAA00\"><p>Voilà les commentaires de " +data[x].prenom_utilisateur +" "+data[x].nom_utilisateur+ " sur son stage chez "+data[x].nom_entreprise+" dans la ville de " +data[x].nom_ville+" :</p></br>");
      $('#infoentreprise').append("<p>Pour le contacter: " +data[x].adresse_mail_utilisateur+"</p>");
      if(data[x].numero_telephone_utilisateur != '0')
      	{$('#infoentreprise').append("<p>Son numéro de tél:" +data[x].numero_telephone_utilisateur+ "</p>");}
      	
      $('#infoentreprise').append("<p>Annee de son stage: "+data[x].annee_stage+" </p");
      $('#infoentreprise').append("<p>Durée de son stage: "+data[x].duree_stage+" mois<p>");

        }
           

        
      
      
      
      
      
      });
      
  
}


function doNewResearch(){
  location.reload();}
  
