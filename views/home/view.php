		<?= getFlash() ?>

		<?php if(!empty($posts)): ?>
		<section id="slider">
			<div class="slider-bjqs">
				<ul class='bjqs'>
					<?php foreach($posts as $k => $v): ?>
					<li>
						<img src="<?= THUMBS ?><?= $v["image"]["name"] ?>_1024x400.<?= $v["image"]["ext"] ?>"/>
						<div class='bjqs-caption'>
							<h1><?= $v["title"] ?></h1>
							<p class='bjqs-caption'><?= TextUtils::extract($v["extract"], 270) ?></p>
							<a href="<?= TLINK ?>post/<?= $v["id"] ?>">Lire la <span>suite</span></a>
						</div>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
		<?php endif; ?>

		<section id="posts-container">
			<h1>Dernières actualités</h1>
			<?php foreach($posts as $k => $v): ?>
			<div class="post">
				<img src="<?= $v["image"] ?>" />
				<div class="post-content"> 
					<header>
						<h1><a href="<?= TLINK ?>post/<?= $v["id"] ?>"><?= $v["title"] ?></a></h1>
					</header>
					<div class='post-text'>
						<a class="more" href="<?= TLINK ?>post/<?= $v["id"] ?>"><span class="gray">[+]</span> Lire la suite</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</section>

		<?= element("sidebar") ?>
<?php $this->script() ?>
<script src="<?= TWEB ?>assets/js/jquery-2.0.3.min.js"></script>
<script src="<?= TWEB ?>assets/js/bjqs.js"></script>
<script>
/*
$(function() {
	$("#slider").nivoSlider({
		effect: "random",
		pauseOnHover: true,
		controlNav: false,
		directionNav: false,
	});
});*/
$(document).ready(function() {
    $('#slider-bjqs').bjqs({
        'height' : 400,
        'width' : 1024,
        'responsive' : true,
        'animtype' : 'fade',
        'animspeed' : 4000,
        'automatic' : true,
        'showcontrol' : true,
        'centercontrols' : true,
		'nexttext' : 'Précédent',
		'prevtext' : 'Suivent'
    });
});
</script>
<?php $this->endscript() ?>