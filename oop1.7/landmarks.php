<?php
require_once __DIR__.'/lib/autoload.php';

$container = new Container($configuration);
$landmarkLoader = $container->getLandmarkLoader();
$landmarks=$landmarkLoader->getLandmark();

var_dump($landmarks);