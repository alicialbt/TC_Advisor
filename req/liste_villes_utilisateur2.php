<?php
    
     header('Content-type:application/json');
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
     
     
     Session_start();
     $mail = $_SESSION['login'];
     $reqiduser = mysql_query("SELECT id_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur = '".$mail."' ");
     $row = mysql_fetch_assoc($reqiduser);
     $iduser = $row['id_utilisateur'];     
     $ville = $_POST['ville'];
     
     $req = mysql_query("SELECT dormir, manger, sortir, voyager FROM ville WHERE id_utilisateur='".$iduser."' AND nom_ville='".$ville."' ");
     $arr = array();
     while($row = mysql_fetch_assoc($req)){
      $arr[]=$row;
      };
     
     
               
     echo json_encode($arr); 
     
     ?>
     
     