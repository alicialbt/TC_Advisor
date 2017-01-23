$(document).ready(function() {
    $('#liste_villes').hide();
    $('#infos_ville').hide();
    $('#liste_universites').hide();
    $.ajax({
        url: "../req/liste_pays.php"
    }).then(function(data) {
    $('#nouvelle_recherche').hide();
   	   $('#intropage').append("<p>Choisis le pays qui t'intéresse dans la liste :</p>");
       for(var x=0; x<data.length; x++){
          var pays = data[x].nom_pays;
          $('#liste_pays').append("<OPTION value='"+pays+"'>"+pays+"</option>");
          }       

    });
});

function checkField(){
  var pays = document.getElementById("liste_pays").value;
  $.ajax({
            type: "POST",
            url: "../req/liste_villes_par_pays.php",
            data:{ nom_pays: pays}})
    .done(function(data){
       $('#liste_villes').show();
       $('#introvilles').html("</br><p>Choisis la ville que tu veux voir dans le pays " +pays+"</p>Si elle n'est pas présente dans la liste, c\'est qu\'il n\'y a pas encore d\'informations disponibles dessus :(");
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
            url: "../req/infos_echanges.php",
            data:{ nom_ville: ville}})
    .done(function(data){
       $('#liste_universites').show();
       $('#introuniversites').html("</br><p>Sélectionne l\'université qui t\'intéresse </p>Si elle n'est pas présente dans la liste, c\'est qu\'il n\'y a pas encore d\'informations disponibles sur celle-ci :(");
       $('#liste_universites').html("<OPTION value=''></option>");
       for(var x=0; x<data.length; x++){
       console.log(data);
        var universite = data[x].nom_universite;
        $('#liste_universites').append("<OPTION value='"+universite+"'>"+universite+"</option>");
        
       }
       
      });
}

function checkFieldEchange(){
  var universite = document.getElementById("liste_universites").value; 
  var ville = document.getElementById("liste_villes").value;
  $.ajax({
          type: "POST",
          url: "../req/infos_echanges2.php",
          data:{ nom_universite: universite, nom_ville: ville }})
  .done(function(data){
      $('#liste_universites').hide();
      $('#introuniversites').hide();
      $('#introuniversites').hide();
      $('#introvilles').hide();
      $('#intropage').hide();
      $('#liste_pays').hide();
      $('#liste_villes').hide();
      $('#nouvelle_recherche').show();
      $('#affichage_universites').show();     
      console.log(data);
      for(var x=0; x<data.length; x++){
      $('#affichage_universites').append("</br><FONT color=\"#FDAA00\"><p>Voilà les commentaires de " +data[x].prenom_utilisateur +" "+data[x].nom_utilisateur+ " sur l'université de " +universite+" :</p></FONT></br>");
      $('#affichage_universites').append("<p>Pour le contacter: " +data[x].adresse_mail_utilisateur+"</p>");
      if(data[x].numero_telephone_utilisateur != '0')
      	{$('#affichage_universites').append("<p>Son numéro de tél:" +data[x].numero_telephone_utilisateur+ "</p>");}
      
      $('#affichage_universites').append("<p>Année d'échange : "+data[x].annee_echange+" </p>");     	
      $('#affichage_universites').append("<p>Durée de l'échange: "+data[x].duree_echange+" mois </p>");
      $('#affichage_universites').append("<p>Contrat d'études: "+data[x].contrat_etude+" </p>");



      }
 
  });

}
  
function doNewResearch(){
  location.reload();}
  
