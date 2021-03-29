<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\code\hrsystem\public/../application/admin\view\staff\edit.html";i:1615453446;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑员工</title>

    <link rel="shortcut icon" href="favicon.ico">

    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <!-- 全局js -->
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/plus/bootstrap-prettyfile/bootstrap-prettyfile.js"></script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/static/plus/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/static/plus/ueditor/ueditor.all.js"></script>
    <script src="../../../../../static/plus/js/getdepartment.js"></script>
    <!-- 实例化编辑器 -->

</head>
<style>
    .gh{
        display: inline-block;
        background-color: #015eff;
        height: 30px;
        width: 90px;
        line-height: 30px;
        text-align: center;
        color: floralwhite;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<body class="gray-bg">
<div class="row">
    <div class="col-sm-12">
        <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row m-t-sm">
                        <div class="col-sm-12">
                            <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a  href="#tab-1" data-toggle="tab">基本信息</a></li>
                                            <li class=""><a href="#tab-2" data-toggle="tab">培训记录</a></li>
                                            <li class=""><a href="#tab-3" data-toggle="tab">服务评价</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <form class="form-horizontal m-t" id="commentForm" method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $rs['id']; ?>" name="id">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">员工姓名：</label>
                                                    <div class="col-sm-3">
                                                        <input  name="name" value="<?php echo $rs['name']; ?>" type="text" minlength="2" maxlength="15" class="form-control " required="" aria-required="true">
                                                    </div>
                                                    <label class="col-sm-1 control-label">员工性别：</label>
                                                    <div class="col-sm-3">
                                                        <div class="col-sm-3 radio radio-danger" style="float: left; ">
                                                            <input id="positionl" name="gender"  value="1" type="radio" required="" <?php if($rs['gender'] == 1): ?> checked="checked" <?php endif; ?>>
                                                            <label>
                                                                先生
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-3 radio radio-success" style="float: left; ">
                                                            <input id="positionr" name="gender" value="2" type="radio" required="" <?php if($rs['gender'] == 2): ?> checked="checked" <?php endif; ?>>
                                                            <label>
                                                                女士
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">出生日期：</label>
                                                    <div class="col-sm-3">
                                                        <input id="time" name="birthday" value="<?php echo date('Y-m-d',$rs['birthday']); ?>" class="laydate-icon form-control layer-date" required="" aria-required="true" autocomplete="off">
                                                    </div>
                                                    <label class="col-sm-1 control-label">身份证号：</label>
                                                    <div class="col-sm-3">
                                                        <input  name="id_card" value="<?php echo $rs['id_card']; ?>" type="text" minlength="8" maxlength="9" class="form-control " required="" aria-required="true">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">联系电话：</label>
                                                    <div class="col-sm-3">
                                                        <input  name="tel" value="<?php echo $rs['tel']; ?>" type="text" minlength="8" maxlength="10" class="form-control " required="" aria-required="true">
                                                    </div>
                                                    <label class="col-sm-1 control-label">政治面貌：</label>
<!--                                                    <div class="col-sm-3">-->
<!--                                                        <input  name="political" value="" type="text" minlength="2" maxlength="15" class="form-control " required="" aria-required="true">-->
<!--                                                    </div>-->
                                                    <div class="col-sm-3 radio radio-danger" style="float: left; ">
                                                        <input id="positionok" name="marriage"  value="1" type="radio" required="" <?php if($rs['marriage'] == 1): ?> checked="checked" <?php endif; ?>>
                                                        <label>
                                                            已婚
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-3 radio radio-success" style="float: left; ">
                                                        <input id="positionnot" name="marriage" value="2" type="radio" required="" <?php if($rs['marriage'] == 2): ?> checked="checked" <?php endif; ?>>
                                                        <label>
                                                            未婚
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">学历信息：</label>
                                                    <div class="col-sm-3">
                                                        <input  name="education" value="<?php echo $rs['education']; ?>" type="text" minlength="2" maxlength="15" class="form-control " required="" aria-required="true">
                                                    </div>

                                                    <br> </br>
<!--                                                    分割线-->
                                                    <HR style="FILTER: alpha(opacity=100,finishopacity=0,style=2)" width="80%" color=#987cb9 SIZE=10>

                                                    <div class="form-group">

                                                        <label class="col-sm-1 control-label">入职日期：</label>
                                                        <div class="col-sm-3">
                                                            <input id="timeb" name="entrydate" value="<?php echo date('Y-m-d',$rs['entrydate']); ?>" class="laydate-icon form-control layer-date" required="" aria-required="true" autocomplete="off">
                                                        </div>
                                                    <label class="col-sm-1 control-label">职位：</label>
                                                    <div class="col-sm-2">
                                                        <select id="worksjobsid" name="works_jobs" class="form-control m-b help-block m-b-none" required="" aria-required="false">
                                                            <option value="">请选择职位</option>
                                                            <?php if(is_array($jobsRes) || $jobsRes instanceof \think\Collection || $jobsRes instanceof \think\Paginator): $i = 0; $__LIST__ = $jobsRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jobs): $mod = ($i % 2 );++$i;?>
                                                            <option <?php if($jors['works_jobs'] == $jobs['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $jobs['id']; ?>"><?php echo $jobs['name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>

                                                        </select>
                                                    </div>
                                                </div>


                                                    <label class="col-sm-1 control-label">部门：</label>
                                                    <div class="col-sm-3">
                                                        <select id="departmentidc" name="department" class="form-control m-b help-block m-b-none" required="" aria-required="false">
                                                            <option value="">请选择部门</option>
                                                            <?php if(is_array($structureRes) || $structureRes instanceof \think\Collection || $structureRes instanceof \think\Paginator): $i = 0; $__LIST__ = $structureRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$structure): $mod = ($i % 2 );++$i;?>
                                                            <option <?php if($rs['department'] == $structure['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $structure['id']; ?>"><?php echo $structure['typename']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>

                                                        </select>
                                                    </div>
                                                    <label class="col-sm-1 control-label">健康状况：</label>
                                                    <div class="col-sm-3">
                                                        <input  name="health" value="<?php echo $rs['health']; ?>" type="text" minlength="2" maxlength="30" class="form-control " required="" aria-required="true">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">新形象照：</label>
                                                    <div class="col-sm-3">
                                                        <input  name="photo" type="file" class="form-control " aria-required="true">
                                                    </div>
                                                    <label class="col-sm-1 control-label">社会关系：</label>
                                                    <div class="col-sm-3">
                                                        <input  name="gam" value="<?php echo $rs['gam']; ?>" type="text" minlength="2" maxlength="50" class="form-control " required="" aria-required="true">
                                                    </div>

                                                </div>

                                                <?php if($rs['photo']): ?>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">原形象照：</label>
                                                    <div class="col-sm-3">
                                                        <img src="/uploads/photos/<?php echo $rs['photo']; ?>" height="100" alt="">
                                                    </div>
                                                </div>
                                                <?php endif; ?>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">籍贯：</label>
                                                    <div class="col-sm-2">
                                                        <select id="province" name="native_province" class="form-control m-b help-block m-b-none" required="" aria-required="true">
                                                            <option value="">请选择省份</option>
                                                            <?php if(is_array($provinceRes) || $provinceRes instanceof \think\Collection || $provinceRes instanceof \think\Paginator): $i = 0; $__LIST__ = $provinceRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$provinces): $mod = ($i % 2 );++$i;?>
                                                            <option <?php if($rs['native_province'] == $provinces['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $provinces['id']; ?>"><?php echo $provinces['name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <?php if($cityRes): ?>
                                                            <select id="city" name="native_city" class="form-control m-b help-block m-b-none" aria-required="true">
                                                                <option value="">请选择城市</option>
                                                                <?php if(is_array($cityRes) || $cityRes instanceof \think\Collection || $cityRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cityRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$city): $mod = ($i % 2 );++$i;?>
                                                                <option <?php if($rs['native_city'] == $city['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        <?php else: ?>
                                                            <select id="city" name="native_city"  style="display: none;" class="form-control m-b help-block m-b-none" aria-required="true" required=""></select>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <?php if($countyRes): ?>
                                                            <select id="county" name="native_county" class="form-control m-b help-block m-b-none" aria-required="true">
                                                                <option value="">请选择区/县</option>
                                                                <?php if(is_array($countyRes) || $countyRes instanceof \think\Collection || $countyRes instanceof \think\Paginator): $i = 0; $__LIST__ = $countyRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$county): $mod = ($i % 2 );++$i;?>
                                                                <option <?php if($rs['native_county'] == $county['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        <?php else: ?>
                                                            <select id="county" name="native_county" style="display: none;" class="form-control m-b help-block m-b-none" aria-required="true"></select>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="tab-2">


                                                    <div class="form-group">
                                                        <label class="col-sm-1 control-label">培训记录证书：</label>
                                                        <div class="col-sm-11">
                                                            <script id="training_info" name="training_info" type="text/plain"><?php echo $training['training_info']; ?></script>
                                                        </div>
                                                    </div>


                                            </div>

                                            <div class="tab-pane" id="tab-3">
                                                <?php if(is_array($service_evaluation) || $service_evaluation instanceof \think\Collection || $service_evaluation instanceof \think\Paginator): $i = 0; $__LIST__ = $service_evaluation;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$services): $mod = ($i % 2 );++$i;?>
                                                <div server_id="<?php echo $services['id']; ?>" class="form-group">
                                                    <label class="col-sm-1 control-label">
                                                        <a onclick="delServicesRow(this);" href="#" style="margin-right: 10px"> [ - ] </a> 评价内容
                                                    </label>
                                                    <div class="col-sm-11">
                                                        <input  name="content[]" value="<?php echo $services['content']; ?>" type="text" class="form-control" aria-required="true">
                                                    </div>
                                                    <div style="padding-top: 45px">
                                                        <label class="col-sm-1 control-label">奖惩记录</label>
                                                        <div class="col-sm-11">
                                                            <input  name="sanctions[]" value="<?php echo $services['sanctions']; ?>" type="text" class="form-control" aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div style="padding-top: 45px">
                                                        <label class="col-sm-1 control-label">所得分数</label>
                                                        <div class="col-sm-11">
                                                            <input  name="score[]" value="<?php echo $services['score']; ?>" type="text" class="form-control" aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">
                                                        <a onclick="addrow(this);" href="#" style="margin-right: 10px"> [ + ] </a>
                                                        评价内容
                                                    </label>
                                                    <div class="col-sm-11">
                                                        <input  name="content[]" type="text" class="form-control" aria-required="true">
                                                    </div>
                                                    <div style="padding-top: 45px">
                                                        <label class="col-sm-1 control-label">奖惩记录</label>
                                                        <div class="col-sm-11">
                                                            <input  name="sanctions[]" type="text" class="form-control" aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div style="padding-top: 45px">
                                                        <label class="col-sm-1 control-label">所得分数</label>
                                                        <div class="col-sm-11">
                                                            <input  name="score[]" type="text" class="form-control" aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-3 col-sm-offset-1">
                                                <button class="btn btn-primary" type="submit" >提交</button>
                                                <button style="margin-left: 15px;" class="btn btn-default" type="reset" >重置</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 自定义js -->
<script src="/static/admin/js/content.js?v=1.0.0"></script>

<!-- jQuery Validation plugin javascript-->
<script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/static/admin/js/plugins/validate/messages_zh.min.js"></script>

<script src="/static/admin/js/demo/form-validate-demo.js"></script>

<!-- layer -->
<script src="/static/plus/layer/layer.js"></script>
<script src="/static/plus/js/getaddress.js"></script>
<script src="/static/plus/js/getdepartment.js"></script>
<script src="/static/admin/js/plugins/layer/laydate/laydate.js"></script>

<script>

    var send_url="<?php echo $url_root; ?>/admin/staff/getCityInfo";
    var ismobile=false;

    $('input[name="photo"]').prettyFile();

    //外部js调用
    laydate({
        elem: '#time', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
        event: 'focus' //响应事件。如果没有传入event，则按照默认的click
    });
    laydate({
        elem: '#timeb', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
        event: 'focus' //响应事件。如果没有传入event，则按照默认的click
    });

    /**
     * 添加一个列表
     * @param o
     */
    function addrow(o){
        var div=$(o).parent().parent();
        if($(o).html()==' [ + ] '){
            var newdiv=div.clone();
            newdiv.find('a').html(' [ - ] ');
            div.after(newdiv);
        }else{
            div.remove();
        }
    }

    /**
     * AJAX删除培训记录
     * @param o
     */
    function delTrainingRow(o){
        layer.confirm('您确定要删除该培训记录吗？', {
            title: false,
            closeBtn: false,
            icon: 3,
            btn: ['确定','取消']
        }, function(){
            var div=$(o).parent().parent();
            var id=div.attr('training_id');
            $.ajax({
                type:"post",
                dataType:"json",
                data:{id:id},
                url:"<?php echo url('Staff/ajaxDelTraining'); ?>",
                success:function(data){
                    if(data==1){
                        div.remove();
                        layer.msg('删除成功', {
                            icon: 6,
                            time: 2000, //2s后自动关闭
                        });
                    }else if(data==0){
                        layer.msg('删除失败，刷新再试', {icon: 2});
                    }
                }
            });

        }, function(){
        });
    }

    /**
     * AJAX删除服务评价
     * @param o
     */
    function delServicesRow(o){
        layer.confirm('您确定要删除该服务评价吗？', {
            title: false,
            closeBtn: false,
            icon: 3,
            btn: ['确定','取消']
        }, function(){
            var div=$(o).parent().parent();
            var id=div.attr('services_id');
            $.ajax({
                type:"post",
                dataType:"json",
                data:{id:id},
                url:"<?php echo url('Staff/ajaxDelServices'); ?>",
                success:function(data){
                    if(data==1){
                        div.remove();
                        layer.msg('删除成功', {
                            icon: 6,
                            time: 2000, //2s后自动关闭
                        });
                    }else if(data==0){
                        layer.msg('删除失败，刷新再试', {icon: 2});
                    }
                }
            });

        }, function(){
        });
    }

</script>
<script type="text/javascript">
    var ue = UE.getEditor('training_info',{initialFrameHeight:400});
    toolbars: [
        ['fullscreen', 'source', 'undo', 'redo'],
        ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
    ]
</script>

</body>

</html>
