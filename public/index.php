<?php
require_once  __DIR__.'/../vendor/autoload.php';

//http://localhost/simple-framework/public/index.php?r=site/test

$application = new sf\web\Application();
$application->run();