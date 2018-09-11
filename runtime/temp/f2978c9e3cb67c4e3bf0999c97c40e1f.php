<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"G:\wamp64\www\HManagement\public/../application/index\view\teacher\add.html";i:1535335648;s:65:"G:\wamp64\www\HManagement\application\index\view\public\base.html";i:1533718727;s:65:"G:\wamp64\www\HManagement\application\index\view\public\meta.html";i:1532964505;s:67:"G:\wamp64\www\HManagement\application\index\view\public\footer.html";i:1532964423;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="Bookmark" href="favicon.ico">
    <link rel="Shortcut Icon" href="favicon.ico"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/lib/html5.js"></script>
    <script type="text/javascript" src="/static/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/skin/default/skin.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->


<title><?php echo (isset($title) && ($title !== '')?$title:"标题"); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'描述'); ?>">


</head>
<body>






<article class="cl pd-20">


    <form action="" method="post" class="form form-horizontal" id="form-teacher-edit">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
            <div class="formControls col-xs-8 col-sm-9">

                <input type="text" class="input-text" value="" placeholder="" id="name" name="name">
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">学历：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="degree" size="1">
					<option value="1" selected>专科</option>
					<option value="2">本科</option>
					<option value="3">研究生</option>
				</select>
				</span>
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>毕业学校：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="毕业学校" name="school" id="school" value="">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机号码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text " placeholder="手机号码" name="mobile" id="mobile" value="">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>入职时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="date" class="input-text " placeholder="入职时间" name="hiredate" id="hiredate" value="">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">负责班级：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="grade_id" size="1">
					<?php if(is_array($gradeList) || $gradeList instanceof \think\Collection || $gradeList instanceof \think\Paginator): $i = 0; $__LIST__ = $gradeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['id']; ?>" selected><?php echo $vo['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					<option value="0" selected>不分配</option>

				</select>
				</span>
            </div>
        </div>


        <!--添加数据的时间,就是入职时间-->


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">启用状态：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="status" size="1">
					<option value="1">启用</option>
					<option value="0" selected>不启用</option>
				  </select>
				</span>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius disabled" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;"
                       id="submit">
            </div>
        </div>
    </form>


</article>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--/_footer /作为公共模版分离出去-->


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/messages_zh.js"></script>


<script>

    $(function () {
        //当用户修改了输入框内容时才触发
        $("form").children().change(function () {
            $("#submit").removeClass('disabled');
        });


        //ajax方式提交当前表单数据
        $("#submit").on("click", function (event) {
            $.ajax({
                type: "POST",
                url: "<?php echo url('teacher/doAdd'); ?>",
                data: $("#form-teacher-edit").serialize(),
                dataType: "json",
                success: function (data) {
                    if (data.status == 1) {
                        // alert(data.message);
                        layer.msg(data.message, {icon: 6, time: 1000});
                    } else {
                        // alert(data.message);
                        layer.msg(data.message, {icon: 1, time: 1000});
                    }
                }
            });

        })


    })
</script>


</body>
</html>