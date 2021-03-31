<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Image;
use think\Loader;

class Staff extends Common
{
    //列表
    public function lists()
    {

        //$rs=db('查询的表')->alias("指定为当前的,别名为a")->field("别名a.*,取b的表.字段name as 别名province)
        //join("查询表 b","表b.字段id=表a.字段native_province","left")->
        $rs = db('staff')->alias("a")->field("a.*,b.name as province,c.name as city,d.name as county,a.*,e.typename as departmentname")-> //查询当前用户表,并调用户地区
        join("common_district b", "b.id=a.native_province", "left")->  //省
        join("common_district c", "c.id=a.native_city", "left")->   //城市
        join("common_district d", "d.id=a.native_county", "left")->  //县市
        join("structure e", "e.id=a.department", "left")->  //获取岗位信息

        select();

//$timesql = array();
//foreach ($datasql as $key=>$value){
////    $datasql[$key][]
////    echo $key.PHP_EOL;
////    print_r($value);
//    $timesql[] = date("Y-m-d",$value["entrydate"]);
//}
//print_r($timesql);
//exit;


        foreach ($rs as $key => $value) {
            $rs[$key]["entrydate"] = $this->diffDate(date("Y-m-d"), date("Y-m-d", $value["entrydate"]));

        }
//var_dump($rs);

        $this->assign([
            'rs' => $rs,   //赋值给rs ,用rs来获取城市变量
//            'diffDateRes'=>$diffDateRes,

        ]);

        return view();
    }


    //上传图片的方法
    public function upload($picName)
    {
        $file=request()->file($picName);
        $info=$file->move(ROOT_PATH.'public/uploads/photos');
        if($info){
            return $info->getSaveName();
        }else{
            return $file->getError();
        }
    }

    //添加操作
    public function add()
    {

        $structureRes=$this->getStrucInfo($pid=1);
        //初始化获得部门信息
        $jobsRes=$this->getJobsInfo($pid=0);
        //初始化获得省份信息
        $provinceRes=$this->getCityInfo($pid=0,$level=1);
        //初始化职位信息
        $positionRes=$this->getPositionInfo($pid=0,$level=1);


        if(request()->isPost()){
            $data=input('post.');
            $validate=validate('staff');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $data['birthday']=strtotime($data['birthday']);
           // $data['entrydate']=strtotime($data['entrydate']);//strtotime计算unix时间戳
            $data['entrydate']=date($data['entrydate']);
            $data['create_time']=time();
            $data['update_time']=time();
            if($_FILES['photo']['tmp_name']){
                $data['photo']=$this->upload('photo');
            }
            // 添加操作 strict(false) 过滤该表不存在的字段
            $newSId=db('staff')->strict(false)->insertGetId($data);

            if($newSId){
                //培训记录操作
                if($data['training_info']){
                    $tra['sid']=$newSId;
                    $tra['training_info']=$data['training_info'];
                    db('staff_training_record')->insert($tra);
                }
                if(count($data['content'])){
                    foreach($data['content'] as $k1 => $v1){
                        $service_evaluation['sid']=$newSId;
                        $service_evaluation['content']=$v1;
                        $service_evaluation['sanctions']=$data['sanctions'][$k1];
                        $service_evaluation['score']=$data['score'][$k1];
                        if($service_evaluation['content']!="" || $service_evaluation['sanctions']!="" || $service_evaluation['score']!=""){
                            db('staff_service_evaluation')->insert($service_evaluation);
                        }
                    }
                }
                $this->success("添加员工成功！",'lists');
            }else{
                $this->error("添加员工失败！");
            }
            return;
        }
        $this->assign([
            'provinceRes'=>$provinceRes,
            'jobsRes'=>$jobsRes,
            'structureRes'=>$structureRes,
            'positionRes'=>$positionRes,
        ]);
        return view();
    }

