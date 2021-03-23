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

        $this->assign(array(
            'typeworks'=>$typeworks,
        ));
        return view();
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
          $_typeworks[$k]['positionname']=str_repeat("|------",$v['level']).$v['positionname'].$v['codelevel'];
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

//      $data['name']=$data['name'];
//      $data['pid']=$data['pid'];
      $data['name'];
      $data['pid'];
      $getpath=db('typeworks')->field('path')->find($data['pid']);
      $data['path']=$getpath['path'];
      $data['level']=substr_count($data['path'],',');

      $res=db('typeworks')->insert($data);
//      var_dump($getpath);
      if ($res){
          $this->success('添加成功','add');
      }else{
          $this->error('添加失败','add');
      }
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
