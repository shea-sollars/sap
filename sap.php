<?php
header('Content-Type: text/javascript');

$callback = empty($_GET['cb']) ? 'callback' : $_GET['cb'];

if (empty($_GET['domain'])) {
	die($callback.'({"status":"error","status_desc":"Missing the domain name","domain":null,"available":null});');
};

$key = '{KEY_PROVIDED_BY_freedomainapi.com}';
$url = 'http://freedomainapi.com/?' . http_build_query(['key' => $key, 'domain' => $_GET['domain']]);
$result = file_get_contents($url);

die($callback.'('.$result.');');
