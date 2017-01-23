<!DOCTYPE htlm>
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

 <?php //include("../blocs/champ_connexion.php") ?>

<body>

  <!-- Header -->
    <div id="header">
       <?php include("../blocs/onglets.php") ?>
        
       <div class="container">
         <!-- Logo -->
          <div id="logo">
            <img src="../images/TCATW.png" height="200" width="200" style="margin:-80px 0 0 0">
              <h2><a href="#">Espace personnel</a></h2>
              <span class="tag">___________</span>
          </div>
        </div>
    </div>

    <!-- Main -->	
      <div id="main">
        <div class="container">
          <div class="row">

           <!-- Sidebar -->
            <?php include("../blocs/sidebar.php") ?>

            <!-- Content -->
              <div id=content" class="8u skel-cell-important">
                <section>
		     	  <header>
		     	  	<h2>Modifier mon profil</h2>
    			  	<!--<span class="byline">(Faut quand même être con pour se tromper de nom)</span>-->
		     	  </header>

		     	  	<div class="formulaire">
					<form method ="post" action="site_invisible_modifier_info_utilisateur.php">

					<?php
					  try{
  						$bdd = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', '');
					  }
					  catch(Exception $e){
  						die('Erreur : '.$e->getMessage());
					  }
            
            session_start();

					  $reponse = $bdd->query('SELECT * FROM utilisateur WHERE id_utilisateur = \''.$_SESSION['id'].'\'');
  					  $donnees = $reponse->fetch();
				  ?>

				 <p>Nom :
				 <?php 
					$champ = $donnees['nom_utilisateur'];
					echo "<input type='text' required name='nom' value='$champ' />"
				 ?>
				 </p>

				<p>Prénom :
				<?php 
				  $champ = $donnees['prenom_utilisateur'];
				  echo "<input type='text' required name='prenom' value='$champ' />";
				?>
				</p>

				<p>Promo :
				<?php 
          $champ = $donnees['promo_utilisateur'];?>
          <SELECT name="promo">
            <OPTION VALUE="<?php echo $champ;?>"><?php echo $champ?></OPTION>
				            <OPTION VALUE="2015">2015</OPTION>
			          	  <OPTION VALUE="2016">2016</OPTION>
                    <OPTION VALUE="2017">2017</OPTION>
                    <OPTION VALUE="2018">2018</OPTION>
                    <OPTION VALUE="2019">2019</OPTION>
                    <OPTION VALUE="2020">2020</OPTION>
                    <OPTION VALUE="2021">2021</OPTION>
                    <OPTION VALUE="2022">2022</OPTION>
                    <OPTION VALUE="2023">2023</OPTION>
                    <OPTION VALUE="2024">2024</OPTION>
                    <OPTION VALUE="2025">2025</OPTION>
				          </SELECT>

				</p>
        <p>Adresse mail :
				<?php 
				  $champ = $donnees['adresse_mail_utilisateur'];
          echo"<input type='text' required name='adresse_mail' value='$champ' />";
        ?>
        Elle doit contenir au moins 4 caractères.
        </p>

				<p>Numéro de téléphone :
				<?php 
          $champ = $donnees['numero_telephone_utilisateur'];
          echo"<input type='text' name='numero_tel' value='$champ' />";
          if ($champ==0){
            echo 'Facultatif';
          }

				?>
        </p>
				
        <?php $reponse->closeCursor(); ?>
				
				<p>
				<input type="submit" value="modifier mon profil" />
				</p>
			  </form>
			  
			  </div>		     	  
		    </section>
		  </div>
		</div>
	  </div>
	</div>
	<!-- /Main -->
    
    <!-- Footer -->
      <?php include("../blocs/footer.php") ?>
	
  </body>
</html>

