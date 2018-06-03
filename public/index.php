<?php

use PHPProxy\PHPProxy;

require __DIR__."/../autoload.php";
require __DIR__."/../config.php";

$app = new PHPProxy(
	PROXY_TARGET,
	PROXY_HOST,
	PROXY_PORT,
	PROXY_PATH
);


$app->afterCaptureRequest(function (&$requestHeaders, &$responseBody) {
});

$app->beforeSendResponse(function (&$responseHeaders, &$responseBody, $first = true) {
	foreach ($responseHeaders as $key => &$value) {
		if (preg_match("/connection/i", $value)) {
			$value[$key] = "Connection: close";
		}
	}
});

$app->run();
