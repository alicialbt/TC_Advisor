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
              <h2><a href="#">Statistiques</a></h2>
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
                	  <h3>Tout ce que tu as toujours voulu savoir<h3>
                    </br></br>
                  </header>
                </section>            
                <?php

$db=mysql_connect('localhost','root','') or die ("erreur de connexion");
mysql_select_db('projet_web',$db) or die ("Erreur : Connexion impossible à la Base de données");

$str_SQL = "SELECT COUNT(DISTINCT nom_utilisateur) AS compteur FROM utilisateur;";
$int_Count = mysql_query($str_SQL);
$tab_Count = mysql_fetch_array($int_Count);
echo "<section class=\"6u\"><span class=\"pennant\"><span class=\"fa fa-user\"</span></span>
<p>Nombre d'utilisateurs ayant un compte : "; 
echo $tab_Count["compteur"];
echo "</p>";

$str_SQL = "SELECT COUNT(DISTINCT nom_utilisateur) AS compteur FROM utilisateur INNER JOIN entreprise ON utilisateur.id_utilisateur = entreprise.id_utilisateur;";
$int_Count = mysql_query($str_SQL);
$tab_Count = mysql_fetch_array($int_Count);
echo "<h4>";
echo $tab_Count["compteur"];
echo " pélos partis en entreprise </h4>";

$str_SQL = "SELECT COUNT(DISTINCT nom_utilisateur) AS compteur FROM utilisateur INNER JOIN pays ON utilisateur.id_utilisateur = pays.id_utilisateur;";
$int_Count = mysql_query($str_SQL);
$tab_Count = mysql_fetch_array($int_Count);
echo "<h4>";
echo $tab_Count["compteur"];
echo " pélos partis en échange </h4></section>";

echo "</br>";


$str_SQL = "SELECT COUNT(DISTINCT nom_pays) AS compteur FROM pays;";
$int_Count = mysql_query($str_SQL);
$tab_Count = mysql_fetch_array($int_Count);
echo "<section class=\"6u\"><span class=\"pennant\"><span class=\"fa fa-globe\"</span></span><p>Nombre de pays : "; 
echo $tab_Count["compteur"];
echo "</p></section>";

$str_SQL = "SELECT COUNT(DISTINCT nom_ville) AS compteur FROM ville;";
$int_Count = mysql_query($str_SQL);
$tab_Count = mysql_fetch_array($int_Count);
echo "<section class=\"6u\"><span class=\"pennant\"><span class=\"fa fa-road\"</span></span><p>Nombre de villes : "; 
echo $tab_Count["compteur"];
echo "</p></span>";

$str_SQL = "SELECT COUNT(DISTINCT nom_entreprise) AS compteur FROM entreprise;";
$int_Count = mysql_query($str_SQL);
$tab_Count = mysql_fetch_array($int_Count);
echo "</br><section class=\"6u\"><span class=\"pennant\"><span class=\"fa fa-briefcase\"</span></span><p>Nombre d'entreprises : "; 
echo $tab_Count["compteur"];
echo "</p></section>";

				  ?>
		      </div>
		    </div>
	      </div>
	    </div>
	    <!-- /Main -->
    
      <!-- Footer -->
         <?php include("../blocs/footer.php") ?>
	
  </body>
</html>
