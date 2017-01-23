<?php

header('Content-type:application/json' ) ;
$db=mysql_connect('localhost','root','' )
    or die ("erreur de connexion") ;
    mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible la Base de données" ) ; 
    
$iduser = $_POST['id_utilisateur'];

$req=mysql_query("DELETE FROM utilisateur WHERE id_utilisateur='".$iduser."'");

?>