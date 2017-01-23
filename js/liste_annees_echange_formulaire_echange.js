$(document).ready(function() {
    $.ajax({
        url: "../req/liste_annees_echange_formulaire_echange.php"
    }).then(function(data) {
        
       
       for(var x=0; x<data.length; x++){
          var anneeechange = data[x].annee_echange;
          $('#dropdownanneechange').append("<OPTION value='"+anneeechange+"'>");
      }
          
       
    });
});
