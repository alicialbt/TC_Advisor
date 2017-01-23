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

 <?php include("../blocs/champ_connexion.php") ?>

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
		     	  <?php 
					if(!isset($_SESSION['login'])){
						echo "<header>
                    			<h2>Pas trop vite jeune TC...</h2>
                      				<span class=\"byline\">Tu n'es pas encore inscrit !</span>
                  				</header>
								<p>Pas encore de compte ? <a href=\"site_inscription.php\">Inscris-toi</a></p>
								<p>Déja un compte ? <a href=\"site_accueil.php\">Connecte-toi</a> sur la page d'accueil</a></p>";

					}else{

						echo '<header><h2>Salut '.$_SESSION['prenom'].' !</h2>
							  <span class="byline">Voici tes données personnelles que tu peux modifier si tu le souhaites</span></header>';
            include("../req/info_utilisateur.php");
          ?>
          <a href="site_formulaire_echange.php"><p><br />Donner les infos de vos échanges!</p></a>
          <a href="site_formulaire_ville.php"><p>Donner les bons plans de la ville ou vous êtes partis!</p></a>
         <?php
					}
				 ?>
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
