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
     
     $ville=$_POST['ville'];
     $manger=$_POST['manger'];
     $dormir=$_POST['dormir'];
     $sortir=$_POST['sortir'];
     $voyager=$_POST['voyager'];
     
     
     $req=mysql_query("UPDATE ville SET dormir='".$dormir."', manger='".$manger."', sortir='".$sortir."', voyager='".$voyager."' WHERE id_utilisateur='".$iduser."' AND nom_ville = '".$ville."' ");
     
     echo json_encode("done");
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     ?>