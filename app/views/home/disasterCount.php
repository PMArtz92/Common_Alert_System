<?php
include'connect.php';


$e1 = mysql_query("SELECT COUNT(*) AS NumberOfEarthQuakes FROM notification WHERE Types='Earth Quakes'");
$earthq = (int)mysql_result($e1, 000);
$e2 = mysql_query("SELECT COUNT(*) AS NumberOfEarthQuakes FROM notification WHERE Types='Cyclones'");
$cyclone = (int)mysql_result($e2, 000);
$e3 = mysql_query("SELECT COUNT(*) AS NumberOfEarthQuakes FROM notification WHERE Types='Floods'");
$flood = (int)mysql_result($e3, 000);
$e4 = mysql_query("SELECT COUNT(*) AS NumberOfEarthQuakes FROM notification WHERE Types='Landslides'");
$landslides = (int)mysql_result($e4, 000);
$e5 = mysql_query("SELECT COUNT(*) AS NumberOfEarthQuakes FROM notification WHERE Types='Fires'");
$fire = (int)mysql_result($e5, 000);
$e6 = mysql_query("SELECT COUNT(*) AS NumberOfEarthQuakes FROM notification WHERE Types='Tsunami'");
$tsunami = (int)mysql_result($e6, 000);
$e7 = mysql_query("SELECT COUNT(*) AS NumberOfEarthQuakes FROM notification WHERE Types='Volcanos'");
$volcano = (int)mysql_result($e7, 000);

$totalDisasters = $earthq + $cyclone + $flood + $landslides + $fire + $tsunami + $volcano;