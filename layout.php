<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>{page.title} | {page.name}</title>
	<meta name="description" content="{description}" />
	<meta name="keywords" content="{keywords}" />
	<?php if(isset($params[0]) AND $params[0] == "login"): ?>
	<link rel="stylesheet" href="<?= TWEB ?>assets/css/login.css" />
	<?php elseif(isset($params[0]) AND $params[0] == "signup"): ?>
	<link rel="stylesheet" href="<?= TWEB ?>assets/css/signup.css" />
	<?php else: ?>
	<link rel="stylesheet" href="<?= TWEB ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?= TWEB ?>assets/css/bjqs.css" />
	<?php endif; ?>
</head>
<body>
	<?php if(!isset($params[0]) OR ($params[0] != "login" AND $params[0] != "signup")): ?>
	<!-- DEBUT du header -->
	<header id="header">
		<div class="inner">
			<div id="description" class="left">
				<h1>{page.name}</h1>
				<h2>{page.slogan}</h2>
			</div>
			<div id="signup" class="right">
				<ul>
					<?php if(isset($_SESSION["isLogged"]) AND $_SESSION["isLogged"]): ?>
					<li><a href="#">{session.username}</a></li>
					<li>
					<a href="#" onclick="if(confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) window.location.replace('<?= WEBROOT ?>actions/users/logout')">Déconnexion</a></li>
					<?php else: ?>
					<li><a href="<?= TLINK ?>login">Connexion</a></li>
					<li><a href="<?= TLINK ?>signup">Inscription</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</header>
	<!-- FIN du header -->

	<!-- DEBUT de la navigation -->
	<nav id="navigation">
		<div class="inner">
			<ul class='social'>
				<?php if($options["facebook"]): ?><li><a href="{options.facebook}"><img src="<?= ASSETS ?>images/facebook.png" alt="facebook" /></a></li><?php endif; ?>
				<?php if($options["twitter"]): ?><li><a href="https://twitter.com/<?= str_replace("@", "", $options["twitter"]) ?>"><img src="<?= ASSETS ?>images/twitter.png" alt="twitter" /></a></li><?php endif; ?>
				<?php if($options["youtube"]): ?><li><a href="http://www.youtube.com/user/{options.youtube}"><img src="<?= ASSETS ?>images/youtube.png" alt="youtube" /></a></li><?php endif; ?>
			</ul>
			<ul class='menu'>
				<li><a href="<?= TLINK ?>">Accueil</a></li>
				<?php foreach($pages as $k => $v): ?>
				<li><a href="#"><?= $v["title"] ?></a></li>
				<?php endforeach; ?>
				<?php if($options["shop_use"]): ?>
				<li><a href="<?= TLINK ?>shop">Boutique</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
	<!-- FIN de la navigation -->
	<?php endif; ?>

	<!-- DEBUT du container principal -->
	<section id="content">
		<div class="inner">
			{page.content}

			<div class="clear"></div>
		</div>
	</section>
	<!-- FIN du container principal -->


	<?php if(!isset($params[0]) OR ($params[0] != "login" AND $params[0] != "signup")): ?>
	<!-- DEBUT du footer -->
	<footer id="footer">
		<div class="inner">
			<section id="comments-container">
				<header>
					<h1 class="center">Derniers commentaires</h1>
				</header>
				<?php foreach($lastcomments as $k => $v): ?>
				<div class="comment">
					<div class="comment-content">
						<div class="left">
							<img src="https://minotar.net/helm/<?= $v["creator_id"]["username"] ?>/70.png" alt="avatar" />
						</div>
						<div class="right">
							<h2><?= $v["creator_id"]["username"] ?></h2>
							<p><?= TextUtils::extract($v["content"], 315) ?></p>
						</div>
					</div>
					<footer>
						<div class="left">
							<h2><a href="<?= TLINK ?>post/<?= $v["post_id"] ?>">>> Voir l'actualité concernée</a></h2>
						</div>
						<div class="right">
							<h2><?= TimeUtils::getTimeDiff($v["date_created"]) ?></h2>
						</div>
					</footer>
				</div>
				<?php endforeach; ?>
			</section>
			<section id="partners">
				<header>
					<h1 class='center'>Partenaires</h1>
				</header>
				<ul>
				</ul>
			</section>
			<div class="clear"></div>
		</div>
	</footer>
	<!-- FIN du footer -->
	<?php endif; ?>

	<?php if(isset($page["js"])): ?>{page.js}<?php endif; ?>
</body>
</html>