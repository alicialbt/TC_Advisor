$(document).ready(function() {
    $.ajax({
        url: "../req/liste_utilisateurs.php"
    }).then(function(data) {
    
    
     for(var x=0; x<data.length; x++){
       $('#myDiv2').append(data[x].id_utilisateur);
       $('#myDiv2').append(" ");
       $('#myDiv2').append(data[x].prenom_utilisateur);
       $('#myDiv2').append(" ");
       $('#myDiv2').append(data[x].nom_utilisateur);
       $('#myDiv2').append("<input type='radio' name='id_utilisateur' value='"+data[x].id_utilisateur+"'>");       
       $('#myDiv2').append("<br>");
       }
       
            
    });
});

