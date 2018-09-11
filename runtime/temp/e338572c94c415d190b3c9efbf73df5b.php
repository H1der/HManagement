<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:74:"G:\wamp64\www\HManagement\public/../application/index\view\grade\show.html";i:1536633265;s:65:"G:\wamp64\www\HManagement\application\index\view\public\base.html";i:1533718727;s:65:"G:\wamp64\www\HManagement\application\index\view\public\meta.html";i:1532964505;s:67:"G:\wamp64\www\HManagement\application\index\view\public\header.html";i:1534233035;s:65:"G:\wamp64\www\HManagement\application\index\view\public\menu.html";i:1536585313;s:67:"G:\wamp64\www\HManagement\application\index\view\public\footer.html";i:1532964423;}*/ ?>
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
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">


</head>
<body>


<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"><a class="logo navbar-logo f-l mr-10 hidden-xs"
                                           href="<?php echo url('./index'); ?>">教学管理系统</a>
            <!--<a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>-->
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li><?php echo \think\Session::get('user_info.name'); ?></li>
                    <li class="dropDown dropDown_hover"><a href="#" class="dropDown_A"><?php echo session('user.name'); ?> <i
                            class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <!--<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>-->
                            <!--<li><a href="#">切换账户</a></li>-->
                            <li><a href="<?php echo url('user/logout'); ?>">退出</a></li>
                        </ul>
                    </li>
                    <!--<li id="Hui-msg"><a href="#" title="消息"><span class="badge badge-danger">1</span><i-->
                    <!--class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a></li>-->

                </ul>
            </nav>
        </div>
    </div>
</header>
<!--/_header 作为公共模版分离出去-->



<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">

    <div class="menu_dropdown bk_2">
        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe625;</i> 首页<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo url('index/index'); ?>" title="首页">我的桌面</a></li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-student">
            <dt><i class="Hui-iconfont">&#xe611;</i>学生管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo url('student/index'); ?>" title="教师列表">学生列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-teacher">
            <dt><i class="Hui-iconfont">&#xe62c;</i>教师管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo url('teacher/index'); ?>" title="教师列表">教师列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-member">
            <dt><i class="Hui-iconfont">&#xe62b;</i>班级管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo url('grade/index'); ?>" title="会员列表">班级列表</a></li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i>管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo url('user/index'); ?>" title="管理员列表">管理员列表</a></li>
                </ul>
            </dd>
        </dl>

    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<!--/_menu 作为公共模版分离出去-->




