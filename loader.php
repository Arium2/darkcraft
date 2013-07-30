<?php
$_comments = loadBundle("fr.solicium.comments");
$_minecraft = loadBundle("fr.solicium.minecraft");
$_pages = loadBundle("fr.solicium.pages");
$_widgets = loadBundle("fr.solicium.widgets");
$pages = $_pages->getPages();
$serverdata = $_minecraft->getServer();
$lastcomments = $_comments->getLastComments();
$widgets = $_widgets->getWidgets();

if(!empty($serverdata)) {
	$serverdata = array(
		"ip" => Configure::read("server_ip"),
		"port" => $serverdata["port"],
		"players" => count($serverdata["players"]),
		"maxPlayers" => $serverdata["maxPlayers"],
	);
}

set(array(
	"page" => array(
		"name" => Configure::read("name"),
		"slogan" => Configure::read("slogan"),
		"description" => Configure::read("description"),
		"keywords" => Configure::read("keywords"),
	),
	"options" => array(
		"jsonapi_use" => Configure::read("jsonapi_use"),
		"shop_use" => Configure::read("shop_use"),
		"facebook" => Configure::read("facebook_page"),
		"youtube" => Configure::read("youtube_channel"),
		"twitter" => Configure::read("twitter_account"),
	),
	"lastcomments" => $lastcomments,
	"serverdata" => $serverdata,
	"pages" => $pages,
	"widgets" => $widgets,
));
