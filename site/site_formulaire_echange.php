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
    <script src="../js/liste_echanges_utilisateur.js"></script>  
   	<script src="../js/liste_pays_formulaire_echange.js"></script>
   	<script src="../js/liste_villes_formulaire_echange.js"></script>
   	<script src="../js/liste_durees_stage_formulaire_echange.js"></script>
   	<script src="../js/liste_annees_stage_formulaire_echange.js"></script>
   	<script src="../js/liste_durees_echange_formulaire_echange.js"></script>
   	<script src="../js/liste_annees_echange_formulaire_echange.js"></script>
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
              <h2><a href="#">Espace Personnel</a></h2>
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
                    <h2>Plus de détails sur ton échange/stage</h2>
                      <span class=byline>Raconte-nous tout !</span>
                  </header>
                  <form id="contrat"> 
                   <div class="formulaire">
                     <input type="hidden" name="login" id="login" value="<?php echo $_SESSION['login'];?>">
                     <label><p>Pays dans lequel tu es parti :</p></label>
                     <input list="dropdownpays" required name="pays" type="text" id="pays"> <datalist id="dropdownpays"></datalist>

                    <label><p>Ville dans laquelle tu es parti :</p></label>
                    <input list="dropdownville" required name="ville" type="text" id="ville"> <datalist id="dropdownville"></datalist>
                    </br>
                    

                    <label for="echange_type"><p>tu es parti en </p></label>
                    
                      <input type="radio" required name="depart" id="echange" value='echange'> echange<br>
                      <input type="radio" required name="depart" id="stage" value='stage'> stage<br>
                      
                      </br>

            		</form>
                    <div class="stage">
                      <label><p>Durée du stage (en mois) : </p><label>
                      <input list="dropdowndureestage" name="duree_stage" type="text" id="duree_stage"> <datalist id="dropdowndureestage"></datalist>
                      
                      
                       <label><p>Année du stage: </p></label>
                      <input list="dropdownanneestage" name="annee_stage" type="text" id="annee_stage"> <datalist id="dropdownanneestage"></datalist> 
                      
                      <label for="nom_entreprise"><p>Nom de l'entreprise :   &nbsp;&nbsp;&nbsp;&nbsp;</p></label> 
                      <input  type="text" name="nom_entreprise" id="nom_entreprise"/>
                    </div>
                                                              

                    <div class="echange">
                      <label><p>Durée de l'échange (en mois) : </p></label>
                      <input list="dropdowndureeechange" name="duree_echange" type="text" id="duree_echange"> <datalist id="dropdowndureeechange"></datalist> 
                      
                      <label><p>Année de l'échange : </p></label>
                      <input list="dropdownanneechange" name="annee_echange" type="text" id="annee_echange"> <datalist id="dropdownanneeechange"></datalist> 
                      
                      <label for="nom_universite"><p>Nom de l'universite :   &nbsp;&nbsp;&nbsp;&nbsp;</p></label> 
                      <input  type="text"  name="nom_universite" id="nom_universite"/>
                      
                      <label for="langue_cours"><p>Langue des cours :  &nbsp;&nbsp;&nbsp;&nbsp;</p></label>
                      <input style="margin-left= -20px" type="text" name="langue_cours" id="langue_cours"/>
                      
                      <label for="cours_interessants"><p>Cours interessants :  &nbsp;&nbsp;&nbsp;&nbsp;</p></label>
                      <textarea id="cours_interessants" name="cours_interessants" rows="5" cols="50"></textarea>
                      
                      <label for="contrat_etudes"><p>Contrat d'études : &nbsp;&nbsp;&nbsp;&nbsp;</p></label>
                      <textarea id="contrat_etudes" name="contrat_etudes" rows="5" cols="70"></textarea>
                    </div>
                    </br></br>

                    <input type="submit"  value="Saisir les infos"/>
                  </form>
                   
                    <input type="button" onclick="location.replace('site_accueil.php');" value="Retour à l'accueil"/>

                </div>
    </section>
		</div>
    </div>
	  </div>
	  </div>
	    <!-- /Main -->
    
      <!-- Footer -->
         <?php include("../blocs/footer.php") ?>


	  <script src="../js/script_hide.js"></script> 
    <script src="../js/envoi_formulaire_echange.js"></script>
   
  
  </body>
</html>


