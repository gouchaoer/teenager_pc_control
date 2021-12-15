<?php
$sn = $_GET['sn'];
$sn = strval($sn);
$day_str = $_GET['day_str'];
$day_str = strval($day_str);
//$hour = $_POST['hour'];
if(isset($_POST['hour'])){
$hour = $_POST['hour'];
$hour = strval($hour);
file_put_contents(__DIR__."/{$sn}/{$day_str}", $hour);
echo file_get_contents(__DIR__."/{$sn}/{$day_str}", $hour);

}
