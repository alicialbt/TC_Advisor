$(document).ready(function() {
    $.ajax({
        url: "liste_annees_stage_formulaire_echange.php"
    }).then(function(data) {
        
       
       for(var x=0; x<data.length; x++){
          var anneestage = data[x].annee_stage;
          $('#dropdownanneestage').append("<OPTION value='"+anneestage+"'>");
      }
          
       
    });
});
