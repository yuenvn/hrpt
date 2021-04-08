<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\code\hrsystem\public/../application/admin\view\typeworks\add.html";i:1617873299;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加组织</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <!--uploadify文件引入CSS-->
   <!-- <link rel="stylesheet" type="text/css" href="/static/plus/uploadify/uploadify.css" />-->
</head>

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

                                    </div>
                                </div>

                                <div class="panel-body">
                                    <form action="<?php echo url('adddata'); ?>" class="form-horizontal m-t" id="commentForm" method="post"  enctype="multipart/form-data">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">

                                                <div  class="form-group">
                                                    <label class="col-sm-1 control-label">职务添加：</label>
                                                    <div class="form-submit">
                                                        <input type="text" class="input-text" value="" placeholder="" id="position_name" name="position">
                                                    </div>
                                                    <br>

                                                    </br>
                                                <br class="form-group">
                                                <label class="col-sm-1 control-label">职称添加：</label>
                                                <div class="form-submit">
                                                    <input type="text" class="input-text" value="" placeholder="" id="jobtitle_name" name="position">
                                                </div>
                                                <br>

                                                </br>
                                                <br class="form-group">
                                                <label class="col-sm-1 control-label">年资选择：</label>
                                                <div class="form-submit">
                                                    <select id="workingageid" name="workingage"  >
                                                        <option>請選擇年资：</option>
                                                        <option value="2">2年内 </option> //选择"2年内",系统返回值"2"
                                                        <option value="5">2年-5年</option>
                                                        <option value="7">5年以上</option>
                                                    </select>
                                               </div>
                                                <br>

                                                </br>
                                                    <br class="form-group">
                                                    <label class="col-sm-1 control-label">底薪：</label>
                                                    <div class="form-submit">
                                                        <input type="text" class="input-text" value=" " placeholder="" id="basicsalaryid" name="basicsalary">
                                                    </div>

                                                    <br class="form-group">
                                                    <label class="col-sm-1 control-label">全勤奖金：</label>
                                                    <div class="form-submit">
                                                        <input type="text" class="input-text" value="" placeholder="" id="fullbonusid" name="fullbonus">
                                                    </div>

                                                <br class="form-group">
                                                <label class="col-sm-1 control-label">等级选择：</label>
                                                <div class="form-submit">
                                                    <input type="text" class="input-text" value="SG1-1" placeholder="" id="codelevelid" name="codelevel">
                                                </div>
                                                <br>

                                                </br>
                                                <br class="form-group">
                                                <label class="col-sm-1 control-label">ABC等级选择：</label>
                                                <div class="form-submit">
                                                        <select id="abclevelid" name="abclevel"  >
                                                            <option>請選擇ABC：</option>
                                                            <option value="A">A级 </option> //选择"A级",系统返回值"A"
                                                            <option value="B">B级 </option>
                                                            <option value="C">C级 </option>
                                                        </select>
<!--                                                    <input type="text" class="input-text" value="" placeholder="" id="abclevelid" name="abclevelname">-->
                                                </div>
                                                    <br>

                                                    </br>
                                                    <br class="form-group">

                                                    <label class="col-sm-1 control-label">ABC效率奖金：</label>
                                                    <div class="form-submit">
                                                        <input type="text" class="input-text" value="" placeholder="" id="abcbonusid" name="abcbonus">
                                                    </div>

                                                    </div>


                                                    <label class="col-sm-1 control-label">职务分类：</label>
                                                    <div class="col-sm-2">
                                                        <select id="province" name="pid" class="form-control m-b help-block m-b-none" required="" aria-required="true" >
                                                         <?php foreach($typeworks as $vo): ?>
                                                            <option value="<?php echo $vo['id']; ?>" ><?php echo $vo['level']; ?>级&nbsp;<?php echo $vo['position']; ?></option>
                                                            <?php endforeach; ?>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <select id="city" name="native_city"  style="display: none;" class="form-control m-b help-block m-b-none" aria-required="true" required=""></select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <select id="county" name="native_county" style="display: none;" class="form-control m-b help-block m-b-none" aria-required="true">
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-3 col-sm-offset-1">
                                                <button class="btn btn-primary" type="submit" >提交</button>
                                                <button style="margin-left: 15px;" class="btn btn-default" type="reset" >重置</button>
                                                <a style="margin-left: 15px;" class="btn btn-info" href="<?php echo url('add'); ?>">刷新</a>
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
<!-- 全局js -->
<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
<!-- 自定义js -->
<script src="/static/admin/js/content.js?v=1.0.0"></script>

<!-- jQuery Validation plugin javascript-->
<script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/static/admin/js/plugins/validate/messages_zh.min.js"></script>

<script src="/static/admin/js/demo/form-validate-demo.js"></script>


<!--百度编辑器-->
<!-- 配置文件 -->
<script type="text/javascript" src="/static/plus/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/plus/ueditor/ueditor.all.js"></script>
<script>
function addabcsalary(o){
var div=$(o).parent().parent();
if($(o).html()==' [ + ] '){
var newdiv=div.clone();
newdiv.find('a').html(' [ - ] ');
div.after(newdiv);
}else{
div.remove();
}
}
</script>
<!--uploadify文件引入js-->
<script type="text/javascript" src="/static/plus/uploadify/jquery.uploadify.min.js"></script>
<!-- layer -->
<script src="/static/plus/layer/layer.js"></script>
<script type="text/javascript">
    // if($("select[name=pid]").find("option:selected").val() !=0){
    //     changeTemplate();
    // }
    // $("select[name=pid]").change(function(){
    //     changeTemplate();
    // });



</script>


</body>

</html>
