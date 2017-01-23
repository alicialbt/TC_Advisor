<!--
Ce fichier est inclu dans mon_compte.php, où un session_start() est lancée. Pas besoin d'en lancer une ici. On peut utiliser $_SESSION.
-->  
<p>
<a href='site_modifier_info_utilisateur.php'>Modifier mon profil</a>
</p>


<?php
try{
  $bdd = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', '');
}catch (Exception $e){
  die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM utilisateur WHERE adresse_mail_utilisateur = \''.$_SESSION['login'].'\'');

$donnees = $reponse->fetch();
?>

  <p>
  NOM : <?php echo $donnees['nom_utilisateur'];?></p>
  <p>
  PRENOM : <?php echo $donnees['prenom_utilisateur'];?></p>
  <p>
  PROMO : <?php echo $donnees['promo_utilisateur'];?></p>
  <p>
  NUMERO DE TELEPHONE : 
  <?php 
  if($donnees['numero_telephone_utilisateur']==0)
    echo 'Pas de numéro enregistré';
  else
    echo $donnees['numero_telephone_utilisateur'];
  ?>
  <p>
  ADRESSE MAIL : <?php echo $donnees['adresse_mail_utilisateur'];?></p>


<?php
$reponse->closeCursor();
?>