<section class="Hui-article-box">
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i>
        首页 <span class="c-gray en">&gt;</span>
        班级管理 <span class="c-gray en">&gt;</span>
        班级列表<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
               href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <div class="Hui-article">
        <article class="cl pd-20">

            <div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
					<!--<a href="javascript:;" onclick="unDelete()" class="btn btn-danger radius">-->
                    <!--<i class="Hui-iconfont">&#xe6e2;</i>-->
                    <!--批量删除-->
                    <!--</a>-->

                    <input type="text" name="keyword" id="keyword" class="input-text radius" style="width: 200px">
                    <a href="javascript:;"onclick="member_find($('#keyword').val())" class="btn btn-success radius">
						<i class="Hui-iconfont">&#xe683;</i>
						查找
					</a>
					<a href="javascript:;" onclick="member_add('添加班级','<?php echo url("grade/add"); ?>','','510')" class="btn btn-primary radius">
						<i class="Hui-iconfont">&#xe600;</i>
						添加班级
                    </a>
				</span>
            </div>
            <div class="mt-20">
                <table class="table table-border table-bordered table-hover table-bg table-sort">
                    <thead>
                    <tr class="text-c">
                        <th width="50">ID</th>
                        <th width="100">班级名称</th>
                        <th width="40">学制</th>
                        <th width="90">学费</th>
                        <th width="150">开班时间</th>
                        <th width="100">班主任</th>
                        <th width="70">状态</th>
                        <th width="100">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-c">
                        <td><?php echo $grade_info['id']; ?></td>
                        <td><?php echo $grade_info['name']; ?></td>
                        <td><?php echo $grade_info['length']; ?></td>
                        <td><?php echo $grade_info['price']; ?></td>
                        <td><?php echo $grade_info['create_time']; ?></td>
                        <td><?php echo $grade_info['teacher']['name']; ?></td>
                        <td class="td-status">
                            <!--根据当前班级表中status值来确定显示内容-->
                            <?php if($grade_info['status'] == 1): ?>
                            <span class="label label-success radius">已启用</span>
                            <?php else: ?>
                            <span class="label radius">已停用</span>
                            <?php endif; ?>

                        </td>
                        <td class="td-manage">
                            <?php if($grade_info['status'] == 1): ?>
                            <a style="text-decoration:none" onClick="member_stop(this,'<?php echo $grade_info['id']; ?>')" href="javascript:;"
                               title="停用">
                                <i class="Hui-iconfont">&#xe631;</i>
                            </a>
                            <?php else: ?>
                            <a style="text-decoration:none" onClick="member_start(this,'<?php echo $grade_info['id']; ?>')" href="javascript:;"
                               title="停用">
                                <i class="Hui-iconfont">&#xe615;</i>
                            </a>
                            <?php endif; ?>
                            <a title="编辑" href="javascript:;" onclick="member_edit('班级编辑','<?php echo url("grade/edit",["id"=>$grade_info["id"]]); ?>','','510')"
                            class="ml-5" style="text-decoration:none">
                            <i class="Hui-iconfont">&#xe6df;</i>
                            </a>
                            <a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo $grade_info['id']; ?>')" class="ml-5"
                               style="text-decoration:none">
                                <i class="Hui-iconfont">&#xe6e2;</i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </div>
</section>



<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--/_footer /作为公共模版分离出去-->



<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $(function () {

        $('.table-sort tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    });

    /*用户-添加*/
    function member_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }

    /*用户-查看*/
    function member_show(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }

    /*用户-停用*/
    function member_stop(obj, id) {
        layer.confirm('确认要停用吗？', function (index) {
            //此处请求后台程序，下方是成功后的前台处理……
            $.get("<?php echo url('grade/setStatus'); ?>", {id: id});

            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
            $(obj).remove();
            layer.msg('已停用!', {icon: 5, time: 1000});
        });
    }

    /*用户-查找*/
    function member_find(id) {
        // $.get(url);
        $.get("<?php echo url('grade/show'); ?>",{id:id});
        window.location.href = "show?id="+id;

        // $.ajax({
        //     type: "POST",
        //     url: "<?php echo url('grade/show'); ?>",
        //     async: false,
        //     data: {id: id},
        //     success: function (msg) {
        //         if (msg) {
        //             window.location.href = "<?php echo url('grade/show'); ?>";
        //         }
        //     }
        // });


    }

    // function member_find() {
    //         $.ajax({
    //             type:"post",
    //             url:"<?php echo url('grade/doshow'); ?>",
    //             data:{key:$("#keyword").val()}
    //             }
    //         )
    //     // location.href = "<?php echo url('grade/index'); ?>"
    //     // location.reload();
    // }
    /*用户-启用*/
    function member_start(obj, id) {
        layer.confirm('确认要启用吗？', function (index) {
            //此处请求后台程序，下方是成功后的前台处理……
            $.get("<?php echo url('grade/setStatus'); ?>", {id: id});

            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
            $(obj).remove();
            layer.msg('已启用!', {icon: 6, time: 1000});
        });
    }

    /*用户-编辑*/
    function member_edit(title, url, w, h) {
        $.get(url); //执行控制器中的编辑操作
        layer_show(title, url, w, h);
    }

    /*用户-删除*/
    function member_del(obj, id) {
        //请求服务器脚本处理删除
        $.get("<?php echo url('grade/delete'); ?>", {id: id});
        layer.confirm('确认要删除吗？', function (index) {
            $(obj).parents("tr").remove();
            layer.msg('已删除!', {icon: 1, time: 1000});
        });
    }

</script>
<!--/请在上方写此页面业务相关的脚本-->


</body>
</html>