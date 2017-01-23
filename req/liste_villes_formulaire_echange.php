<?php
    
     header('Content-type:application/json');
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
  
  
     $pays = $_POST['nom_pays'];
     $requete = mysql_query("SELECT distinct nom_ville FROM ville, pays WHERE ville.id_pays=pays.id_pays AND pays.nom_pays='".$pays."' ORDER BY nom_ville");
     $arr = array();
     while($row = mysql_fetch_assoc($requete)){
      array_push($arr, $row);
     };                   
     echo json_encode($arr);     
     //var_dump($arr);
?>                                                           