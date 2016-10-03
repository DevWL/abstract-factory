<?php 
require('abstract factory.php');

$client = new Client();
$client->_setBudget(250000);
$client->_setSize(130);
$house = $client->orderBuilding('PolandFactory','House');
$house->build();
var_dump($house);

$client->_setBudget(30000);
$client->_setSize(40);
$basment = $client->orderBuilding('UKFactory','Basement');
$basment->build();
var_dump($basment);