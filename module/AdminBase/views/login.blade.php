<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登录 - 管理后台</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('/layui/css/layui.css') }}" media="all" />
	<link rel="stylesheet" href="{{ asset('/module/AdminBase/css/login.css') }}" media="all" />
</head>
<body>
	<video class="video-player" preload="auto" autoplay="autoplay" loop="loop" data-height="1080" data-width="1920" height="1080" width="1920">
	    <source src="{{ asset('/module/AdminBase/resources/login.mp4') }}" type="video/mp4">
	    <!-- 此视频文件为支付宝所有，在此仅供样式参考，如用到商业用途，请自行更换为其他视频或图片，否则造成的任何问题使用者本人承担，谢谢 -->
	</video>
	<div class="video_mask"></div>
	<div class="login">
	    <h1>登录管理后台</h1>
	    <form class="layui-form">
	    	<div class="layui-form-item">
				<input class="layui-input" name="username" placeholder="用户名" lay-verify="required" type="text" autocomplete="off">
		    </div>
		    <div class="layui-form-item">
				<input class="layui-input" name="password" placeholder="密码" lay-verify="required" type="password" autocomplete="off">
		    </div>
		    <div class="layui-form-item form_code">
				<input class="layui-input" name="code" placeholder="验证码" lay-verify="required" type="text" autocomplete="off">
				<div class="code"><img id="captcha" data-url="@captcha(116,36)" src="@captcha(116,36)" width="116" height="36"></div>
		    </div>
			<button class="layui-btn login_btn" lay-submit="" lay-filter="login">登录</button>
		</form>
	</div>
	<script type="text/javascript" src="{{ asset('/layui/layui.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/module/AdminBase/js/login.js') }}"></script>
</body>
</html>