    //编辑栏目操作
    public function edit()
    {
        $id=input('id');
        $rs=db('staff')->find($id);  //$rs取staff表的ID数据值
        $jors=db('staff')->find($id);
        $training=db('staff_training_record')->where(['sid'=>$id])->order('id desc')->find();
        $service_evaluation=db('staff_service_evaluation')->where(['sid'=>$id])->order('id desc')->select();
        if(request()->isPost()) {
            $data = input('post.');
            $validate=validate('staff');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $data['birthday'] = strtotime($data['birthday']);  //转化时间
            $data['entrydate'] = strtotime($data['entrydate']);
            $data['update_time'] = time();
            if ($_FILES['photo']['tmp_name']) {
                //如果上传了新的照片，则删除原来的照片
                if($rs['photo']){
                    $imgPath=UPLOADS."/photos/".$rs['photo'];
                    if(is_file($imgPath)){
                        @unlink($imgPath);
                    }
                }
                //上传新的照片
                $data['photo'] = $this->upload('photo');
            }
            // 更新操作 strict(false) 过滤该表不存在的字段
            $response= db('staff')->where(['id'=>$id])->strict(false)->update($data);

            if($response){
                //新增表单提交过来的培训记录
                if(isset($data['training_info'])){
                    if ($data['training_info']) {
                        $tra['training_info']=$data['training_info'];
                        $tra['sid']=$id;
                        db('staff_training_record')->where(['id'=>$training['id']])->update($tra);
                    }
                }

                //删除原来的服务评价记录
                db('staff_service_evaluation')->where(['sid'=>$id])->delete();  //判断原有的id 是否有相同的
                //新增表单提交过来的服务评价记录
                if (count($data['content'])>=1) {  //循环取值获得name的id,取尽
                    foreach ($data['content'] as $k1 => $v1) {
                        $service_evaluation['sid'] = $id;
                        $service_evaluation['content'] = $v1;
                        $service_evaluation['sanctions'] = $data['sanctions'][$k1];
                        $service_evaluation['score'] = $data['score'][$k1];
                        if ($service_evaluation['content'] != "" || $service_evaluation['sanctions'] != "" || $service_evaluation['score'] != "") {
                            db('staff_service_evaluation')->strict(false)->insert($service_evaluation);
                        }
                    }
                }
                $this->success("更新员工信息成功！",'lists');
            }else{
                $this->error("更新员工信息失败！");
            }
            return;
        }

        //初始化部门
        $structureRes=$this->getStrucInfo($status=1);
//        if($rs['department']){
//            $structureRes=model('Structure')->getStrucLevel($rs['department']); //先到structure 模型取getStrucLevel函数的数据库
//        }else{
//            $structureRes=[];
//        }

        //初始化职位信息
        $jobsRes=$this->getJobsInfo($pid=0);
//        if($jors['works_jobs']){ //取html,native_province的值,跳进入城市选项
//            $jobsRes=model('jobs')->getJobsLevel($rs['works_jobs'],2); //末尾的2表示leve2 级
//        }else{
//            $jobsRes=[];
//        }
        //初始化获得省份信息
        $provinceRes=$this->getCityInfo($pid=0,$level=1);

        //如果有省份信息，则调取城市
        if($rs['native_province']){ //取html,native_province的值,跳进入城市选项
            $cityRes=model('common_district')->getLevelCity($rs['native_province'],2);
        }else{
            $cityRes=[];
        }

        //如果有城市信息，则调取区县
        if($rs['native_city']){
            $countyRes=model('common_district')->getLevelCity($rs['native_city'],3);
        }else{
            $countyRes=[];
        }
        $this->assign([
            'rs'=>$rs,
            'training'=>$training,
            'service_evaluation'=>$service_evaluation,
            'provinceRes'=>$provinceRes,
            'cityRes'=>$cityRes,
            'countyRes'=>$countyRes,
            'jors'=>$jors,
            'jobsRes'=>$jobsRes,
            'structureRes'=>$structureRes,
        ]);
        return view();
    }

    public function vitae()
    {
        $id=input('id');
        $rs=db('staff')->alias("a")->field("a.*,b.name as province,c.name as city,d.name as county")->
        join("common_district b","b.id=a.native_province","left")->
        join("common_district c","c.id=a.native_city","left")->
        join("common_district d","d.id=a.native_county","left")->
        where(['a.id'=>$id])->find();
        $age=ceil((time()-$rs['birthday'])/(86400*365));  //计算出生年月
        $ageb=ceil((time()-$rs['entrydate'])/(86400*365)); //计算入职年月
        $training_record=db('staff_training_record')->where(['sid'=>$id])->select();
        $service_evaluation=db('staff_service_evaluation')->where(['sid'=>$id])->select();
        $encryptionUserName=encryption($rs['id_card']);
        $url=request()->domain()."/admin/search/staffInfo/key/".$encryptionUserName.".jsp";
        //生成二维码
        $code=getQrcode($url);
        $this->assign([
            'rs'=>$rs,
            'training_record'=>$training_record,
            'service_evaluation'=>$service_evaluation,
            'age'=>$age,
            'ageb'=>$ageb,
            'code'=>$code,
        ]);
        return view();
    }

    /**
     * AJAX删除培训记录
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function ajaxDelTraining()
    {
        if(request()->isAjax()){
            $id=input('id');
            $rs=db('staff_training_record')->delete($id);
            if($rs){
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    /**
     * AJAX删除培训记录
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function ajaxDelServices()
    {
        if(request()->isAjax()){
            $id=input('id');
            $rs=db('staff_service_evaluation')->delete($id);
            if($rs){
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    /**
     * 删除员工所有信息，采用AJAX操作
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del()
    {
        if(request()->isAjax()){
            $id= input('id');
            $imgUrl=input('imgUrl');
            if($imgUrl){
                $imgPath=UPLOADS."/photos/".$imgUrl;
                if(is_file($imgPath)){
                    //删除图片
                    @unlink($imgPath);
                }
            }

            //删除培训记录
            db('staff_training_record')->where(['sid'=>$id])->delete();

            //删除服务评价记录
            db('staff_service_evaluation')->where(['sid'=>$id])->delete();

            //删除主表数据，员工基本信息表
            $del=db('staff')->where(array('id'=>$id))->delete();
            if($del){
                echo 1; //删除成功
            }else{
                echo 0; //删除失败
            }
        }
    }
}
