<?php
namespace app\admin\controller;
use auth\Auth;
use think\Controller;
use think\Request;
use think\Db;

class Common extends Controller{
    public $confs;
    public function _initialize()
    {
        $this->confs=confs();
        //此方法获得模块及控制器的
        $request = Request::instance();
        $module = $request->module();//获得模块
        $con = $request->controller();//获得控制器
        $action = $request->action();
        $CKloginId = cookie('id');
        $loginId = session('id');
        if(!isset($loginId) || !isset($CKloginId)){  //验证账户,要求用户登录进行账户验证
            $this->logExit();
            $this->redirect("admin/Login/index");
//           dump('123');
//            die();
        }
        //后台登录超时
        cookie('id',$loginId,$this->confs['system_logout_time']*60);
        //这里是后面添加的
        $groupIdRes=db('admin')->field('groupid')->find($loginId);
        //获取当前登录的管理员用户组
        $userGroup = db('auth_group')->field('title,status')->find(['id' => $groupIdRes['groupid']]);
        //查找规则条目显示的条数
        $rulesNumber=db('auth_rule')->where(['show'=>1])->count('id');

        //实例化权限
        $auth = new Auth();
        $name = $module . "/" . $con . "/" . $action;

        //获取当前登录管理员的权限规则
        /*左侧菜单start*/
        //当只有用户组开启生效的时候才验证，否则菜单不隐藏
        //如果上方没有进行用户验证,则获取不到status值,菜单进行隐藏.

        if ($userGroup['status'] == 1) {
            $group = $auth->getGroups($loginId);
//            dump ($group);
//            die();
            $rules = explode(",", $group[0]['rules']);
        } else {
            $rules = [];
            for ($i = 0; $i < $rulesNumber; $i++) {
                $rules[$i] = $i;
            }
        }

        if(!$menu=cache('menu')){
            //顶级规则
           // $rules = [];
            $menu = [];
            $map['pid'] = ['=', 0];
            $map['show'] = ['=', 1];
            $map['id'] = ['in', $rules];
            $_map['id'] = ['in', $rules];
            $menu = db('authRule')->where($map)->order('sort asc')->select();
            //找到子栏目
            foreach ($menu as $k => $v) {
                $menu[$k]['children'] = db('authRule')->where($_map)->where(['pid' => $v['id'], 'show' => 1])->order('sort asc')->select();
                //三级
                foreach ($menu[$k]['children'] as $k1 => $v1) {
                    $menu[$k]['children'][$k1]['children'] = db('authRule')->where($_map)->where(['pid' => $v1['id'], 'show' => 1])->order('sort asc')->select();
                }
            }
            if($this->confs['cache']=='开启'){
                cache('menu',$menu,$this->confs['cache_time']);
            }
        }

        /*左侧菜单end*/
        //进行权限验证
        $auths = $auth->check($name, $loginId);
        $paichu = [];
        $paichu[0] = "admin/Index/index";
        $paichu[1] = "admin/Index/welcome";
        $paichu[2] = "admin/Admin/logout";
        $paichu[3] = "admin/Admin/edit";
        if (in_array($name, $paichu)) {
            $auths = true;
        }
        if ($loginId ==1) {
            $auths = true;
        }
        //当只有用户组开启生效的时候才验证
        if ($userGroup['status'] == 1)
        {
            if (!$auths) {
                $this->error("没有该操作权限！", url('Index/welcome'));
            }
         }



        $this->assign([
            'con' => $con,
            'userGroup' => $userGroup,
            'menuRes' => $menu,
            'configs'=>$this->confs,
            'url_root'=>request()->domain(),
        ]);

    }

    /**
     * 获得地址信息
     * @return array|false|\PDOStatement|string|\think\Collection
     */
    public function getCityInfo($pid=0,$level=1)  //获取地区信息
    {
        $cityRes=model('common_district')->getLevelCity($pid,$level);
        if($pid==0){
            return $cityRes;
        }else{
            echo json_encode($cityRes);
        }
    }

    //取数据
    public function getJobsInfo($pid=0)  //获取职位信息
    {
        $jobsRes=model('jobs')->getJobsLevel($pid);
        if($pid==0){
            return $jobsRes;
        }else{
            echo json_encode($jobsRes);
        }
    }
/*
 * $data1 当前时间
 * $data2 要对比的时间
 * 你传入的是array,他要的是一个字符串,或者是时间戳
 * */
    function diffDate($date1,$date2){

        $datetime1 = new \DateTime($date1);
        $datetime2 = new \DateTime($date2);
        $interval = $datetime1->diff($datetime2);
        $time1['y']         = $interval->format('%Y');
        $time1['m']         = $interval->format('%m');
        $time1['d']         = $interval->format('%d');
        // 两个时间相差总天数
        return $time1;
    }

    public function getStrucInfo($status=1)  //获取岗位信息
    {
        $structureRes=model('structure')->getStrucLevel($status);  //
        if($status==1){  //如果$pid的值等于1
            return $structureRes;  //返回
        }else{  //如果不等于1 返回
            echo json_encode($structureRes);
        }
    }
    //退出登录
    public function logExit()
    {
        session('id',null);
        session('uname',null);
        cookie('id',null);
    }

    //短信通知类方法
    /*互亿无线短信发送
    public function commonSmsNotice($tel,$smsStr)
    {
        $mobile=$tel;
        //短信接口地址
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        //获取手机号
        //短信配置
        $smsSet="account=".$this->confs['hywxAPIID']."&password=".$this->confs['hywxAPIKEY']."&mobile=";
        //短信息
        $smsMessage=$smsStr;
        //格式化
        $smsInfo="&content=".rawurlencode($smsMessage);
        //执行提交数据
        $post_data = $smsSet.$mobile.$smsInfo;
        xml_to_array(Post($post_data, $target));
    }
    */

    /*
     * 此方法作404，运营期间开启！
     */
    //public function _empty($method){
    //  return "您访问的".$method."方法不存在！";
    //}

}