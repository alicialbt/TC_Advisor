$(document).ready(function() {
    var pays = document.getElementById("pays").value
    $.ajax({
        url: "../req/liste_villes.php",
        data:{ nom_pays: pays}
        
    }).then(function(data) {
       console.log(data); 
       
       for(var x=0; x<data.length; x++){
          var ville = data[x].nom_ville;
          $('#dropdownville').append("<OPTION value='"+ville+"'>");
      }
          
       
    });
});
