$(document).ready(function() {
    $.ajax({
        url: "liste_durees_stage_formulaire_echange.php"
    }).then(function(data) {
        
       
       for(var x=0; x<data.length; x++){
          var duree_stage = data[x].duree_echange;
          $('#dropdowndureestage').append("<OPTION value='"+duree_stage+"'>");
      }
          
       
    });
});
