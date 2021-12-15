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

function render_2_week(){
	global $sn;
	$now  = time();
	$res = "";
	for($i=-7;$i<=7;$i++){
		$day_ts = $now + $i * 24 * 3600;
		$day_str = date("Y-m-d",$day_ts);
		$line = "";
		$week_str = date("w", $day_ts);
		$jz_path = __DIR__."/{$sn}/{$day_str}";
		$jz_str = @file_get_contents($jz_path);
		if(empty($jz_str)){
			if($week_str === "0")
				$hour=8;
			else if($week_str ==='6')
				$hour=4;
			else
				$hour=1;
			file_put_contents($jz_path, "{$hour}");
		}
		$hour =  floatval($jz_str);
		$hz_path = __DIR__ ."/{$sn}/{$day_str}.json";
		$hz_str = @file_get_contents($hz_path);
		$hz = @json_decode($hz_str, true);
$ct=0;
		for($j=0;$j<24;$j++){
//			$ct = 0;
$jj=sprintf("%02d", $j);
			if(isset($hz[$jj])){
				$ct_tmp = $hz[$jj]/60.0;
				//if($ct_tmp>0.8)
				//	$ct_tmp=1.0 ;
                $ct_tmp = sprintf("%.2f", $ct_tmp);
                $ct+=$ct_tmp;
				$line .="[{$j}-{$ct_tmp}]";
			}else{
				$line .="[{$j}-]";
			}
		}
		$line .="【{$day_str}星期{$week_str}：{$ct}/{$hour}】";
		$line .="<br />";
		$res .= $line;
	}
	return $res;
}

//date("Y-m-d",time());
$html = render_2_week();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #f07746; color: #fff; }
	::-moz-selection { background-color: #f07746; color: #fff; }

	body {
		background-color: #fff;
		margin: 40px auto;
		max-width: 1920px;
		font: 16px/24px normal "Helvetica Neue",Helvetica,Arial,sans-serif;
		color: #808080;
	}

	a {
		color: #dd4814;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #fff;
		background-color: #dd4814;
		border-bottom: 1px solid #d0d0d0;
		font-size: 22px;
		font-weight: bold;
		margin: 0 0 14px 0;
		padding: 5px 10px;
		line-height: 40px;
	}

	h1 img {
		display: block;
	}

	h2 {
		color:#404040;
		margin:0;
		padding:0 0 10px 0;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 13px;
		background-color: #f5f5f5;
		border: 1px solid #e3e3e3;
		border-radius: 4px;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 12px;
		border-top: 1px solid #d0d0d0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
		background:#8ba8af;
		color:#fff;
	}

	#container {
		margin: 10px;
		border: 1px solid #d0d0d0;
		box-shadow: 0 0 8px #d0d0d0;
		border-radius: 4px;
	}
	</style>
</head>
<body>
	<div id="container">
		<h1>
			未成年电脑监控系统
		</h1>
		<div id="body">
			<?php
			echo $html;
			?>
		<p class="footer">Page rendered in <strong>0.0158</strong> seconds. CodeIgniter Version <strong>3.2.0-dev</strong></p>
	</div>
</body>
</html>
