<?php

if (isset($_GET["set"])) {
	setcookie("host", $_GET["set"], time()+3600*24);
	header("location:/");
}

if (! isset($_COOKIE["host"])) {
	exit("No host!");
}

define("PROXY_TARGET", "http://".$_COOKIE["host"].".cloudstorage.mystorage");
define("PROXY_HOST", null);
define("PROXY_PORT", null);
define("PROXY_PATH", null);
define("PROXY_TIMEOUT", null);
