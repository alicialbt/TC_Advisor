   <?php
    
     header('Content-type:application/json');
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
  
     $ville = $_POST['nom_ville'];
     
    $infosechanges = mysql_query("SELECT  distinct nom_universite FROM ville, universite WHERE  ville.nom_ville='".$ville."' AND ville.id_ville=universite.id_ville");

     $arr = array();
     
     while($row = mysql_fetch_assoc($infosechanges)){
      $arr[]=$row;
     };
     
    echo json_encode($arr);
    
?>                
