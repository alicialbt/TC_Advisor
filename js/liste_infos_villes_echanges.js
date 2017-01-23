$(document).ready(function() {
    $('#liste_villes').hide();
    $('#infos_ville').hide();
    $.ajax({
        url: "../req/liste_pays.php"
    }).then(function(data) {
   	   $('#intropage').append("Choisissez le pays qui vous intéresse dans la liste:");
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
            url: "../req/liste_villes_par_echange.php",
            data:{ nom_pays: pays}})
    .done(function(data){
       $('#liste_villes').show();
       $('#introvilles').html("Choisissez la ville que vous voulez voir dans le pays:  " +pays+" <br> Si elle n'est pas présente dans la liste, c\'est qu\'il n\'y a pas encore d\'informations disponibles dessus :(");
       $('#liste_villes').html("<OPTION value=''></option>");
       for(var x=0; x<data.length; x++){
        var ville = data[x].nom_ville;
        $('#liste_villes').append("<OPTION value='"+ville+"'>"+ville+"</option>");
        
        }
       
      });
}

function checkFieldEchange(){
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
      console.log(data);
      for(var x=0; x<data.length; x++){
      $('#infoville').append("<h1>Voilà les commentaires de " +data[x].prenom_utilisateur +" "+data[x].nom_utilisateur+ " sur la ville de " +ville+" :<br></h1>");
      $('#infoville').append("<h3>Pour le contacter: " +data[x].adresse_mail_utilisateur+"</h3>");
      if(data[x].numero_telephone_utilisateur != '0')
      	{$('#infoville').append("<h3>Son numéro de tél:" +data[x].numero_telephone_utilisateur+ "</h3><br>");}
      	
      $('#infoville').append("Endroits ou sortir: "+data[x].sortir+" <br>");
      $('#infoville').append("Endroits ou manger: "+data[x].manger+" <br>");
      $('#infoville').append("Endroits ou dormir: "+data[x].dormir+" <br>");
      $('#infoville').append("Endroits à visiter: "+data[x].voyager+" <br>");
        }
      
      
      
      
      
      });
