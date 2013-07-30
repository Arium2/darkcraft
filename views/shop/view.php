		<section id="shop">
			<h1>Boutique</h1>
			<?php if(!isset($_SESSION["isLogged"]) OR !$_SESSION["isLogged"]): ?>
			<div class="alert alert-error">
				<p>
					Vous devez être connecté pour pouvoir accèder à la boutique
				</p>
			</div>
			<?php else: echo getFlash(); ?>
			<div id="wallet">
				<div class="inner">
					<div id="player_info">
						<img src="https://minotar.net/helm/{session.username}/79.png" alt="avatar" />
						<h2>{session.username}</h2>
						<div id="emerald_big">
							<h3>{session.money}</h3>
							<h4>émeraude<?php echo $_SESSION["money"] > 1 ? "s" : "" ?></h4>
							<a href="<?= TLINK ?>emeralds">acheter des émeraudes</a>
						</div>
					</div>
					<div id="wallet_summary">
						<h3>Panier</h3>
						<?php if(!isset($_SESSION["basket"]) OR empty($_SESSION["basket"])): ?>
						<ul>
							<li><p>Votre panier est vide</p></li>
						</ul>
						<?php else: ?>
						<ul>
							<?php foreach($_SESSION["basket"] as $k => $v): ?>
							<li><h5><?= $v["price"] ?></h5><img src="<?= TWEB ?>assets/images/emerald.png" /><p><?= $v["name"] ?></p></li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</div>
					<div id="wallet_total">
						<h3>Total</h3>
						<img src="<?= TWEB ?>assets/images/emerald_total.png" />
						<h4>{totalprice} émeraude{plural.totalprice}</h4>
					</div>
					<div class="clear"></div>
				</div>
				<a id="wallet_pay"<?php if(isset($_SESSION["basket"]) AND !empty($_SESSION["basket"])): ?> class="active" onclick="if(confirm('Êtes-vous sûr de vouloir recevoir votre panier en échange de {totalprice} émeraude{plural.totalprice} ?')) window.location.replace('<?= WEBROOT ?>actions/basket/checkout/?token={session.token}')"<?php endif; ?>></a>
			</div>
			<div class="clear"></div>
			<div id="blocks-container">
				<h2>Articles en vente</h2>
				<?php foreach($items as $k => $v): ?>
				<div class="block">
					<header>
						<img src="<?= $v["image_url"] ?>" />
					</header>
					<div class="block-content">
						<h4><?= $v["name"] ?></h4>
						<ul>
							<li><?= $v["price"] ?><img src="<?= TWEB ?>assets/images/emerald.png" /></li>
							<li><img src="<?= TWEB ?>assets/images/clock.png" /> <?php if($v["duration"] == 2592000): ?>1 mois<?php elseif($v["duration"] == 86400): ?>1 jour<?php elseif($v["duration"] == 0): ?>Utilisation unique<?php else: ?><?= $v["duration"] ?> secondes<?php endif; ?></li>
						</ul>
					</div>
					<footer>
						<a href="<?= WEBROOT ?>actions/basket/add/<?= $v["id"] ?>/?token={session.token}"></a>
					</footer>
				</div>
				<?php endforeach; ?>
			</div>
			<nav id="sortby">
				<h2>Catégories</h2>
				<ul>
					<?php foreach($categories as $k => $v): ?>
					<li><a href="<?= TLINK ?>shop/?category=<?= $v["category"] ?>"><?= $v["category"] ?></a></li>
					<?php endforeach; ?>
				</ul>
				<h2>Trier par</h2>
				<ul>
					<li><a href="<?= TLINK ?>shop/?sortby=name">Nom</a></li>
					<li><a href="<?= TLINK ?>shop/?sortby=price">Prix le moins cher</a></li>
					<li><a href="<?= TLINK ?>shop/?sortby=maxprice">Prix le plus cher</a></li>
					<li><a href="<?= TLINK ?>shop/?sortby=duration">Durée d'utilisation</a></li>
				</ul>
			</div>
			<?php endif; ?>
		</section>