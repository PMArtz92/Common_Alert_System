<?php
require_once '../core/init.php';

//Url of irrigation department reservoir details
$url = "http://www.irrigation.gov.lk/index.php?option=com_rainfalldata&Itemid=270&lang=en";

$html = file_get_contents($url);

//Regular expression to capture the reservoir details off the url

$reg = '/class="tip">(.*?)<.*\s.*\s.*\s.*\s.*\s.*\s.*\s.*\s.*\s.*\s.*\s.*\s.*\s(.*)/';

//Getting data off website
preg_match_all($reg, $html, $posts, PREG_SET_ORDER);


$db = DB::getInstance();

foreach ($posts as $post) {

    $station = trim($post[1]);
    $rain_fall = trim($post[2]);

    //Saving to database
    $db->query("UPDATE rainfall SET rain_fall = '$rain_fall' WHERE station = '$station'");

}
