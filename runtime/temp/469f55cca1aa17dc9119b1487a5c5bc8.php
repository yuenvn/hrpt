<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\code\hrsystem\public/../application/admin\view\enterprise\edit.html";i:1560221908;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加企业信息</title>

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
                                            <li class="active"><a  href="#tab-1" data-toggle="tab">基础信息</a></li>
                                            <li class=""><a href="#tab-2" data-toggle="tab">良好信息</a></li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <form class="form-horizontal m-t" id="commentForm" method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $rs['id']; ?>" name="id">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">企业名称：</label>
                                                    <div class="col-sm-4">
                                                        <input  name="name" value="<?php echo $rs['name']; ?>" type="text" minlength="4" maxlength="30" class="form-control " required="" aria-required="true">
                                                    </div>
                                                    <label class="col-sm-1 control-label">信用代码：</label>
                                                    <div class="col-sm-4">
                                                        <input  name="credit_num" value="<?php echo $rs['credit_num']; ?>" type="text" minlength="18" maxlength="18" class="form-control " required="" aria-required="true">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">企业法人：</label>
                                                    <div class="col-sm-4">
                                                        <input  name="legal_name" value="<?php echo $rs['legal_name']; ?>" type="text" minlength="2" maxlength="15" class="form-control " required="" aria-required="true">
                                                    </div>
                                                    <label class="col-sm-1 control-label">企业类型：</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control m-b help-block m-b-none" required="" name="type" aria-required="true" aria-invalid="false" aria-describedby="set_lists-error">
                                                            <option value="有限责任公司" <?php if($rs['type'] == '有限责任公司'): ?> selected="selected" <?php endif; ?>>有限责任公司</option>
                                                            <option value="股份有限公司" <?php if($rs['type'] == '股份有限公司'): ?> selected="selected" <?php endif; ?>>股份有限公司</option>
                                                            <option value="股份两合公司" <?php if($rs['type'] == '股份两合公司'): ?> selected="selected" <?php endif; ?>>股份两合公司</option>
                                                            <option value="两合公司" <?php if($rs['type'] == '两合公司'): ?> selected="selected" <?php endif; ?>>两合公司</option>
                                                            <option value="无限公司" <?php if($rs['type'] == '无限公司'): ?> selected="selected" <?php endif; ?>>无限公司</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">注册资本：</label>
                                                    <div class="col-sm-4">
                                                        <input  name="reg_capital" value="<?php echo $rs['reg_capital']; ?>" type="number" class="form-control " required="" aria-required="true">
                                                    </div>
                                                    <label class="col-sm-1 control-label">注册币种：</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control m-b help-block m-b-none" required="" name="currency" aria-required="true" aria-invalid="false" aria-describedby="set_lists-error">
                                                            <option value="人民币" <?php if($rs['currency'] == '人民币'): ?> selected="selected" <?php endif; ?>>人民币</option>
                                                            <option value="美元" <?php if($rs['currency'] == '美元'): ?> selected="selected" <?php endif; ?>>美元</option>
                                                            <option value="港币" <?php if($rs['currency'] == '港币'): ?> selected="selected" <?php endif; ?>>港币</option>
                                                            <option value="新台币" <?php if($rs['currency'] == '新台币'): ?> selected="selected" <?php endif; ?>>新台币</option>
                                                            <option value="英镑" <?php if($rs['currency'] == '英镑'): ?> selected="selected" <?php endif; ?>>英镑</option>
                                                            <option value="欧元" <?php if($rs['currency'] == '欧元'): ?> selected="selected" <?php endif; ?>>欧元</option>
                                                            <option value="日元" <?php if($rs['currency'] == '日元'): ?> selected="selected" <?php endif; ?>>日元</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">成立日期：</label>
                                                    <div class="col-sm-4">
                                                        <input id="time" name="found_time" value="<?php echo date('Y-m-d',$rs['found_time']); ?>" class="laydate-icon form-control layer-date" required="" aria-required="true" autocomplete="off">
                                                    </div>
                                                    <label class="col-sm-1 control-label">营业期限：</label>
                                                    <div class="col-sm-6">
                                                        <input type="hidden" id="start_time_end">
                                                        <input placeholder="开始日期" name="start_time" value="<?php echo date('Y-m-d',$rs['start_time']); ?>" class="form-control layer-date" id="start" autocomplete="off">
                                                        <input placeholder="结束日期" name="end_time" value="<?php echo date('Y-m-d',$rs['end_time']); ?>" class="form-control layer-date" id="end" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">登记机关：</label>
                                                    <div class="col-sm-4">
                                                        <input  name="enter_organ" value="<?php echo $rs['enter_organ']; ?>" type="text" minlength="2" maxlength="25" class="form-control " required="" aria-required="true">
                                                    </div>
                                                    <label class="col-sm-1 control-label">海关代码：</label>
                                                    <div class="col-sm-4">
                                                        <input  name="customs_code" value="<?php echo $rs['customs_code']; ?>" type="text" minlength="4" maxlength="25" class="form-control " aria-required="true">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">企业地址：</label>
                                                    <div class="col-sm-2">
                                                        <select id="province" name="enterprise_province" class="form-control m-b help-block m-b-none" required="" aria-required="true">
                                                            <option value="">请选择省份</option>
                                                            <?php if(is_array($provinceRes) || $provinceRes instanceof \think\Collection || $provinceRes instanceof \think\Paginator): $i = 0; $__LIST__ = $provinceRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$provinces): $mod = ($i % 2 );++$i;?>
                                                            <option <?php if($rs['enterprise_province'] == $provinces['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $provinces['id']; ?>"><?php echo $provinces['name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <?php if($cityRes): ?>
                                                        <select id="city" name="enterprise_city" class="form-control m-b help-block m-b-none" aria-required="true">
                                                            <option value="">请选择城市</option>
                                                            <?php if(is_array($cityRes) || $cityRes instanceof \think\Collection || $cityRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cityRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$city): $mod = ($i % 2 );++$i;?>
                                                            <option <?php if($rs['enterprise_city'] == $city['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select>
                                                        <?php else: ?>
                                                        <select id="city" name="enterprise_city"  style="display: none;" class="form-control m-b help-block m-b-none" aria-required="true" required=""></select>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <?php if($countyRes): ?>
                                                        <select id="county" name="enterprise_county" class="form-control m-b help-block m-b-none" aria-required="true">
                                                            <option value="">请选择区/县</option>
                                                            <?php if(is_array($countyRes) || $countyRes instanceof \think\Collection || $countyRes instanceof \think\Paginator): $i = 0; $__LIST__ = $countyRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$county): $mod = ($i % 2 );++$i;?>
                                                            <option <?php if($rs['enterprise_county'] == $county['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $county['id']; ?>"><?php echo $county['name']; ?></option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </select>
                                                        <?php else: ?>
                                                        <select id="county" name="enterprise_county" style="display: none;" class="form-control m-b help-block m-b-none" aria-required="true"></select>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input placeholder="请输入企业详细地址"  name="enterprise_full_address" value="<?php echo $rs['enterprise_full_address']; ?>" type="text" minlength="4" maxlength="25" class="form-control " required="" aria-required="true">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                <label class="col-sm-1 control-label">企业状态：</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control m-b help-block m-b-none" required="" name="status" aria-required="true" aria-invalid="false" aria-describedby="set_lists-error">
                                                        <option value="存续" <?php if($rs['status'] == '存续'): ?> selected="selected" <?php endif; ?>>存续</option>
                                                        <option value="在业" <?php if($rs['status'] == '在业'): ?> selected="selected" <?php endif; ?>>在业</option>
                                                        <option value="吊销" <?php if($rs['status'] == '吊销'): ?> selected="selected" <?php endif; ?>>吊销</option>
                                                        <option value="注销" <?php if($rs['status'] == '注销'): ?> selected="selected" <?php endif; ?>>注销</option>
                                                        <option value="迁入" <?php if($rs['status'] == '迁入'): ?> selected="selected" <?php endif; ?>>迁入</option>
                                                        <option value="迁出" <?php if($rs['status'] == '迁出'): ?> selected="selected" <?php endif; ?>>迁出</option>
                                                        <option value="停业" <?php if($rs['status'] == '停业'): ?> selected="selected" <?php endif; ?>>停业</option>
                                                        <option value="清算" <?php if($rs['status'] == '清算'): ?> selected="selected" <?php endif; ?>>清算</option>
                                                    </select>
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                <label class="col-sm-1 control-label">经营范围</label>
                                                <div class="col-sm-9">
                                                    <textarea rows="5" name="business_between" class="form-control" aria-required="true" required="required"><?php echo $rs['business_between']; ?></textarea>
                                                </div>
                                            </div>

                                            </div>

                                            <div class="tab-pane" id="tab-2">
                                                <?php if(is_array($enterprise_good_info) || $enterprise_good_info instanceof \think\Collection || $enterprise_good_info instanceof \think\Paginator): $i = 0; $__LIST__ = $enterprise_good_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsInfo): $mod = ($i % 2 );++$i;?>
                                                    <div class="form-group">
                                                    <label class="col-sm-2 control-label">
                                                        <a onclick="delGoodsInfoRow(this);" href="#" style="margin-right: 10px"> [ - ] </a>
                                                        信用评级(评价)信息
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <textarea  name="credit_info[]" type="text" class="form-control" aria-required="true"><?php echo $goodsInfo['credit_info']; ?></textarea>
                                                    </div>
                                                    <div style="padding-top: 65px">
                                                        <label class="col-sm-2 control-label">荣誉信息(合同重信)</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="honor_info[]" type="text" class="form-control" aria-required="true"><?php echo $goodsInfo['honor_info']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div style="padding-top: 65px">
                                                        <label class="col-sm-2 control-label">社会责任信息</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="social_info[]" type="text" class="form-control" aria-required="true"><?php echo $goodsInfo['social_info']; ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div style="padding-top: 65px">
                                                        <label class="col-sm-2 control-label">社会组织信用信息</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="social_org_info[]" type="text" class="form-control" aria-required="true"><?php echo $goodsInfo['social_org_info']; ?></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">
                                                        <a onclick="addrow(this);" href="#" style="margin-right: 10px"> [ + ] </a>
                                                        信用评级(评价)信息
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <textarea  name="credit_info[]" type="text" class="form-control" aria-required="true"></textarea>
                                                    </div>
                                                    <div style="padding-top: 65px">
                                                        <label class="col-sm-2 control-label">荣誉信息(合同重信)</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="honor_info[]" type="text" class="form-control" aria-required="true"></textarea>
                                                        </div>
                                                    </div>
                                                    <div style="padding-top: 65px">
                                                        <label class="col-sm-2 control-label">社会责任信息</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="social_info[]" type="text" class="form-control" aria-required="true"></textarea>
                                                        </div>
                                                    </div>

                                                    <div style="padding-top: 65px">
                                                        <label class="col-sm-2 control-label">社会组织信用信息</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="social_org_info[]" type="text" class="form-control" aria-required="true"></textarea>
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
<script src="/static/admin/js/plugins/layer/laydate/laydate.js"></script>

<script>
    var send_url="<?php echo $url_root; ?>/admin/staff/getCityInfo";
    var ismobile=false;

    //外部js调用
    laydate({
        elem: '#time', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
        event: 'focus' //响应事件。如果没有传入event，则按照默认的click
    });

    laydate({
        elem: '#start_time_end',
        event: 'focus'
    });

    //日期范围限制
    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD',
        min: '1900-01-01 00:00:00', //设定最小日期为当前日期
        max: '2099-12-31 23:59:59', //最大日期
        istime: true,
        istoday: false,
        choose: function (datas) {
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };
    var end = {
        elem: '#end',
        format: 'YYYY-MM-DD',
        min: laydate.now(),
        max: '2099-12-31 23:59:59',
        istime: true,
        istoday: false,
        choose: function (datas) {
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);

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
     * AJAX删除良好信息
     * @param o
     */
    function delGoodsInfoRow(o){
        layer.confirm('您确定要删除该条记录吗？', {
            title: false,
            closeBtn: false,
            icon: 3,
            btn: ['确定','取消']
        }, function(){
            var div=$(o).parent().parent();
            var id=div.attr('eid');
            $.ajax({
                type:"post",
                dataType:"json",
                data:{id:id},
                url:"<?php echo url('Enterprise/ajaxDelGoodsInfo'); ?>",
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

</body>

</html>
