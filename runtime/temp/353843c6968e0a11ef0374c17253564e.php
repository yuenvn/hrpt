<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\code\hrsystem\public/../application/admin\view\login\default.html";i:1523256776;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Pragma" content="no-cache"> 
<meta http-equiv="Cache-Control" content="no-cache"> 
<meta http-equiv="Expires" content="0"> 
<title>后台登录-<?php echo $configs['title']; ?></title>
<link href="/static/admin/login/css/login.css" type="text/css" rel="stylesheet">
</head>
<body style="background:url('/images/<?php echo $bgrands; ?>.jpg') no-repeat center;">
<div class="login" >
    <div class="message"><?php echo $configs['title']; ?>-后台登录中心</div>
    <div id="darkbannerwrap"></div>
    
    <form method="post">
		<input name="action" value="login" type="hidden">
		<input name="uname" id="uname"  placeholder="用户名" required="" type="text">
		<hr class="hr15">
		<input name="password" placeholder="密码"  required="" type="password">
		<?php if($telSwitch == '开启'): ?>
		<hr class="hr15">
		<input style="width: 170px" class="yanzhengma" minlength="3" maxlength="6" type="text" name="telcode" placeholder="手机验证码" required="required" />
		<input style="width: 162px;font-size: 14px;background-color: #8327ee" onclick="telcode(this)" id="btn" type="button" class="getcode" value="获取手机验证码">
		<?php endif; ?>
		<hr class="hr15">
		<input required style="width: 50%;float: left;"  type="text" placeholder="验证码"  name="code" />
		<img style="float: right; height: 48px; cursor: pointer" src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random()">
		<hr class="hr15">
		<input value="登录" style="width:100%;" type="submit">
		<hr class="hr20">
	</form>

	
</div>
</body>
<script src="__MEMBER__/js/jquery-1.12.3.min.js"></script>
<!--JQuery cookie-->
<script src="/static/plus/js/jquery.cookie.js"></script>
<script src="/static/plus/layer/layer.js"></script>
<script>
    //判断cookie，防止被刷新
    $(function () {
        if($.cookie('total')!=undefined && $.cookie('total')!='NaN' && $.cookie('total')!=null){
            timessleeping();
        }else{
            $("#btn").attr('disabled',false);
        }
    });
    //COOKIE中的定时器
    function timessleeping() {
        $("#btn").attr('disabled',true);
        var interval=setInterval(function () {
            total=$.cookie('total');
            $("#btn").val(total+"秒后重新获取");
            total--;
            if(total<0){
                clearInterval(interval);
                $.cookie('total',total,{expires:-1});
                $("#btn").val('重新获取验证码');
                $("#btn").attr('disabled',false);
            }else{
                $.cookie('total',total);
            }
        },1000);
    }
    //发送验证码
    $(":button.getcode").click(function(){
        var countdown = 60;
        var uname=$("#uname").val();
        if(!uname){
            layer.msg(' 请填写账户在提交！', {icon: 2});
            return;
        }
        var _this = $(this);
        //设置button效果，开始计时
        _this.attr("disabled", "true");
        //_this.val(countdown + "秒后重获取");
        //启动计时器，1秒执行一次
        var timer = setInterval(function(){
            if (countdown == 0) {
                clearInterval(timer);//停止计时器
                _this.removeAttr("disabled");//启用按钮
                _this.val("重新发送");
            }
            else {
                countdown--;
                //_this.val(countdown + "秒后重获取");
            }
        }, 1000);
        $.ajax({
            type:"get",
            dataType:"json",
            data:{uname:uname},
            url:"<?php echo url('Login/getTelCode'); ?>",
            success:function(data){
                if(data==0){
                    layer.msg("该账户未注册手机号，错误提交！",{icon: 2});
                    countdown=0;
                    clearInterval(timer);//停止计时器
                    _this.removeAttr("disabled");//启用按钮
                    _this.val("重新发送验证码");
                }else if(data=='OK'){
                    $.cookie('total',120);
                    timessleeping();
                    layer.msg('发送成功，请注意查收！',{icon: 6});
                }else{
                    layer.msg(data,{icon: 7});
                    countdown=0;
                    clearInterval(timer);//停止计时器
                    _this.removeAttr("disabled");//启用按钮
                    _this.val("重新发送验证码");
                }

            }
        });
        return false;
    });
</script>
</html>