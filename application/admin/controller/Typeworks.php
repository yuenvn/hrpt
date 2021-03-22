<?php
namespace app\admin\controller;
use think\Db;
use think\Loader;
class Typeworks extends Common
{


  public function lists()
  {
      return  view();
  }

  public function add()
  {
      $prefix=config('database.prefix');  //取数据库前缀
      $tableModel=$prefix."model";  //前缀加字段
      $_typeworks=db('typeworks')->field("*,concat(path,',',id) as paths")->order('paths')->select(); //取数据库值
  //    $typeworks=Loader::model('typeworks')->catetree($_typeworks);  //排序

//      dump($typeworks);
//      die();

      foreach ($_typeworks as $k=>$v){
          $_typeworks[$k]['name']=str_repeat("|------",$v['level']).$v['name'].$v['codelevel'];
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
      var_dump($data);
      die();
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


}
