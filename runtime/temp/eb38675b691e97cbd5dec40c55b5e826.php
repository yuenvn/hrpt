<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\code\hrsystem\public/../application/admin\view\typeworks\edit.html";i:1616734038;}*/ ?>
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
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container',{initialFrameHeight:400});
    toolbars: [
        ['fullscreen', 'source', 'undo', 'redo'],
        ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
    ]
</script>
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
