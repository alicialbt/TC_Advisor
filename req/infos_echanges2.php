   <?php
    
     header('Content-type:application/json');
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
  
     $universite = $_POST['nom_universite'];
     $ville = $_POST['nom_ville'];
     
    $infosechanges = mysql_query("SELECT nom_universite, nom_utilisateur, prenom_utilisateur, adresse_mail_utilisateur, numero_telephone_utilisateur, contrat_etude, cours_interessants, annee_echange, duree_echange FROM universite, utilisateur, ville WHERE universite.id_utilisateur=utilisateur.id_utilisateur AND ville.id_ville=universite.id_ville AND ville.nom_ville='".$ville."' AND universite.nom_universite='".$universite."'");

     $arr = array();
     
     while($row = mysql_fetch_assoc($infosechanges)){
      $arr[]=$row;
     };
     
    echo json_encode($arr);
    
?>                
