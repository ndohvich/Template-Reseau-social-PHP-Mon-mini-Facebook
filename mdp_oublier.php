<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=dev_web','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['con'])){

  $erreur = "Face_U vient de vous envoyer votre mot de passe pas mail";

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face_U/Profil</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
</head>

<body>
    <div class="login-card"><img src="assets/img/avatar_2x.png" class="profile-img-card">
        <p class="text-uppercase text-center text-success profile-name-card">
           <a href="profil.php">Mot de passe oublier</a>
        </p>
        <form class="form-signin" method="post" action="">
            <span class="reauth-email"> </span>
            <input class="form-control" type="text" name="pseudo" id="pseudo" required="" placeholder="Pseudo" maxlength="60" minlength="3" autofocus="">
            <input class="form-control" type="email" name="mail" for="mail" id="mail" required="" placeholder="Email" minlength="5">
            <button class="btn btn-primary btn-block btn-lg btn-signin" name="con" for="con" id="con" type="submit">Envoyer </button><br>
        </form>
        <center>
          <a class="ins" href="index.php">Accueil</a><br><br>
          <p style="color:red;font-weight:bold;">
            <?php
              if(isset($erreur)){
                echo $erreur;
              }
            ?>
          </p>
        </center>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
