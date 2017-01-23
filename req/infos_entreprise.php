  
   <?php
    
     header('Content-type:application/json');
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
  
  
    $entreprise = $_POST['nom_entreprise'];
     
     $infosville = mysql_query("SELECT nom_utilisateur, prenom_utilisateur, adresse_mail_utilisateur, numero_telephone_utilisateur, nom_entreprise, annee_stage, duree_stage, nom_ville FROM ville, utilisateur, entreprise WHERE utilisateur.id_utilisateur=ville.id_utilisateur AND ville.id_ville=entreprise.id_ville AND entreprise.nom_entreprise='".$entreprise."' ");
     $arr = array();
     
     
     while($row = mysql_fetch_assoc($infosville)){
      $arr[]=$row;
     };
     
    echo json_encode($arr);
    
?>                