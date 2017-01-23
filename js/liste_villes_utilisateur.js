$(document).ready(function() {  
    $('#liste_villes').hide();
    $('#input').hide();
    $.ajax({
        url: "../req/liste_villes_utilisateur.php"
    }).then(function(data) {
        console.log(data);
        if(data.length == 0){
          $('#no_villes').html("<br><br><br>Il faut d'abord saisir les infos d'un échange ou d'un stage avant de filer des infos sur une ville dans laquelle tu es parti! <br><a href = 'site_formulaire_echange.php'>Clique ici pour le faire! </a>");}
        else{
          $('#liste_villes').show();
          for(var x=0; x<data.length; x++){
            var ville = data[x].nom_ville;
            $('#liste_villes').append("<OPTION value='"+ville+"'>"+ville+"</option>");} ;
        };
    });      
});



function checkField(){
  var ville = document.getElementById("liste_villes").value;
  $.ajax({
            type: "POST",
            url: "../req/liste_villes_utilisateur2.php",
            data:{ ville: ville}})
    .done(function(data){
      
           $('#input').show();
           $('#dormir_ville').html("<p>Endroits ou dormir :</p>");
           $('#dormir_ville').append("<textarea id='dormir' rows='4' cols='50' >"+data[0].dormir+"</textarea>");
           $('#manger_ville').html("<p>Endroits ou manger :</p>");
           $('#manger_ville').append("<textarea id='manger' rows='4' cols='50' >"+data[0].manger+"</textarea>");
           $('#sortir_ville').html("<p>Endroits ou sortir :</p>");
           $('#sortir_ville').append("<textarea id='sortir' rows='4' cols='50' >"+data[0].sortir+"</textarea>");
           $('#voyager_ville').html("<p>Endroits ou voyager :</p>");
           $('#voyager_ville').append("<textarea id='voyager' rows='4' cols='50' >"+data[0].voyager+"</textarea>");       
      });
};            


$('#input').click(function(){
var dormir = document.getElementById("dormir").value;
var sortir = document.getElementById("sortir").value;
var voyager = document.getElementById("voyager").value;
var manger = document.getElementById("manger").value;
var ville = document.getElementById("liste_villes").value;
 $.ajax({
          type: "POST",
          url: "../req/liste_villes_utilisateur3.php",
          data:{ dormir: dormir,
                 sortir: sortir,
                 manger: manger,
                 voyager: voyager,
                 ville: ville }}) 
  .done(function(data){
  alert("Modifications effectuées merci!");
  location.reload();
 });
});
                
