<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=dev_web','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face_U</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/styles(2).css">
    <link rel="stylesheet" href="assets/css/msg.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
    <script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
    <script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
    <link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
    <link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
    <script src="https://use.typekit.net/hoy3lrg.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

</head>

<body>
    <nav class="navbar navbar-default custom-header">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="Face_U.php">Face_Upac </a>
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
                  <li role="presentation" style="padding-right:5px;"><a href="#" class="custom-navbar" style="color:white;"> Message<span class="badge">0 </span></a></li>
                  <li role="presentation" style="padding-right:30px;"><a href="#" class="custom-navbar" style="color:white;"> Groupe<span class="badge">0 </span></a></li>
                  <li role="presentation" style="padding-right:30px;"><a href="" class="custom-navbar" style="color:white;"> <?php echo $_SESSION['pseudo'] ?></a></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <span class="caret"></span><img src="assets/membres/avatar/<?php echo $userinfo['avatar'] ?>" class="profile-img-card dropdown-image"></a>
                      <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li role="presentation">
                          <a href="profil.php">Profil </a>
                        </li>
                        <li role="presentation" class="active">
                          <a href="deconnexion.php">Déconnexion </a>
                        </li>
                      </ul>
                  </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class = "msg">

      <div id="frame">
      	<div id="sidepanel">
      		<div id="profile">
      			<div class="wrap">
      				<img id="profile-img" src="assets/img/avatar_2x.png" class="online" alt="" />
      				<p>Bienvenue <?php echo $_SESSION['pseudo'] ?></p>
      				<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
      				<div id="status-options">
      					<ul>
      						<li id="status-online" class="active"><span class="status-circle"></span> <p>En ligne</p></li>
      						<li id="status-away"><span class="status-circle"></span> <p>Un instant</p></li>
      						<li id="status-busy"><span class="status-circle"></span> <p>Occupé</p></li>
      						<a href="deconnexion.php" style="text-decoration:none;color:white"><li id="status-offline"><span class="status-circle"></span> <p>Déconnecté</p></li></a>
      					</ul>
      				</div>
      				<div id="expanded">
      					<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
      					<input name="twitter" type="text" placeholder="Pseudo du compte facebook" />
      					<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
      					<input name="twitter" type="text" placeholder="Pseudo du compte twitter" />
      					<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
      					<input name="twitter" type="text" placeholder="Pseudo du compte instagram" />
      				</div>
      			</div>
      		</div>
      		<div id="search">
      			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
      			<input type="text" placeholder="Chercher un contact..." />
      		</div>
      		<div id="contacts">
      			<ul>
              <li class="contact">
      					<div class="wrap">
      						<span class="contact-status online"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Tout le monde</p>
      							<p class="preview"></p>
      						</div>
      					</div>
      				</li>
      				<li class="contact">
      					<div class="wrap">
      						<span class="contact-status online"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Lélé</p>
      							<p class="preview">Yo bro odk ???</p>
      						</div>
      					</div>
      				</li>
      				<li class="contact active">
      					<div class="wrap">
      						<span class="contact-status busy"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Fandio</p>
      							<p class="preview">yep !!!</p>
      						</div>
      					</div>
      				</li>
      				<li class="contact">
      					<div class="wrap">
      						<span class="contact-status away"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Dezo</p>
      							<p class="preview">bonjour le scanner</p>
      						</div>
      					</div>
      				</li>
      				<li class="contact">
      					<div class="wrap">
      						<span class="contact-status online"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Samy</p>
      							<p class="preview">Vive la chorale de l'UPAC..</p>
      						</div>
      					</div>
      				</li>
      				<li class="contact">
      					<div class="wrap">
      						<span class="contact-status busy"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Martino Production</p>
      							<p class="preview">La saison 2 est déjà disponible sur itunes</p>
      						</div>
      					</div>
      				</li>
      				<li class="contact">
      					<div class="wrap">
      						<span class="contact-status"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Lambert Cho</p>
      							<p class="preview">Thanks :)</p>
      						</div>
      					</div>
      				</li>
      				<li class="contact">
      					<div class="wrap">
      						<span class="contact-status"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Glory</p>
      							<p class="preview">j'ai bien composé</p>
      						</div>
      					</div>
      				</li>
      				<li class="contact">
      					<div class="wrap">
      						<span class="contact-status busy"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Nathan</p>
      							<p class="preview">Les gars j'ai le sky ont dit quoi !!!</p>
      						</div>
      					</div>
      				</li>
      				<li class="contact">
      					<div class="wrap">
      						<span class="contact-status"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Yvan</p>
      							<p class="preview">Système Tchakap</p>
      						</div>
      					</div>
      				</li>
      				<li class="contact">
      					<div class="wrap">
      						<span class="contact-status"></span>
      						<img src="assets/img/avatar_2x.png" alt="" />
      						<div class="meta">
      							<p class="name">Hervé</p>
      							<p class="preview"><span>Je suis là</span></p>
      						</div>
      					</div>
      				</li>
      			</ul>
      		</div>
      		<div id="bottom-bar">
      			<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Contact</span></button>
      			<a href="profil.php" style="text-decoration:none;color:white">
              <button id="settings">
                <i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Paramètres</span>
              </button>
            </a>
      		</div>
      	</div>
      	<div class="content">
      		<div class="contact-profile">
      			<img src="assets/img/avatar_2x.png" alt="" />
      			<p>Fandio</p>
      			<div class="social-media">
      				<i class="fa fa-facebook" aria-hidden="true"></i>
      				<i class="fa fa-twitter" aria-hidden="true"></i>
      				 <i class="fa fa-instagram" aria-hidden="true"></i>
      			</div>
      		</div>
      		<div class="messages">
      			<ul>
      				<li class="sent">
      					<img src="assets/img/avatar_2x.png" alt="" />
      					<p>yep !!!</p>
      				</li>
      				<li class="replies">
      					<img src="assets/img/avatar_2x.png" alt="" />
      					<p>yesss oooooh !!!</p>
      				</li>
      			</ul>
      		</div>
      		<div class="message-input">
      			<div class="wrap">
      			<input type="text" placeholder="Ecrivez votre message..." />
      			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
      			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
      			</div>
      		</div>
      	</div>
      </div>

    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
    <script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

    $("#profile-img").click(function() {
    	$("#status-options").toggleClass("active");
    });

    $(".expand-button").click(function() {
      $("#profile").toggleClass("expanded");
    	$("#contacts").toggleClass("expanded");
    });

    $("#status-options ul li").click(function() {
    	$("#profile-img").removeClass();
    	$("#status-online").removeClass("active");
    	$("#status-away").removeClass("active");
    	$("#status-busy").removeClass("active");
    	$("#status-offline").removeClass("active");
    	$(this).addClass("active");

    	if($("#status-online").hasClass("active")) {
    		$("#profile-img").addClass("online");
    	} else if ($("#status-away").hasClass("active")) {
    		$("#profile-img").addClass("away");
    	} else if ($("#status-busy").hasClass("active")) {
    		$("#profile-img").addClass("busy");
    	} else if ($("#status-offline").hasClass("active")) {
    		$("#profile-img").addClass("offline");
    	} else {
    		$("#profile-img").removeClass();
    	};

    	$("#status-options").removeClass("active");
    });

    function newMessage() {
    	message = $(".message-input input").val();
    	if($.trim(message) == '') {
    		return false;
    	}
    	$('<li class="sent"><img src="assets/img/avatar_2x.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
    	$('.message-input input').val(null);
    	$('.contact.active .preview').html('<span>You: </span>' + message);
    	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
    };

    $('.submit').click(function() {
      newMessage();
    });

    $(window).on('keydown', function(e) {
      if (e.which == 13) {
        newMessage();
        return false;
      }
    });
    //# sourceURL=pen.js
    </script>
</body>

</html>
