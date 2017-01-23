
  
   <?php
    
     header('Content-type:application/json');
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
  
  
    $ville = $_POST['nom_ville'];
     
     $infosville = mysql_query("SELECT nom_utilisateur, prenom_utilisateur, adresse_mail_utilisateur, numero_telephone_utilisateur, sortir, manger, dormir, voyager FROM ville, utilisateur WHERE utilisateur.id_utilisateur=ville.id_utilisateur AND ville.nom_ville='".$ville."'");
     $arr = array();
     
     
     while($row = mysql_fetch_assoc($infosville)){
      $arr[]=$row;
     };
     
    echo json_encode($arr);
    
?>                
