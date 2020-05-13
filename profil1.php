<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=dev_web','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_SESSION['id'])){

 if(isset($_GET['id']) AND $_GET['id'] > 0){

   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM inscrit where id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();

   if(isset($_POST['ajr'])){

     if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $userinfo['pseudo']){

       $newpseudo = htmlspecialchars($_POST['newpseudo']);
       $insertpseudo = $bdd->prepare('UPDATE inscrit SET pseudo = ? WHERE id = ?');
       $insertpseudo->execute(array($newpseudo,$_SESSION['id']));
       header('Location : Face_U.php?id='.$_SESSION['id']);

     }
     if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userinfo['mail']){

       $newmail = htmlspecialchars($_POST['newmail']);
       $insertmail = $bdd->prepare('UPDATE inscrit SET mail = ? WHERE id = ?');
       $insertmail->execute(array($newmail,$_SESSION['id']));
       header('Location : Face_U.php?id='.$_SESSION['id']);

     }
     if((isset($_POST['newmdp1']) AND !empty($_POST['newmdp1'])) AND (isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))){

       $mdp1 = sha1($_POST['newmdp1']);
       $mdp2 = sha1($_POST['newmdp2']);

       if($mdp1 == $mdp2){

         $insertmdp = $bdd->prepare('UPDATE inscrit SET mdp = ? WHERE id = ?');
         $insertmdp->execute(array($mdp1,$_SESSION['id']));
         header('Location : Face_U.php?id='.$_SESSION['id']);

       }else{

         $erreur = "les mots de passe ne sont pas identiques !!!";

       }

     }
     if(isset($_POST['facebook']) AND !empty($_POST['facebook']) AND $_POST['facebook'] != $userinfo['facebook']){

       $facebook = htmlspecialchars($_POST['facebook']);
       $insertfacebook = $bdd->prepare('UPDATE inscrit SET facebook = ? WHERE id = ?');
       $insertfacebook->execute(array($facebook,$_SESSION['id']));
       header('Location : Face_U.php?id='.$_SESSION['id']);

     }
     if(isset($_POST['twitter']) AND !empty($_POST['twitter']) AND $_POST['twitter'] != $userinfo['twitter']){

       $twitter = htmlspecialchars($_POST['twitter']);
       $inserttwitter = $bdd->prepare('UPDATE inscrit SET twitter = ? WHERE id = ?');
       $inserttwitter->execute(array($twitter,$_SESSION['id']));
       header('Location : Face_U.php?id='.$_SESSION['id']);

     }

     if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){

       $tailleMax = 2097152;
       $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
       if(isset($_FILES['avatar']['size']) <= $tailleMax){

         $extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
         if(in_array($extensionsUpload, $extensionsValides)){

           $chemin =  "assets/membres/avatar/".$_SESSION['id'].".".$extensionsUpload;
           $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
           if($resultat){

             $updateavatar = $bdd->prepare('UPDATE inscrit SET avatar = :avatar WHERE id = :id');
             $updateavatar->execute(array(

               'avatar' => $_SESSION['id'].".".$extensionsUpload,
               'id' => $_SESSION['id'],

             ));

             header('Location : profil.php?id'.$_SESSION['id']);

           }
           else{

             $erreur = "Erreur durant l'importation de votre photo de profil !!!";

           }

         }
         else{

           $erreur = "Votre photo de profil doit être jpeg, jpg, gif ou png !!!";

         }

       }
       else{

         $erreur = "Votre de profil ne doit pas dépasser 2 Mo !!!";

       }

     }

   }

