<?php

$db=mysql_connect('localhost','root','')
    or die ("erreur de connexion");
    mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible la Base de données"); 

$file = 'test.txt';
$login = $_POST["login"] ;
$req = mysql_query("SELECT id_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur='".$login."'");
$row = mysql_fetch_assoc($req);
$iduser = $row['id_utilisateur'];
$depart = $_POST["depart"];
$pays = $_POST["pays"];
 

$req1pays = mysql_query("SELECT nom_pays FROM pays WHERE nom_pays='".$pays."'");
$req2pays = mysql_num_rows($req1pays);
if($req2pays == 0)
{
$req3pays = mysql_query("INSERT INTO pays (nom_pays, id_utilisateur) VALUES ('".$pays."', '".$iduser."') ");}
file_put_contents($file, $iduser);

$req4pays = mysql_query("SELECT id_pays from pays WHERE nom_pays='".$pays."' ");
$req5pays = mysql_fetch_assoc($req4pays);
$idpays = $req5pays['id_pays'];

$ville= $_POST["ville"];
$req1ville = mysql_query("SELECT nom_ville FROM ville WHERE nom_ville='".$ville."'");
$req2ville = mysql_num_rows($req1ville);
if($req2ville ==0)
{
$req3ville = mysql_query("INSERT INTO ville (nom_ville, id_utilisateur, id_pays) VALUES ('".$ville."', '".$iduser."', '".$idpays."')");}

$req4ville = mysql_query("SELECT id_ville FROM ville WHERE nom_ville='".$ville."'");
$req5ville = mysql_fetch_assoc($req4ville);
$idville = $req5ville['id_ville'];

if($depart == stage){
  $reqteststage = mysql_query("SELECT nom_entreprise FROM entreprise, utilisateur, ville WHERE utilisateur.id_utilisateur=entreprise.id_utilisateur AND ville.id_ville=entreprise.id_ville AND ville.nom_ville='".$ville."' AND utilisateur.id_utilisateur='".$iduser."'");
  $reqteststage2 = mysql_num_rows($reqteststage);
}
else{
  $reqtestechange = mysql_query("SELECT nom_universite FROM universite, utilisateur, ville WHERE utilisateur.id_utilisateur=universite.id_utilisateur AND ville.id_ville=universite.id_ville AND ville.nom_ville='".$ville."' AND utilisateur.id_utilisateur='".$iduser."'");
  $reqtestechange2 = mysql_num_rows($reqtestechange);}
  

  
if($depart == stage && $reqteststage2 == 0){               
   $duree = $_POST["duree_stage"];
   $annee = $_POST["annee_stage"];
   $entreprise = $_POST["nom_entreprise"];
   $req4 = mysql_query("INSERT INTO entreprise (duree_stage, annee_stage, nom_entreprise, id_utilisateur, id_ville) VALUES ('".$duree."', '".$annee."', '".$entreprise."', '".$iduser."', '".$idville."')");
}
else if($depart == echange && $reqtestechange2 == 0){
  $duree = $_POST["duree_echange"];
  $annee = $_POST["annee_echange"];
  $universite = $_POST["nom_universite"];
  $langue = $_POST["langue_cours"];
  $cours = $_POST["cours_interessants"];
  $contrat = $_POST['contrat_etudes'];
  $req3 = mysql_query("INSERT INTO universite (nom_universite, cours_interessants, duree_echange, langue_cours, annee_echange, contrat_etude, id_utilisateur, id_ville) VALUES ('".$universite."', '".$cours."', '".$duree."', '".$langue."','".$annee."', '".$contrat."', '".$iduser."', '".$idville."')");  
}
else if($depart == stage && $reqteststage2 == 1){          
   $duree = $_POST["duree_stage"];
   $annee = $_POST["annee_stage"];
   $entreprise = $_POST["nom_entreprise"];
   $req4 = mysql_query("UPDATE entreprise, ville, utilisateur SET nom_entreprise = '".$entreprise."', duree_stage= '".$duree."', annee_stage= '".$annee."' WHERE ville.nom_ville='".$ville."' AND utilisateur.id_utilisateur='".$iduser."'");
}
else if($depart == echange && $reqtestechange2 == 1){
  $duree = $_POST["duree_echange"];
  $annee = $_POST["annee_echange"];
  $universite = $_POST["nom_universite"];
  $langue = $_POST["langue_cours"];
  $cours = $_POST["cours_interessants"];
  $contrat = $_POST['contrat_etudes'];
  $req3 = mysql_query("UPDATE universite, ville, utilisateur SET duree_echange = '".$duree."', annee_echange = '".$annee."', nom_universite = '".$universite."', langue_cours = '".$langue."', cours_interessants = '".$cours."', contrat_etude = '".$contrat."' WHERE  ville.nom_ville='".$ville."' AND utilisateur.id_utilisateur='".$iduser."'");
  }

    echo json_encode(ville);

?>           
