<?php 
require('abstract factory.php');

$client = new Client();
$house = $client->orderBuilding('PolandFactory','House');
var_dump($house);