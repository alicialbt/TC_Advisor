<?php
    
     header('Content-type:application/json');
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
     session_start();
     $iduser = $_SESSION['id'];
     $ville = $_POST['ville'];
     $depart = $_POST['bouton'];
     $stage = "stage";
     $echange = "echange";
     
     $strisstage = strcmp($stage, $depart);
     $strisechange = strcmp($echange, $depart);
     
    if($strisstage == 0)
    {
      $reqstage = mysql_query("SELECT nom_entreprise, annee_stage, duree_stage FROM utilisateur, entreprise, ville WHERE utilisateur.id_utilisateur=entreprise.id_utilisateur AND entreprise.id_ville=ville.id_ville AND ville.nom_ville='".$ville."' AND utilisateur.id_utilisateur='".$iduser."'");
      $arr = array();
      while($row = mysql_fetch_assoc($reqstage)){
          $arr[]=$row;
      };                       
      echo json_encode($arr);   
    }
    else if ($strisechange == 0)
    {
      $reqechange = mysql_query("SELECT annee_echange, contrat_etude, cours_interessants, duree_echange, langue_cours, nom_universite FROM utilisateur, universite, ville WHERE utilisateur.id_utilisateur=universite.id_utilisateur AND universite.id_ville=ville.id_ville AND ville.nom_ville='".$ville."' AND utilisateur.id_utilisateur='".$iduser."'");
      $arr = array();
      while($row2 = mysql_fetch_assoc($reqechange)){
        $arr[]=$row2;
      };                    
      echo json_encode($arr);  
    } 
    else{
     echo json_encode("failed");};
   
    
?>
     