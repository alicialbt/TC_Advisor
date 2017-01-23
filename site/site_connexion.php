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

      <?php
        session_start();
     ?>
  
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
				   ?>
				  
                                   <h2> <img src="../images/TCATWblack.png" height="100" width="100" style="float:left; margin: -20px 0px -20px px;"/> Tentative de connexion en cours! </h2>
	  				<?php
      				  if(empty($_POST['mail'] || empty($_POST['pwd']))){
         				$message = '<p>une erreur s\'est produite pendant l\'identification...
       	 				Il faut remplir tous les champs !</p>
	       				<p>Clique <a href="./site_accueil.php>ici</a> pour revenir</p>';
      				  }
      				  else{
         				$req = mysql_query('SELECT mot_de_passe_utilisateur, prenom_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur="'.$_POST['mail'].'"');
         				$data = mysql_fetch_assoc($req);
         
         				if($data['mot_de_passe_utilisateur'] != $_POST['pwd']){ 
            			  echo '<p>Mauvais login / password. Identifiants non reconnus, redirection vers la page d\'accueil en cours!</p>';
             
             			  header('refresh:3; url=site_accueil.php');
            			  exit();
            		    }
         				else{
         				 $_SESSION['login']= $_POST['mail'];
                 $_SESSION['prenom']= $data['prenom_utilisateur'];
                 $req = mysql_query("SELECT id_utilisateur FROM utilisateur WHERE adresse_mail_utilisateur = '".$_POST['mail']."'");
                 $reqID = mysql_fetch_assoc($req);
                 $ID = $reqID['id_utilisateur'];
                 $_SESSION['id'] = $ID;

//           				 echo '<span class=\"byline\">Bien joué tu es connecté !</span>';
          				 header('refresh:3; url=site_mon_compte.php');
            			 exit();
         				}
      				  }
    				?>
	 			  </section>
	 			</div>
			  </div>
			</div>
		  </div>	
	<!-- /Main -->


	</body>
</html>
