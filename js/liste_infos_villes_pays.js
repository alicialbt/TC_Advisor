$(document).ready(function() {
    $('#liste_villes').hide();
    $('#infos_ville').hide();
       $('#nouvelle_recherche').hide();
    $.ajax({
        url: "../req/liste_pays.php"
    }).then(function(data) {
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
       $('#introvilles').html("</br><p>Choisis la ville que tu veux voir dans le pays:  " +pays+"</p>Si elle n'est pas présente dans la liste, c\'est qu\'il n\'y a pas encore d\'informations disponibles dessus :(");
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
          url: "../req/infos_ville.php",
          data:{ nom_ville: ville }})
  .done(function(data){
  $('#intropage').hide();
  $('#liste_villes').hide();  
  $('#liste_pays').hide();    
  $('#introvilles').hide(); 
      $('#infos_ville').show();  
      $('#nouvelle_recherche').show();   
      console.log(data);
      for(var x=0; x<data.length; x++){
      $('#infoville').append("<FONT color=\"#FDAA00\"><p>Voilà les commentaires de " +data[x].prenom_utilisateur +" "+data[x].nom_utilisateur+ " sur la ville de " +ville+" :<br></p></FONT>");
      $('#infoville').append("<p>Pour le contacter: " +data[x].adresse_mail_utilisateur+"</p>");
      if(data[x].numero_telephone_utilisateur != '0')
      	{$('#infoville').append("<p>Son numéro de tél:" +data[x].numero_telephone_utilisateur+ "</p><br>");}
      	
      $('#infoville').append("<p>Endroits ou sortir: "+data[x].sortir+" <br></p>");
      $('#infoville').append("<p>Endroits ou manger: "+data[x].manger+" <br></p>");
      $('#infoville').append("<p>Endroits ou dormir: "+data[x].dormir+" <br></p>");
      $('#infoville').append("<p>Endroits à visiter: "+data[x].voyager+" <br></p>");
        }
      
      
      
      
      
      });
      
  
}




function doNewResearch(){
  location.reload();}
  
