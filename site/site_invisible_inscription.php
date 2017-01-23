<!DOCTYPE html>
<html>
  <head>
	 <title>TC Advisor</title>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  	  <meta name="description" content="" />
  	  <meta name="keywords" content="" />
  	  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
  
  	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  	  <script src="js/skel.min.js"></script>
  	  <script src="js/skel-panels.min.js"></script>
  	  <script src="js/init.js"></script>
  	  <script src="../js/jquery.js"></script>

  	  <link rel="stylesheet" href="../css/skel-noscript.css" />
  	  <link rel="stylesheet" href="../css/style.css" />
  	  <link rel="stylesheet" href="../css/style-desktop.css" />
  </head>
   <body>

     <!-- Main -->	
      <div id="main">
        <div class="container">
          <div class="row">

            <!-- Content -->
              <div id=content" class="8u skel-cell-important">
                <section>       
    <?php
    
        
     $db=mysql_connect('localhost','root','')
     or die ("erreur de connexion");
     mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
     
     $nom = $_POST['nom'];
     $prenom = $_POST['prenom'];
     $promo = $_POST['promotion'];
     $numero = $_POST['telephone'];
     $mail = $_POST['mail'];
     $pwd1 = $_POST['pwd1'];
     $pwd2 = $_POST['pwd2'];
     
     $req = mysql_query("SELECT adresse_mail_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur = '".$mail."' ");
     $req2 = mysql_num_rows($req);
     if($req2 != 0)
	{
		echo '<h2><img src="images/TCATWblack.png" height="100" width="100" style="float:left; margin: -20px 0px -20px px;"/>Ce mail est déjà enregistré dans la base de données</h2>';
		header('refresh:3; url=site_accueil.php');
		return;
		}

     
     if(strlen($nom)>=2){    
      if(strlen($prenom)>=2){       
       if ((strlen($numero)==10) || (strlen($numero)==0)){
        if (strlen($mail)>= 4){
          if($pwd1 == $pwd2){
        mysql_query('INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, promo_utilisateur, numero_telephone_utilisateur, adresse_mail_utilisateur, mot_de_passe_utilisateur) 
        VALUES("'.$nom.'", "'.$prenom.'", "'.$promo.'", "'.$numero.'", "'.$mail.'", "'.$pwd1.'")');
		echo '<h2><img src="../images/TCATWblack.png" height="100" width="100" style="float:left; margin: -20px 0px -20px px;"/>Félicitations, tu es inscrit !</h2>';
        session_start();
         $_SESSION['login'] = $_POST['mail'];
         $_SESSION['prenom']= $prenom;
				 $req = mysql_query("SELECT id_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur = '".$mail."'");
        $reqID = mysql_fetch_assoc($req);
        $ID = $reqID['id_utilisateur'];
        $_SESSION['id'] = $ID;
      }
      }
      }
      } 
      }
 
   header('refresh:3; url=site_accueil.php');
     ?> 
     
 </body>
</html>                          
