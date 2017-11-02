<?php
session_start();
$loader = require __DIR__ . '/vendor/autoload.php';

$app = new App();
$app->main();




