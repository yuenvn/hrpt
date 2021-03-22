<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"E:\code\hrsystem\public/../application/admin\view\index\index.html";i:1546967176;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title><?php echo $configs['title']; ?>-后台首页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden" onload="startTime()">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">

                    <li class="nav-header" style="height: 101px;">
                        <div class="dropdown profile-element" style="text-align: center;color: #ffffff;font-weight: bold; font-family: '微软雅黑', Arial, Helvetica, sans-serif;font-size: 18px; letter-spacing: 2px;">
                            <?php echo $configs['title']; ?>
                        </div>
                        <div class="logo-element">CX</div>
                    </li>

                    <?php if(is_array($menuRes) || $menuRes instanceof \think\Collection || $menuRes instanceof \think\Paginator): if( count($menuRes)==0 ) : echo "" ;else: foreach($menuRes as $key=>$menu): ?>
                    <li>
                        <a href="#">
                            <i style="width: 20px; height: 30px; font-size: 14px; " class="<?php echo $menu['icon']; ?>"></i>
                            <span style=" font-size:14px;" class="nav-label "><?php echo $menu['title']; ?></span>
                            <span class="fa arrow"></span>
                        </a>

                        <ul class="nav nav-second-level">
                            <?php if(is_array($menu['children']) || $menu['children'] instanceof \think\Collection || $menu['children'] instanceof \think\Paginator): if( count($menu['children'])==0 ) : echo "" ;else: foreach($menu['children'] as $key=>$menu_1): ?>
                            <li>
                                <a class="J_menuItem" href="<?php echo url($menu_1['name']); ?>" data-index="0"><?php echo $menu_1['title']; ?></a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                        </ul>

                    </li>
                    <div style="border-bottom: 1px dashed rgba(47, 66, 82, 0.65);"></div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="#">
                            <div class="form-group">
                                <!--
                                <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                                -->
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">

                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="glyphicon glyphicon-user"></i><?php echo \think\Session::get('uname'); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts" style="width: 150px;">
                                <li>
                                    <a href="#">
                                        <div><?php echo $userGroup['title']; ?></div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="J_menuItem" href="<?php echo url('Admin/edit',array('id'=>\think\Session::get('id'))); ?>">
                                        <div>修改资料</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo url('Admin/logout'); ?>">
                                        <div>注销登录</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <!--
                            <a href="index_v1.html" class="J_menuItem" data-index="0"><i class="fa fa-cart-arrow-down"></i> 购买</a>
                            -->
                        </li>
                        <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-tasks"></i> 主题
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs">
                    <!--
                    这里是显示nav标签的，开启后无法刷新
                    <div class="page-tabs-content">
                    -->

                    <div>
                        <a href="<?php echo url('Index/index'); ?>" class="active J_menuTab" data-index="0" >首页</a>
                        <a title="修改配置后请务必清理缓存" style="margin-left: 10px;color: #f85e7c" href="<?php echo url('index/clearCache'); ?>" class="J_menuTab" data-index="1" >清空缓存</a>
                    </div>
                </nav>
                <!--
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                </button>
                <div class="btn-group roll-nav roll-right">
                    <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div>-->
                <a href="<?php echo url('Admin/logout'); ?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>

            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo url('welcome'); ?>" frameborder="0" data-id="<?php echo url('welcome'); ?>" seamless></iframe>
            </div>

            <div class="footer" style="font-weight: bold; color: #02876f;">
                <div class="pull-right"  style="margin-left: 35px;"><?php echo $configs['copyright']; ?><a style="color: #02876f; margin-left: 15px;" href="<?php echo $configs['root_url']; ?>" target="_blank"><?php echo $configs['title']; ?></a>
                </div>

                <div  id="txt" class="pull-right dropdown hidden-xs"></div>
                <div class="pull-right dropdown hidden-xs"><span style="margin-left: 30px"><?php echo $nowDayInfo; ?> </span></div>

            </div>
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        <div id="right-sidebar">
            <div class="sidebar-container">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active" >

                        <div class="skin-setttings" >

                            <div class="setings-item" >
                                <span>收起左侧菜单</span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                        <label class="onoffswitch-label" for="collapsemenu">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>固定顶部</span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                        <label class="onoffswitch-label" for="fixednavbar">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                        <label class="onoffswitch-label" for="boxedlayout">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                            </div>
                            <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                            </div>
                            <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色主题
                        </a>
                    </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--右侧边栏结束-->

    </div>

    <!-- 全局js -->
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/static/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>

    <!-- 自定义js -->
    <script src="/static/admin/js/hplus.js?v=4.1.0"></script>
    <script type="text/javascript" src="/static/admin/js/contabs.js"></script>

    <!-- 第三方插件 -->
    <script src="/static/admin/js/plugins/pace/pace.min.js"></script>

    <!-- 获取实时时间-->
    <script type="text/javascript">
        function startTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('txt').innerHTML="现在时间："+h+":"+m+":"+s;
            t=setTimeout('startTime()',500);
        }
        function checkTime(i)
        {
            if (i<10)
            {i="0" + i}
            return i;
        }
    </script>

</body>

</html>
