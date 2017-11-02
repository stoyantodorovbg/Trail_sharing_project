<?php
session_start();
$_SESSION['role_id'] = 0;
$loader = require __DIR__ . '/vendor/autoload.php';

$app = new App();
$app->main();




