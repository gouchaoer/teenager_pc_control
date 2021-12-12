<?php
date_default_timezone_set("Asia/Shanghai");

$sn = $_GET['sn'];
$sn = strval($sn);
if(!preg_match("#\w{32}#", $sn))
	die("sn error");
if(!file_exists(__DIR__."/{$sn}")){
	mkdir($sn);
}
if(!file_exists(__DIR__."/{$sn}")){
	die("mkdir error");
}


$now  = time();
$day_str = date("Y-m-d",$now);
$jz_path = __DIR__."/{$sn}/{$day_str}";
$jz_str = @file_get_contents($jz_path);
$hour =  date("H", $now);

$hz_path = __DIR__ ."/{$sn}/{$day_str}.json";
$hz_str = @file_get_contents($hz_path);
$hz = @json_decode($hz_str, true);

$ct=0;
for($j=0;$j<60;$j++){
	if(isset($hz[$j])){
		$ct_tmp = $hz[$j]/60.0;
		if($ct_tmp>0.8)
			$ct_tmp=1.0 ;
		$ct +=$ct_tmp;
	}
}

if(empty($hz[$hour]))$hz[$hour]=0;
$hz[$hour]++;
$hz_str = json_encode($hz, JSON_PRETTY_PRINT);
@file_put_contents($hz_path, $hz_str);

var_dump($hz);
var_dump($ct);
var_dump($jz_str);

if($ct > $jz_str){
	return "ok";
}else{
	return "no";
}