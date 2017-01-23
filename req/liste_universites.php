<?php
    
     header('Content-type:application/json');
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");

     $ville = $_POST['nom_ville']
     $universite = mysql_query("SELECT nom_universite FROM universite ORDER BY nom_universite WHERE ville.id_ville=universite.id_ville");
     $arr = array();
     while($row = mysql_fetch_assoc($universite)){
      array_push($arr, $row);
     };                   
     echo json_encode($arr);     
     //var_dump($arr);
?>                                                           
