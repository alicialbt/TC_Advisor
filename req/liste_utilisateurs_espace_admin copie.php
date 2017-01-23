<?php

header('Content-type:application/json' ) ;
$db=mysql_connect('localhost','root','' )
    or die ("erreur de connexion") ;
    mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible la Base de données" ) ; 
    
$iduser = $_POST['id_utilisateur'];
$requser = mysql_query("SELECT utilisateur.id_utilisateur, utilisateur.nom_utilisateur, utilisateur.prenom_utilisateur, pays.nom_pays, ville.nom_ville, universite.nom_universite, entreprise.nom_entreprise 
FROM utilisateur LEFT JOIN pays ON utilisateur.id_utilisateur = pays.id_utilisateur LEFT JOIN ville ON pays.id_pays = ville.id_pays LEFT JOIN entreprise ON ville.id_ville = entreprise.id_ville LEFT JOIN universite ON universite.id_ville = ville.id_ville 
WHERE utilisateur.id_utilisateur = '".$iduser."'") ; 

$arr = array();

while($rowuser = mysql_fetch_array($requser)){
      $arr[]=$rowuser;
   };
   
   
echo json_encode($arr) ; 
?>