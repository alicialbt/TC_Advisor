<div class="connexion">
  <div class="container">
    <header>
      <?php
        session_start();
 
        if(!isset($_SESSION['login'])){
      
          echo '<div id="logging">  
          <form action="../site/site_connexion.php" method="post">
		      <input type="text" placeholder="Mail" required name="mail" >
   	      <input type="password" placeholder="Password" required name="pwd">
		      <input type="submit" value="Connexion" style="float:left">
          </form>
		      </div>';
      
           echo '<div id="inscript">
          <form action="../site/site_inscription.php">
          <input type="submit" value="Inscription" style="float:right, margin:0 0 0 0">
          </div>';
        }
        else{
          echo 'Salut ';
          echo $_SESSION['prenom'];
          echo '<div id="deconnect">
          <form action=../site/site_deconnexion.php>
          <input type="submit" value="Deconnexion">
          </div>'; 
       }
     ?>
    </header>
  </div>
</div>
