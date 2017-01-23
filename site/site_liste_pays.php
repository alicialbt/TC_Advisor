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
    <script src="../js/liste_infos_villes_pays.js"></script>

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
              <h2><a href="#">Villes</a></h2>
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
    			  	<h2>Sélectionne le pays qui t'intéresse</h2>
    			  	<span class="byline">Ainsi que la ville !</span>
    			  </header>
    			  
    		    <div class="formulaire">
            <div id="intropage"></div>
    				<SELECT id="liste_pays" onchange="checkField()" ><OPTION value =''></option></SELECT> 
    
    				<div id="introvilles"></div>
    				<SELECT id="liste_villes" onchange="checkFieldVille()"><OPTION value =''></option></SELECT>
    	
    				<div id="introvilles2"></div>
    				<div id="infoville"></div>
            
            
            <input type="button" id="nouvelle_recherche" onclick="doNewResearch()" value="Effectuer une nouvelle recherche"/>
	
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
