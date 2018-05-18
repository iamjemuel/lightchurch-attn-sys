<?php

$leader = array('No lifegroup leader', 'Ronald Acuna', 'Alvin Madronio', 'Albert Madronio', 'Glenn Corpuz', 'Mark Christian De Omania', 'Arjuna Aguilar', 'Mel Aguilar', 'Carla Baldomero', 'Mechole Williams', 'Dorothy Magbuhos', 'Jenny Madronio', 'Stephanie Cadiong', 'Robert/Mike', 'Clariza Fortuna', 'Elena Encio', 'Jessica Calanog', 'Restie Cadiong');
$type = array('Member', 'Visitor');
$slots = array('All', '7AM', '9AM', '11AM', '2PM', '4PM', '6PM', '8PM', '10PM');
date_default_timezone_set('Asia/Manila');
// $url = 'http://lightchurch.com.ph/attn/';
$url = 'http://localhost/attn/';

$uri = $_SERVER['REQUEST_URI'];

$id = explode('/', $uri);

?>
