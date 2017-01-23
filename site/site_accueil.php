<!DOCTYPE HTML>
<!--
	Linear by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
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

  <body class="homepage">
	<!-- Header -->
		<div id="header">
			
      <?php include("../blocs/onglets.php") ?>
			
      <div class="container"> 
				<!-- Logo -->
				<div id="logo">
          <img src="../images/TCATW.png" height="300" width="300" style="margin:-120px 0 0 0">
					<h1><a href="#">TC Advisor</a></h1>
					<span class="tag">Réalisé avec amour par des TC pour les TC</span>
				</div>
			</div>
		</div>

	<!-- Featured -->
		<div id="featured">
			<div class="container">
				<header>
					<h2>Bienvenue sur TC Advisor ! </h2>
				</header>
        <p>Sur ce site, tu peux :</p>
        
          <a href="site_echange.php"><p>Accéder aux contrats d'étude</p></a>
          <a href="site_stage.php"><p>Accéder à la banque de données des stages</p></a>
          <a href="site_liste_pays.php"><p>Accéder aux bons plans dans chaque ville</p></a>
        <?php
          if(isset($_SESSION['login'])){
            echo '<a href="site_mon_compte.php"><p>Accéder à ton espace personnel</p></a>';
          	echo '<a href="site_formulaire_echange.php"><p>Donner les infos de ton voyage</p></a>';
    		echo '<a href="site_formulaire_ville.php"><p>Donner les bons plans de la ville ou tu es parti</p></a>';
          	if($_SESSION['id'] == '1'){
    		  echo '<a href="site_espace_admin.php"><p>Acceder à l\'espace d\'administration car tu es trop un BG</p></a>';
    		 } 
    	  }
          else{
            echo '<a href="site_mon_compte.php"><p>Te connecter pour accéder à ton espace personnel</p></a>';}
         ?>
                                
        <a href="site_statistiques.php"><p>Avoir des infos sur les personnes parties</p></a>
        </hr>
			</div>
		</div>

	<!-- Tweet -->
		<div id="tweet">
			<div class="container">
				<section>
					<blockquote>&ldquo;Un TC à l'étranger est un TC satisfait.</br>Un TC à l'étranger qui n'a pas eu besoin de faire son contrat d'étude est un TC encore plus satisfait.&rdquo;</blockquote>			
        </section>
			</div>
		</div>

	<!-- Footer -->
    <?php include("../blocs/footer.php") ?>

	</body>
</html>
