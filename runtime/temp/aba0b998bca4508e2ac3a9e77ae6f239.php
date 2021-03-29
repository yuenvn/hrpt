<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\code\hrsystem\public/../application/admin\view\index\welcome.html";i:1617005213;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--360浏览器优先以webkit内核解析-->

    <title></title>

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    

</head>

<body class="gray-bg">

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>关于我们</h5>
                    </div>
                    <div class="ibox-content">
                        <ul  style="line-height: 40px;">
                            <li>联系人：<?php echo $rs['name']; ?></li>
                            <li>联系电话：<?php echo $rs['tel']; ?></li>
                            <li>软件版本号：<?php echo $rs['version']; ?></li>
                            <li>发行时间：<?php echo date("Y-m-d H:i:s",$rs['create_time']); ?></li>
                            <li>更新时间：<?php echo date("Y-m-d H:i:s",$rs['update_time']); ?></li>
                            <li style="color: #0e9aef;font-weight: bold"> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>相关案例</h5>
                    </div>
                    <div class="ibox-content">
                        <ul  style="line-height: 40px;">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>版本日志</h5>
                    </div>
                    <div class="ibox-content no-padding">
                        <div class="panel-body">
                            <div class="panel-group" id="version">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#version" href="#v1">v5.0.0</a><code class="pull-right">2021.03.29</code>
                                        </h5>
                                    </div>
                                    <div id="v41" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="alert alert-warning"><span style="color:#ff0000;font-weight:bold">特别提醒：修改后台配置后一定要清空缓存！！！</span></div>
                                            <ol style="line-height: 40px;">
                                                <li>查询管理：<a href="<?php echo $url; ?>/admin/search/index" target="_blank"><?php echo $url; ?>/admin/search/index</a></li>
                                                <li>更新日期：2021年3月29日</li>
                                                <li>网站名称：<?php echo $configs['title']; ?>【<?php echo $url; ?>】</li>
                                                <li>网站版本号：Version 5.0.0</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>系统信息</h5>
                    </div>
                    <div class="ibox-content">
                        <ul  style="line-height: 40px;">
                            <li>当前地址：<?php echo $url; ?></li>
                            <li>当前IP：<?php echo $ip; ?></li>
                            <li>当前系统：<?php echo $php_os; ?></li>
                            <li>服务环境：<?php echo $server_software; ?></li>
                            <li>PHP版本：PHP <?php echo $php_version; ?></li>
                            <li>MYSQL信息：<?php echo $php_mysql; ?></li>
                            <li>网关接口：<?php echo $cgi; ?></li>
                            <li>通讯协议：<?php echo $server_protocol; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- 全局js -->
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>

    <!-- 自定义js -->
    <script src="/static/admin/js/content.js"></script>

    <!-- 欢迎信息 -->
    <script src="/static/admin/js/welcome.js"></script>
</body>

</html>
