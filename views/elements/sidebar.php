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
				<div class="widget">
					<header>
						<h1>Socialhub</h1>
					</header>
					<div class="widget-content">
							<!-- <a href="https://twitter.com/share" class="twitter-share-button" data-via="Webcrafted" data-lang="fr">Tweeter</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
							<hr>
							<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FWEBCraftedCMS&amp;width=320&amp;height=62&amp;show_faces=false&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:320px; height:62px;" allowTransparency="true"></iframe>
							 -->
					</div>
				</div>
			</section>
		</section>
		<!-- FIN de la sidebar -->