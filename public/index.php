<?php
require_once  __DIR__.'/../vendor/autoload.php';

//http://localhost/simple-framework/public/index.php?r=site/test

$router = $_GET['r'];
list($controllerName,$actionName) = explode('/',$router);
$ucController = ucfirst($controllerName);
$controllerName = 'app\\controllers\\'.$ucController.'Controller';
$controller = new $controllerName;
return call_user_func([$controller,'action'.ucfirst($actionName)]); //类名回调