<?php
namespace app\admin\controller;
use think\Db;
use think\Loader;
class Typeworks extends Common
{


    public function lists()
    {
        $prefix=config('database.prefix');
        $tableModel=$prefix."model";
        //链表查询
        $_typeworks=db('typeworks')->alias('a')->order('sort asc')->select();
        $typeworks=Loader::model('typeworks')->catetree($_typeworks);
//        dump($typeworks);
//        die();

        foreach ($typeworks as $key => $value) {
            $typeworks[$key]['basicsalary'] =Loader::model('typeworks')->currency_format($typeworks[$key]['basicsalary']);
        }

//        $currency_format=Loader::model('typeworks')->currency_format('$vnd');
        $this->assign(array(
            'typeworks'=>$typeworks,
//            'currency_format'=>$currency_format,
        ));
        return view();
    }
    public function isShowHidden()  //展开与收缩
    {
        $id=input('id');
        $sonIds=Loader::model('typeworks')->childrenids($id);
        echo json_encode($sonIds);
    }
    //排序
    public function sort()
    {
        if(request()->isAjax()){
            $id= input('valid');
            $datass['sort']=input('datass');
            $sort=db('typeworks')->where('id',$id)->update($datass);
            if($sort){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            $this->error("警告：非法访问！",url('lists'));
        }
    }

  public function add()
  {
//   越盾使用例子
//      $number = 1000000;
//      $format_number_1 = number_format($number);
//      echo "1 tham số - " . $format_number_1 . "<br />";
//      die();
      $prefix=config('database.prefix');  //取数据库前缀
      $tableModel=$prefix."model";  //前缀加字段
      $_typeworks=db('typeworks')->field("*,concat(path,',',id) as paths")->order('paths')->select(); //取数据库值

      foreach ($_typeworks as $k=>$v){
          $_typeworks[$k]['position']=str_repeat("|------",$v['level']).$v['position'].$v['codelevel'];
      }
 //     dump($_typeworks);
//      die();
      $this->assign(array( 'typeworks'=>$_typeworks,));
      return  view();

  }
  public function adddata(){
      //var_dump($_POST);
  //    $data=input('post.');
      $data=input('post.');
  //    $data['jobtitle']=$data['position'];

      //dump($data['position']=$data["jobtitle"]);
      //die();

//      $data['pid']=$data['pid'];
//      $data['name'];
//      $data['pid'];
//      $getpath=db('typeworks')->field('path')->find($data['pid']);
//      $data['path']=$getpath['path'];
//      $data['level']=substr_count($data['path'],',');

      $res=db('typeworks')->insert($data);
//      var_dump($getpath);
      if ($res){
          $this->success('添加成功','add');
      }else{
          $this->error('添加失败','add');
      }
  }
    public function edit($id)  //$id是带入的id,指当前选择的编辑项带入的id
    {
        if(request()->isPost()){
            $data=input('post.');
            $_data=array();
            foreach($data as $k=>$v){
                $_data[]=$k;
            }

            $validate=validate('typeworks'); //验证环节
            if(!$validate->scene('edit')->check($data)){ //如果验证环节错误
                $this->error($validate->getError());  //提示错误
            }
            if($data['id']==$data['pid']){  //如果id和pid相同,提示错误
                $this->error("选择错误，当前与上级组织相同！");
            }
            $edit=db('typeworks')->where('id',$id)->update($data); //查询当前选择项的id,更新$data
            if($edit){
                $this->success("修改组织成功",url('lists'));
            }else{
                $this->error("修改组织失败");
            }
        }

        $id=input('id');
        $typeworks=Loader::model('typeworks')->catetreeadd();
        $rs=db('typeworks')->find($id);
        //获取模型ID
        $model=db('model')->field('id,model_name')->select();
        $this->assign(array(
            'typeworks'=>$typeworks,
            'model'=>$model,
            'rs'=>$rs,
        ));
        return view();
    }
    public function delall(){
        $data=input('post.');
        if(@$data['itm']){
            foreach ($data['itm'] as $k=>$v){
                $this->del($v); //调用单条删除的方法
            }
            $this->success("批量删除成功！");
        }else{
            $this->error("非法操作！");
        }
    }


}
