<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

$dev_cookie = isset($_COOKIE['enable_dev']) && $_COOKIE['enable_dev'] == 1;
defined("DRSL_DEV_MODE") OR define("DRSL_DEV_MODE", $dev_cookie == 1 ? true : false);


/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__ . '/../app/autoload.php';
include_once __DIR__ . '/../var/bootstrap.php.cache';

$kernel = null;
if (DRSL_DEV_MODE == false) {
    $kernel = new AppKernel('prod', false);
    $kernel->loadClassCache();
} else {
    $kernel = new AppKernel('dev', true);
    Debug::enable();
}

if (!defined("DRSL_WEB_RUN")) {
    $kernel = new AppCache($kernel);
    // When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
    //Request::enableHttpMethodParameterOverride();
    $request = Request::createFromGlobals();
    $response = $kernel->handle($request);

    $response->headers->set('Access-Control-Allow-Origin', '*');

    $response->send();
    $kernel->terminate($request, $response);
} else {
    return $kernel;
}
