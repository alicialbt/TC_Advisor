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

<p>
<?php $db=mysql_connect('localhost','root','')
     				or die ("erreur de connexion");
    			    mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");
				   ?>
				  
                                   <h2> <img src="../images/TCATWblack.png" height="100" width="100" style="float:left; margin: -20px 0px -20px px;"/> Ton profil est en cours de modification </h2>

</p>


<?php

//teste les nouvelles données
if(strlen($_POST['adresse_mail'])<4){
  echo '<p>ERREUR : adresse mail trop courte<br />';
  echo 'Redirection vers l\'espace personnel</p>';
  header('refresh:6; url=site_mon_compte.php');
}


else if(strlen($_POST['numero_tel'])!=NULL &&  strlen($_POST['numero_tel'])!=10){
  echo '<p>ERREUR : numéro de téléphone trop court, trop long ou contient des caractères<br />';
  echo 'Redirection vers l\'espace personnel</p>';
  header('refresh:6; url=site_mon_compte.php');
}

else{
      try{
        $bdd = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', '');
      }
      catch(Exception $e){
        die('Erreur : '.$e->getMessage());
      }


      session_start();

      $requete = $bdd->prepare('UPDATE utilisateur SET nom_utilisateur = :nv_nom, prenom_utilisateur = :nv_prenom, promo_utilisateur = :nv_promo, adresse_mail_utilisateur = :nv_adresse, numero_telephone_utilisateur = :nv_num WHERE id_utilisateur = \''.$_SESSION['id'].'\'');

      $requete->execute(array(
        'nv_nom' => $_POST['nom'],
        'nv_prenom' => $_POST['prenom'],
        'nv_promo' => $_POST['promo'],
        'nv_adresse' => $_POST['adresse_mail'],
        'nv_num' => $_POST['numero_tel']
      ));
?>
<p>
Tes données ont bien été modifiées, redirection vers ton espace personnel.
</p>
<?php
      header('refresh:2; url=site_mon_compte.php');
}
?>
  </section>
	 			</div>
			  </div>
			</div>
		  </div>	

</body>
</html>
