<?php

$bdd = new PDO('mysql:host=localhost;dbname=dev_web','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['ins'])){

  if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp1']) AND !empty($_POST['mdp2'])){

    $pseudo = htmlspecialchars($_POST['pseudo']);
		$mail = htmlspecialchars($_POST['mail']);
    $mdp1 = sha1($_POST['mdp1']);
    $mdp2 = sha1($_POST['mdp2']);

		$pseudo_long = strlen($pseudo);

    if($pseudo_long < 60){

      $reqpseudo = $bdd->prepare("SELECT * FROM inscrit WHERE pseudo = ?");
			$reqpseudo->execute(array($pseudo));
			$pseudoexist = $reqpseudo->rowCount();
      if($pseudoexist == 0){

        $reqmail = $bdd->prepare("SELECT * FROM inscrit WHERE mail = ?");
				$reqmail->execute(array($mail));
				$mailexist = $reqmail->rowCount();
        if($mailexist == 0){

            if($mdp1 == $mdp2){

              $insertmbr = $bdd->prepare("INSERT INTO inscrit(pseudo, mail, mdp) VALUES (?, ?, ?)");
              $insertmbr->execute(array($pseudo, $mail, $mdp1));
              header('Location: index.php');

            }
            else{

              $erreur = "les mots de passe ne sont pas identiques";

            }

        }else{

          $erreur = "Votre adresse email est déjà utiliser";

        }

      }else{

        $erreur = "Votre pseudo est déjà utiliser";

      }

    }else{

      $erreur = "Votre pseudo est trop long";

    }

  }else{

    if(isset($_POST['ins']) AND (empty($_POST['pseudo']) AND  empty($_POST['mdp']) AND empty($_POST['mail']))){

  		$erreur = "Vous devez tout remplir";

    }

  }

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face_U/inscription</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
</head>

<body>
    <div class="reponse" style="width:25%;margin:0px auto;text-align:center">
        <?php
          if(isset($erreur)){
        ?>
          <div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $erreur; ?>
          </div>
        <?php
          }
        ?>
    </div>
    <div class="login-card">
      <img src="assets/img/avatar_2x.png" class="profile-img-card">
        <p class="text-uppercase text-center text-success profile-name-card">
           <a href="inscription.php">Inscription</a>
        </p>
        <form class="form-signin" method="post" action=""><span class="reauth-email"> </span>
            <input class="form-control" type="text" name="pseudo" for="pseudo" id="pseudo" value="<?php if(isset($pseudo)){ echo $pseudo;} ?>" required="" placeholder="Pseudo" maxlength="60" minlength="3" autofocus="">
            <input class="form-control" type="email" name="mail" for="mail" id="mail" value = "<?php if(isset($mail)){ echo $mail;} ?>" required="" placeholder="Email" minlength="5">
            <input class="form-control" type="password" name="mdp1" for="mdp1" required="" placeholder="Mot de passe" minlength="5" id="mdp1">
            <input class="form-control" type="password" name="mdp2" for="mdp2" required="" placeholder="Confirmer mot de passe" minlength="5" id="mdp2">
            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" id="ins" for="ins" name="ins">Inscription</button>
        </form><br>
        Déjà un compte ? <a class="ins" href="index.php">Connexion</a><br><br>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
