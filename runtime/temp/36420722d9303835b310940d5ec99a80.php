<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\code\hrsystem\public/../application/admin\view\auth_group\edit.html";i:1502536026;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>编辑用户组</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">

    <link href="/static/admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <h5>编辑用户组 <a  href="<?php echo url('lists'); ?>"><button class="btn btn-outline btn-rounded btn-sm btn-info">返回列表</button></a></h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" id="commentForm" method="post" action="">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">用户组名：</label>
                                <div class="col-sm-11">
                                    <input  type="text" name="title" value="<?php echo $groupRes['title']; ?>" class="form-control" required="" aria-required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">是否启用</label>
                                <div class="col-sm-11">
                                    <div class="col-sm-1 radio radio-danger" style="float: left; ">
                                        <input name="status" value="1" <?php if($groupRes['status'] == 1): ?> checked="checked" <?php endif; ?> type="radio">
                                        <label>
                                            开启
                                        </label>
                                    </div>
                                    <div class="col-sm-1 radio radio-danger" style="float: left; ">
                                        <input name="status" value="0" <?php if($groupRes['status'] == 0): ?> checked="checked" <?php endif; ?> type="radio">
                                        <label>
                                            关闭
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-3 col-sm-offset-1">
                                    <button class="btn btn-primary" type="submit" >保存</button>
                                    <button style="margin-left: 15px;" class="btn btn-default" type="reset" >重置</button>
                                    <a style="margin-left: 15px;" class="btn btn-info" href="<?php echo url('lists'); ?>">返回</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- 全局js -->
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>

    <!-- 自定义js -->
    <script src="/static/admin/js/content.js?v=1.0.0"></script>

    <!-- jQuery Validation plugin javascript-->
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/static/admin/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/static/admin/js/demo/form-validate-demo.js"></script>


</body>

</html>
