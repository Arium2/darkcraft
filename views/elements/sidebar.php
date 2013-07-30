		<!-- DEBUT de la sidebar -->
		<section id="sidebar">
			<section id="widgets-container">
				<div class="widget">
					<header>
						<h1>Etat du serveur</h1>
					</header>
					<div class="widget-content">
						<?php if(empty($serverdata)): ?>
						<h2><span class="red">Hors ligne</span></h2>
						<?php else: ?>
						<h2><span class="green">En ligne</span></h2>
						<h3>{serverdata.players}/{serverdata.maxPlayers} joueurs</h3>
						<h3><span class="gray">IP : {serverdata.ip}:{serverdata.port}</span></h3>
						<?php endif; ?>
					</div>
				</div>
				<?php foreach($widgets as $k => $v): ?>
				<div class="widget">
					<header>
						<h1><?= $v["title"] ?></h1>
					</header>
					<div class="widget-content">
						<?= $v["content"] ?>
					</div>
				</div>
				<?php endforeach; ?>
			</section>
		</section>
		<!-- FIN de la sidebar -->