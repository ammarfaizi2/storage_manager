<?php

define("APP_KEY", "$2y$10$2NVEFVUP50v2Eq5n8DvGGOqnG3nXUJI2weVVpM.rrA7OvMtvMu1nG");

set_time_limit(0);
ignore_user_abort(true);

require __DIR__."/isolated/helpers.php";
$users = require __DIR__."/isolated/users.php";


if (isset($_COOKIE["session"]) || isset($_GET["session"]) || isset($_POST["session"])) {

	if (isset($_COOKIE["session"])) {
		$sess = decrypt($_COOKIE["session"], APP_KEY);
	}
	if (isset($_GET["session"])) {
		$sess = decrypt($_GET["session"], APP_KEY);
	}
	if (isset($_POST["session"])) {
		$sess = decrypt($_GET["session"], APP_KEY);
	}
	
	$sess = json_decode($sess, true);
	if (! isset($sess["user"])) {
		require __DIR__."/isolated/login.php";
		exit;	
	}

} else {
	require __DIR__."/isolated/login.php";
	exit;
}


define("PROXY_TARGET", "http://".$sess["user"].".cloudstorage.mystorage");
define("PROXY_HOST", null);
define("PROXY_PORT", null);
define("PROXY_PATH", null);
define("PROXY_TIMEOUT", null);
