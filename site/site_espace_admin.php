<!DOCTYPE html>
<html>

  <head>
    <title>TC Advisor</title>  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-panels.min.js"></script>
    <script src="js/init.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/liste_utilisateurs_espace_admin.js"></script>    
    
    <link rel="stylesheet" href="../css/skel-noscript.css" />
<?php 
  session_start();
  if($_SESSION['id']!='1'){
  	?>
  	<script> alert("On t'as repéré vil loustic... Rentre chez toi maintenant");
  	document.location.href="site_accueil.php";
  	</script>
  	
  	<?php
  	}
  	?>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style-desktop.css" />
	
  </head>
 
  <body>
  
    <!-- Main -->	
      <div id="main">
        <div class="container">
          <div class="row">

           <!-- Sidebar -->
            <?php include("../blocs/sidebar.php") ?>

            <!-- Content -->
              <div id=content" class="8u skel-cell-important">
                <section>  
    	
    <div class="formulaire">
    <div class="container">
	  <form method="post" id="contrat">
    <div id="myDiv2"><p> Noms des pélos inscrits sur TC Advisor: </p></div>
	  </br>
    <input type="submit"  value="Afficher les ajouts de l'utilisateur"/>   
    </form>
    
    <div id=myDiv></div>
    <div id=myDiv4></div>
    <div id=myDiv3></div>
    <div id=myDiv5></div>
    <div id=myDiv6></div>    
    <div id=myDiv7></div>
	</div>
	</div>
	 </section>
	</div>
	</div>
	</div>
	</div>
	<!-- /Main -->
    
    <!-- Footer -->
      <?php include("../blocs/footer.php") ?>

    <script src="../js/liste_infos_utilisateur_espace_admin.js"></script>

</body>
</html>
