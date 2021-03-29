<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\code\hrsystem\public/../application/admin\view\typeworks\edit.html";i:1616993449;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑组织</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <!--uploadify文件引入CSS-->
   <!-- <link rel="stylesheet" type="text/css" href="/static/plus/uploadify/uploadify.css" />-->
    <style type="text/css">
        body{
            margin:0;
            padding:0;

        }

        #margin {
            width: 200px;
            color: darksalmon;
            background-color: black;

            margin-left: auto;
            margin-right: auto;
            /*auto是自动，这里会直接设置居中模式，自动设置左右外边距来使内部元素达到居中的效果*/
        }

        #position{
            width: 200px;
            color: darksalmon;
            background-color: black;

            position: absolute;
            right:0px;
            /*设置 绝对位置模式来定位,使用绝对定位模式之后，原先占据的空间会消失，与float一样*/
            z-index: -1;
            outline: red solid 10px;
            border: green solid 5px;
        }

        #float{
            width: 300px;
            color: darksalmon;
            background-color: black;
            float:right;
            /*设置float:right 属性后原先占据的空间也会消失。*/

            position: relative;
            top: 100px;
            /*这里再次做了一个相对定位，是为了相对于浮动之后不被遮挡再向下移动。
             不知道为什么这里没设置相对定位之前会被position遮挡，可能是浮动会被定位遮挡。
             （在这把z-index=1 不管用，但是给position一个-1就管用了,就解决了遮挡问题）
             做了相对定位之后就没了遮挡问题。

              为了向下移动还可以加一个margin-top
            */
        }

    </style>
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

                                </div>

                                <div class="panel-body">
                                    <form class="form-horizontal m-t" id="commentForm" method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $rs['id']; ?>">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">上级组织</label>
                                                    <div class="col-sm-11">
                                                        <select class="form-control m-b" required="" name="pid">
                                                            <option value="0">顶级组织</option>
                                                            <?php if(is_array($typeworks) || $typeworks instanceof \think\Collection || $typeworks instanceof \think\Paginator): $i = 0; $__LIST__ = $typeworks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                                                            <option <?php if($rs['pid'] == $val['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $val['id']; ?>"><?php echo str_repeat(' ∷ ',$val['level']*1);  ?><?php echo $val['position']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">职位名称</label>
                                                    <div class="col-sm-11">
                                                        <input  name="position" value="<?php echo $rs['position']; ?>" minlength="1" maxlength="20" type="text" class="form-control " required="" aria-required="true">
                                                    </div>
                                                    <label class="col-sm-1 control-label">职称名称</label>
                                                    <div class="col-sm-11">
                                                        <input  name="jobtitle" value="<?php echo $rs['jobtitle']; ?>" minlength="1" maxlength="20" type="text" class="form-control " required="" aria-required="true">
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="col-sm-1 control-label">年资选择：</label>
                                                    <div class="col-sm-11">
                                                        <select id="workingageid" name="workingage">
                                                            <option>請選擇年资：</option>
                                                            <option value="2">2年内 </option> //选择"2年内",系统返回值"2"
                                                            <option value="5">2年-5年</option>
                                                            <option value="7">5年以上</option>
                                                        </select>
                                                    </div>
                                                    </div>

                                                    <label class="col-sm-1 control-label">职位等级</label>
                                                    <div class="col-sm-11">
                                                        <input  name="level" value="<?php echo $rs['level']; ?>" minlength="1" maxlength="20" type="text" class="form-control " required="" aria-required="true">
                                                    </div>
                                                    <label class="col-sm-1 control-label">底薪</label>
                                                    <div class="col-sm-11">
                                                        <input  name="basicsalary" value="<?php echo $rs['basicsalary']; ?>" minlength="1" maxlength="20" type="text" class="form-control " required="" aria-required="true">
                                                    </div>
                                                    <label class="col-sm-1 control-label">全勤奖金：</label>
                                                    <div class="col-sm-11">
                                                        <input  name="fullbonus" value="<?php echo $rs['fullbonus']; ?>" minlength="1" maxlength="20" type="text" class="form-control " required="" aria-required="true">
                                                    </div>

                                                    <div class="form-group">
                                                    <label class="col-sm-1 control-label">ABC等级选择：</label>
                                                    <div class="form-submit">
                                                        <select id="abclevelid" name="abclevel"  >
                                                            <option>請選擇ABC：</option>
                                                            <option value="A">A级 </option> //选择"A级",系统返回值"A"
                                                            <option value="B">B级 </option>
                                                            <option value="C">C级 </option>
                                                        </select>
                                                    </div>
                                                    </div>

                                                    <label class="col-sm-1 control-label">ABC奖金</label>
                                                    <div class="col-sm-11">
                                                        <input  name="abcbonus" value="<?php echo $rs['abcbonus']; ?>" minlength="1" maxlength="20" type="text" class="form-control " required="" aria-required="true">
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
<!--uploadify文件引入js-->
<script type="text/javascript" src="/static/plus/uploadify/jquery.uploadify.min.js"></script>
<!-- layer -->
<script src="/static/plus/layer/layer.js"></script>
<script type="text/javascript">
    //控制点击链接处是否显示link外部链接
    $ck=$("input[name=c_attr]:checked").val();
    if($ck==3){
        $("#link_div").show();
    }else{
        $("#link_div").hide();
    }
    //当加载后点击按钮发生改变的时候在做判断是否显示与隐藏link外部链接
    $(document).ready(function(){
        $("#hide").click(function(){
            $("#link_div").hide();
        });
        $("#hides").click(function(){
            $("#link_div").hide();
        });
        $("#show").click(function(){
            $("#link_div").show();
        });
    });
    //上传文件
    $(function() {
        $('#file_upload').uploadify({
            'swf'      : '/static/plus/uploadify/uploadify.swf',
            'uploader' : '<?php echo url("Typeworks/upimg"); ?>',
            'progressData':'speed',
            'buttonText':'上传文件',
            'buttonClass':'fa fa-upload btn-sm btn btn-danger ',
            //允许上传的文件
            'fileTpyeDesc':'Image Files',
            //设定发送数据的name值
            'fileObjName':'img',
            'onUploadSuccess':function(file,data,response){
                $("input[name='img']").val(data);
                var typeworks="/uploads/typeworks/"+data;
                var typeworksSrc="<img src='"+typeworks+"' height='100' width='100'>";
                //显示img_div
                $("#img_div").show();
                $("#typeworks_img").html(typeworksSrc);
            }
        });
        $("#file_upload-button").removeAttr('style');
    });
    //撤销图片
    function delimg() {
        /*var structure_img=$("#structure_img").find("img");
         var imgSrc=structure_img.attr("src");*/
        var typeworksId=<?php echo $rs['id']; ?>;
        var imgSrc=$("input[name='img']").val();
        if(!imgSrc){
            layer.msg(' 请先上传图片！', {icon: 2});
            return false;
        }
        layer.confirm(' 您确定还要撤销该图片吗？', {
            btn: ['确定','取消'],//按钮
            icon: 3,
            /*skin: 'layui-layer-molv',//样式*/
            closeBtn: 0,//取消关闭按钮
            title:'确定将会删除图片及清空数据库表的值！',//设置标题，为0则关闭标题
            anim: 4,//动画类型
            time:10000, //10秒后不操作自动关闭
        }, function(){
            $("#img_div").hide();
            $("input[name='img']").val('');
            $.ajax({
                type:"post",
                dataType:"json",
                data:{imgSrc:imgSrc,typeworksId:typeworksId},
                url:"<?php echo url('typeworks/delimg'); ?>",
                success:function(data){
                    if(data){
                        layer.msg(' 撤销图片成功！', {icon: 6});
                    }else{
                        layer.msg(' 撤销图片失败！', {icon: 2});
                    }
                }
            });
        },function(){
            layer.msg(' 您取消了当前操作！', {icon: 5});
        });

    }

    $("select[name=pid]").change(function(){
        changeTemplate();
    });
</script>


</body>

</html>
