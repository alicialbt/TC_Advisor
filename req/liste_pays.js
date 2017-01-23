$(document).ready(function() {
    $.ajax({
        url: "liste_pays.php"
    }).then(function(data) {


	   $('#liste_pays').append("<SELECT id='pays'>");
       for(var x=0; x<data.length; x++){      
       $('#liste_pays').append("<option value='");
       $('#liste_pays').append(data[x].nom_pays);
       $('#liste_pays').append("'>");
       }
       $('#liste_pays').append("</SELECT>");
       

    });
});