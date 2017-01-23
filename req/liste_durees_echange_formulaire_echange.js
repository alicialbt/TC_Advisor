$(document).ready(function() {
    $.ajax({
        url: "liste_durees_echange_formulaire_echange.php"
    }).then(function(data) {
        
       
       for(var x=0; x<data.length; x++){
          var dureeechange = data[x].duree_echange;
          $('#dropdowndureeechange').append("<OPTION value='"+dureeechange+"'>");
      }
          
       
    });
});
