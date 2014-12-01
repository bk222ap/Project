<?php

require_once"controller/mainController.php";

session_start();
$app = new \controller\mainController();

echo $app->startApp();

