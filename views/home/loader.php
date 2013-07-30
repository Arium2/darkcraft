<?php
$_posts = loadBundle("fr.solicium.posts");
$posts = $_posts->getArticles(1);

set(array(
	"page" => array(
		"title" => "Accueil",
	),
	"posts" => $posts,
));