?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Face_U/Profil</title>
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
   <link rel="stylesheet" href="assets/css/styles(2).css">
   <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
   <link rel="stylesheet" href="assets/css/Pretty-Header.css">
   <link rel="stylesheet" href="assets/css/profil1.css">
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

 <?php
 if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
 {
 ?>
     <nav class="navbar navbar-default custom-header">
         <div class="container-fluid">
             <div class="navbar-header"><a class="navbar-brand navbar-link" href="Face_U.php">Face_Upac </a>
                 <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
             </div>
             <div class="collapse navbar-collapse" id="navbar-collapse">
                 <ul class="nav navbar-nav links">
                   <li role="presentation">
                     <center>
                       <form>
                         <input type="search" style="width:400px;border:2px solid;padding:6px;margin-top:5px;">
                         <button class="btn btn-default" type="button" style="color:black;font-weight:bold;">Rechercher </button>
                       </form>
                     </center>
                   </li>
                 </ul>
                 <ul class="nav navbar-nav navbar-right">
                   <li role="presentation" style="padding-right:5px;"><a href="#" class="custom-navbar" style="color:white;"> Actualité<span class="badge">0 </span></a></li>
                   <li role="presentation" style="padding-right:5px;"><a href="Face_U.php" class="custom-navbar" style="color:white;"> Message<span class="badge">0 </span></a></li>
                   <li role="presentation" style="padding-right:30px;"><a href="#" class="custom-navbar" style="color:white;"> Groupe<span class="badge">0 </span></a></li>
                   <li role="presentation" style="padding-right:30px;"><a href="" class="custom-navbar" style="color:white;"> <?php echo $_SESSION['pseudo'] ?></a></li>
                   <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <span class="caret"></span><img src="assets/membres/avatar/<?php echo $userinfo['avatar'] ?>" class="profile-img-card dropdown-image"></a>
                       <ul class="dropdown-menu dropdown-menu-right" role="menu">
                         <li role="presentation"><a href="profil.php">Profil </a></li>
                         <li role="presentation" class="active"><a href="deconnexion.php">Déconnexion </a></li>
                       </ul>
                   </li>
                 </ul>
             </div>
         </div>
     </nav>
 <?php
 }
 ?>

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

 <div id="inf">

   <div class="titre1">
     <p>Informations Personnelles</p>
   </div>
   <br>
   <div align="center">
     <form method="post" action="<?php Location: header('profil.php?id'.$_SESSION['id']) ?>" enctype="multipart/form-data">

       <div class="login-card" style="margin:0px auto;">
         <img src="assets/membres/avatar/<?php echo $userinfo['avatar'] ?>" class="profile-img-card">
       </div>

       <table>
         <tr>
           <td align="left"><label>Avatar : </label></td>
           <td><input class="form-control" name="avatar" for="avatar" id="avatar" type="file" /></td>
         </tr>
         <tr>
           <td align="left"><label>Pseudo : </label></td>
           <td><input class="form-control" name="newpseudo" for="newpseudo" id="newpseudo" value="<?php echo $userinfo['pseudo'] ?>" type="text" /></td>
         </tr>
         <tr>
           <td align="left"><label>Mail : </label></td>
           <td><input class="form-control" name="newmail" for="newmail" id="newmail" value="<?php echo $userinfo['mail'] ?>" type="email" /></td>
         </tr>
         <tr>
           <td align="left"><label>Mot de passe : </label></td>
           <td><input class="form-control" name="newmdp1" for="newmdp1" id="newmdp1" placeholder="Modifier le mdp" type="password" /></td>
         </tr>
         <tr>
           <td align="left"><label>Confirmer mot de passe : </label></td>
           <td><input class="form-control" name="newmdp2" for="newmdp2" id="newmdp2" placeholder="Confirmer le nouveau mdp" type="password" /></td>
         </tr>
       </table>

       <br>
       <div class="titre2">
         <p>Réseaux Sociaux</p>
       </div>
       <br>
       <table>
         <tr>
           <td align="left"><label>Facebook : </label></td>
           <td><input class="form-control" name="facebook" for="facebook" id="facebook" value="<?php echo $userinfo['facebook'] ?>" type="text" /></td>
         </tr>
         <tr>
           <td align="left"><label>Twitter : </label></td>
           <td><input class="form-control" name="twitter" for="twitter" id="twitter" value="<?php echo $userinfo['twitter'] ?>" type="text" /></td>
         </tr>
       </table>
       <br>
       <?php
       if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
       {
       ?>
         <input type="submit" name="ajr" for="ajr" id="ajr" value="Mettre à jour">
       <?php
       }
       ?>
     </form>
   </div>
 </div>



</body>

</html>

<?php
}
else{
 }
}
else{
 header("Location: index.php");
}
?>
