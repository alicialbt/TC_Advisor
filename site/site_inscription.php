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
      <script src="../js/tmp.js"></script>
  	
  	  <link rel="stylesheet" href="../css/skel-noscript.css" />
  	  <link rel="stylesheet" href="../css/style.css" />
  	  <link rel="stylesheet" href="../css/style-desktop.css" />
  
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
			     	<h2>Inscris-toi sur TC Advisor!</h2>
         			<span class=byline>Les infos seront modifiables plus tard</span>
         		  </header>
         			
         <div class="formulaire">
         <form action="site_invisible_inscription.php" method="post" id="form">
            <table>
               <tr>
                  <td><label for="mail"></label></td>
                  <td><input type="text" required name="mail" id="mail" placeholder="Mail"/>
                   </td>
                 
               </tr>
               <tr>
                  <td><label for="pass"></label></td>
                  <td>
                     <input type="password" required name="pwd1" id="pwd1" placeholder="Mot de passe"/></td>
                    <td><div class="tooltip">Minimum 6 caractères</div></td>
               </tr>
               
            <tr>               
               <td><label for="pass"><strong></label></td>
               <td><input type="password" required name="pwd2" id="pwd2"
                    placeholder="Vérification du mot de passe"/></td>
			         <td></td>              </tr>
             <tr>
                  <td><label for="prenom"></label></td>
                  <td>
                     <input type="text" required name="prenom" id="prenom" placeholder="Prénom"/></td>
                  <td><div class="tooltip">Minimum 2 caractères</div></td>
               </tr>
               <tr>
                  <td><label for="nom"></label></td>
                  <td>
                     <input type="text" required name="nom" id="nom" placeholder="Nom"/></td>
                  <td>  <div class="tooltip">Minimum 2 caractères</div></td>
               </tr>   
               <tr>
			          <td></td>
			          <td>
				          <SELECT name="promotion">
				            <OPTION VALUE="2015">Promo</OPTION>
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
			         </td>
            </tr>
            <tr>
              <td><label for="telephone"></label></td>
                  <td>
                     <input type="text" name="telephone" id="telephone" placeholder="Téléphone"/>
                    <p>Ne remplis pas ton numéro si tu ne veux pas qu'il aparaisse sur le site</p></td>
               </tr>
            </table>
            <br/><br/>       
            <input type="submit"  value="Enregistrer"/>   
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
      
      
      
      <script>

    function deactivateTooltips() {

        var tooltips = document.querySelectorAll('.tooltip'),
    tooltipsLength = tooltips.length;

        for (var i = 0; i < tooltipsLength; i++) {
            tooltips[i].style.display = 'none';
        }

    }


    // La fonction ci-dessous permet de récupérer la "tooltip" qui correspond à notre input

    function getTooltip(elements) {

        while (elements = elements.nextSibling) {
            if (elements.className === 'tooltip') {
                return elements;
            }
        }

        return false;

    }
    var check = {}; // On met toutes nos fonctions dans un objet littéral
  
    check['pwd1'] = function () {

        var pwd1 = document.getElementById('pwd1'),
    tooltipStyle = getTooltip(pwd1).style;

        if (pwd1.value.length >= 6) {
            pwd1.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            pwd1.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }

    };
	check['pwd2'] = function()
	{
		var pwd1 = document.getElementById('pwd1'),
			pwd2 = document.getElementById('pwd2'),
			tooltipStyle = getTooltip(pwd2).style;
			 
		if(pwd1.value == pwd2.value && pwd2.value != '')
		{
			pwd2.className = 'correct';
			tooltipStyle.display = 'none';
			return true;
		}
		else
		{
			pwd1.className = 'incorrect';
			tooltipStyle.display = 'inline-block';
			return false;
		}
	};

    check['prenom'] = function (id) {

        var name = document.getElementById(id),
    tooltipStyle = getTooltip(name).style;

        if (name.value.length >= 2) {
            name.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            name.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }

    };

    check['nom'] = function (id) {

        var name = document.getElementById(id),
    tooltipStyle = getTooltip(name).style;

        if (name.value.length >= 2) {
            name.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            name.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }

    };
	


   
    (function () { // Utilisation d'une IIFE pour éviter les variables globales.

        var myForm = document.getElementById('myForm'),
    inputs = document.querySelectorAll('input[type=text], input[type=password]'),
    inputsLength = inputs.length;

        for (var i = 0; i < inputsLength; i++) {
            inputs[i].addEventListener('keyup', function (e) {
                check[e.target.id](e.target.id); // "e.target" représente l'input actuellement modifié
            }, false);
        }

        myForm.addEventListener('submit', function (e) {

            var result = true;

            for (var i in check) {
                result = check[i](i) && result;
            }

            if (result) {
                alert('Le formulaire est bien rempli.');
            }

            e.preventDefault();

        }, false);

        myForm.addEventListener('reset', function () {

            for (var i = 0; i < inputsLength; i++) {
                inputs[i].className = '';
            }

            deactivateTooltips();

        }, false);

    })();


    // Maintenant que tout est initialisé, on peut désactiver les "tooltips"

    deactivateTooltips();
	</script>


   </body>
</html>
