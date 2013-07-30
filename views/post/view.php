		<section id="wrap">
			<h1>{post.title}</h1>

			<?= getFlash() ?>

			<div id="post">
				<header>
					<img src="{post.image}" />
				</header>
				<div id="post-content">
					{post.content}
					<p id="author">de {post.creator_id.username}</p>
					<div class="clear"></div>
				</div>
			</div>
			<?php if(!$post["comments"]): ?>
			<div class="alert alert-error">
				<p>
					Les commentaires ne sont pas autorisés sur cette actualité
				</p>
			</div>
			<?php else: ?>
			<h1><?= count($comments) ?> commentaire{plural.comments}</h1>
			<section id="comments-container">
				<form method="post" action="<?= WEBROOT ?>actions/comments/add">
					<input id="token" name="token" type="hidden" value="{session.token}" />
					<input id="post_id" name="post_id" type="hidden" value="{post.id}" />
					<textarea id="message" name="message" placeholder="Qu'en pensez vous ?" rows="5"<?php if(!isset($_SESSION["isLogged"]) OR !$_SESSION["isLogged"]): ?> value="Vous devez être connecté poru pouvoir poster un commentaire" disabled<?php endif; ?>></textarea>
					<input class="btn btn-success" type="submit" value="Commenter" />
				</form>
				<?php foreach($comments as $k => $v): ?>
				<div class="comment">
					<div class="comment-content">
						<div class="left">
							<img src="https://minotar.net/helm/<?= $v["creator_id"]["username"] ?>/70.png" alt="avatar" />
						</div>
						<div class="right">
							<h2><?= $v["creator_id"]["username"] ?></h2>
							<p><?= $v["content"] ?></p>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<?php endforeach; ?>
			</section>
			<?php endif; ?>
		</section>

		<?= element("sidebar") ?>