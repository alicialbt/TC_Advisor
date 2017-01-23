 <?php
    
     header('Content-type:application/json');
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
  
  
     $pays = $_POST['nom_pays'];
     $nomville = mysql_query("SELECT nom_ville FROM ville,pays WHERE pays.id_pays=ville.id_pays AND pays.nom_pays='".$pays."'");
     
     $arr = array();
     while($row = mysql_fetch_assoc($nomville)){
      $arr[]=$row;
      };
     
     
               
     echo json_encode($arr);
        
?>                                                