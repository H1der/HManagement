<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\wamp64\www\HManagement\public/../application/index\view\user\login.html";i:1535336552;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/lib/html5.js"></script>
    <script type="text/javascript" src="/static/lib/respond.min.js"></script>
    <![endif]-->
    <link href="/static/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css"/>
    <link href="/static/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script><![endif]-->
    <title>后台登录 - 教学管理系统</title>
    <meta name="keywords" content="教学管理系统">
    <meta name="description" content="教学管理系统">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value=""/>
<div class="header"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <form class="form form-horizontal" action="" method="post">
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input name="name" type="text" placeholder="用户名" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input name="password" type="password" placeholder="密码" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="verify" class="input-text size-L" type="text" placeholder="验证码" style="width:150px;">
                    <img id="verity_img" src="<?php echo captcha_src(); ?>"/>
                    <a id="kanbuq" href="javascript:refreshVerify();">换一张</a>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <label for="online">
                        <input type="checkbox" name="online" id="online" value="">
                        保持登录状态</label>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" id="login" class="btn btn-success radius size-L"
                           value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">Copyright 教学管理系统 by Hider Wang</div>

<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script>
<!--<script>-->
<!--$(function () {-->
<!--$("#login").on('click', function (event) {-->
<!--$.ajax({-->
<!--type: "POST",-->
<!--url: "<?php echo url('checkLogin'); ?>",-->
<!--data: $("form").serialize(),-->
<!--dataType: 'json',-->
<!--success: function () {-->

<!--}-->
<!--})-->
<!--})-->

<!--})-->
<!--</script>-->
<script>
    function refreshVerify() {
        var ts = Date.parse(new Date()) / 1000;
        $("#verity_img").attr("src", "/captcha?id" + ts)
    }
</script>
</body>
</html>