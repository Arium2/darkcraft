<?php
if(!$options["shop_use"]) {
	$_page->load(TROOT . "views/404/view.php");
	return;
}
$idd = Configure::read("shop_starpass_idd");
$idp = Configure::read("shop_starpass_idp");
$_starpass = loadBundle("fr.solicium.starpass", $idd, $idp);

set(array(
	"page" => array(
		"title" => "Acheter des émeraudes",
	),
	"starpass" => array(
		"idd" => $idd,
		"idp" => $idp,
		"js" => $_starpass->getDocumentScript(),
	),
));
