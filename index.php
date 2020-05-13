<?php
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=dev_web','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['con'])){

	if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){

		$pseudo = htmlspecialchars($_POST['pseudo']);
		$mdp = sha1($_POST['mdp']);

		$pseudo_long = strlen($pseudo);

		if($pseudo_long < 20){

			$requser = $bdd->prepare("SELECT * FROM inscrit WHERE pseudo = ? AND mdp = ?");
			$requser->execute(array($pseudo,$mdp));
			$userexist = $requser->rowCount();

			if($userexist == 1){

				$userinfo = $requser->fetch();
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['pseudo'] = $userinfo['pseudo'];
				$_SESSION['mail'] = $userinfo['mail'];
				$_SESSION['mdp'] = $userinfo['mdp'];
				$_SESSION['facebook'] = $userinfo['facebook'];
				$_SESSION['twitter'] = $userinfo['twitter'];
				header('Location: profil.php?id='.$_SESSION['id']);

			}
			else{

				$erreur = "Pseudo ou mot de passe mauvais ou Votre compte n'existe pas encore";

			}

		}else{

			$erreur = "Votre pseudo est trop long";

		}

	}else{

    if(isset($_POST['con']) AND (empty($_POST['pseudo']) AND  empty($_POST['mdp']))){

				$erreur = "Vous devez tout remplir";

    }
		if(isset($_POST['con']) AND (empty($_POST['mdp']))){

				$erreur = "Vous devez remplir votre mot de passe";

		}
		if(isset($_POST['con']) AND (empty($_POST['pseudo']))){

				$erreur = "Vous devez remplir votre pseudo";

		}
  }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face_U/Connexion</title>
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
           <a href="index.php">Connexion</a>
        </p>
        <form class="form-signin" method="post" action="">
            <span class="reauth-email"> </span>
            <input class="form-control" type="text" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)){ echo $pseudo; } ?>" required="" placeholder="Pseudo" maxlength="60" minlength="3" autofocus="">
            <input class="form-control" type="password" name="mdp" placeholder="Mot de passe" minlength="5" id="mdp">
            <button class="btn btn-primary btn-block btn-lg btn-signin" name="con" for="con" id="con" type="submit">Connexion </button>
        </form>
        <a class="text-lowercase text-danger forgot-password" href="mdp_oublier.php">mot de passe oublier ? </a><br><br>
        Pas de compte ? <a class="ins" href="inscription.php">inscription</a><br><br>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
