$(document).ready(function() {
    $.ajax({
        url: "../req/liste_pays_formulaire_echange.php"
    }).then(function(data) {
        
       
       for(var x=0; x<data.length; x++){
          var pays = data[x].nom_pays;
          $('#dropdownpays').append("<OPTION value='"+pays+"'>"+pays+"</option>");
      }
          
       
    });
});
