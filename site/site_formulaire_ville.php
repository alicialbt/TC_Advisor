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
	    <?php 
  session_start();
  if(!isset($_SESSION['login'])){
  	?>
  	<script> alert("Inscris toi avant d'accéder à cette page!");
  	document.location.href="site_accueil.php";
  	</script>
  	
  	<?php
  	}
  	?>  
  </head>
 
 
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
			     	<h2>Donner/modifier des infos </h2>
         			<span class=byline>Choisis ta ville</span>
         		  </header>  
    			
    			  <section>
				  <div class="formulaire">
   
   				 	<div id="no_villes"></div>
   					<SELECT id="liste_villes" onchange="checkField()" ><OPTION value =''></option></SELECT>
   					<div id="sortir_ville"></div>
   					<div id="manger_ville"></div>
   					<div id="voyager_ville"></div>
   					<div id="dormir_ville"></div>
   					<input type="button" value="Envoyer les infos" id="input">
       
       			  </div>
     			  </section>
     			  
     			</div>
			</div>
	    </div>
	</div>
	<!-- /Main -->
    
    <!-- Footer -->
      <?php include("../blocs/footer.php") ?>
      
  <script src="../js/liste_villes_utilisateur.js"></script>  

</body>
</html>
