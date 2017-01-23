$(document).ready(function(){
$(".stage").hide();
$(".echange").hide();
  $('input:radio[name=depart]').change(function(){
  var bouton = this.value;
     if(this.value =='echange'){
      $(".stage").hide();
      $(".echange").show();
    }
    else if (this.value == 'stage'){
      $(".echange").hide();
      $(".stage").show();
      
    }
  
    $.ajax({
            type: "POST",
            url: "../req/liste_echanges_utilisateur.php",
            data:{ ville: document.getElementById("ville").value,
            bouton: bouton}})
    .done(function(data){ 
              
           console.log(data);
           if(bouton == 'echange' && data.length>0){
            $('input#duree_echange').val(data[0].duree_echange);
            $('input#annee_echange').val(data[0].annee_echange);
            $('input#nom_universite').val(data[0].nom_universite);
            $('input#langue_cours').val(data[0].langue_cours);
            $('textarea#contrat_etudes').val(data[0].contrat_etude);
            $('textarea#cours_interessants').val(data[0].cours_interessants);
            }
            else if(bouton =='stage' && data.length>0){
            $('input#duree_stage').val(data[0].duree_stage);
            $('input#annee_stage').val(data[0].annee_stage);
            $('input#nom_entreprise').val(data[0].nom_entreprise);}
            
    
})

      
    
   

});

});

