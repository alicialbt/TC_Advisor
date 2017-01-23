<?php
    
     header('Content-type:application/json');
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
  
     $requete = mysql_query('SELECT DISTINCT nom_pays FROM ville,pays,entreprise WHERE ville.id_pays=pays.id_pays AND ville.id_ville=entreprise.id_ville ORDER BY nom_pays');
     $arr = array();
     while($row = mysql_fetch_assoc($requete)){
      array_push($arr, $row);
      };                   
      echo json_encode($arr);     

?>           
