<?php
namespace app\admin\Model;

use think\Model;

class Structure extends Model
{
    public function getStrucLevel($status=1)  //获取岗位等级
    {
        return self::where(['status'=>$status])->select(); //getStrucLevel到数据库取status的值,赋给$pid
    }

    //组织排序[列表使用]
    public function catetree($cateRes){  //排序
        //$cateRes=$this->order('sort asc')->select();
        return $this->sort($cateRes);
    }
    public function catetreeadd()  //增加
    {
        $cateRes=$this->order('sort asc')->select();
        return $this->sort($cateRes);
    }
    public function sort($cateRes,$pid=0,$level=0){
        static $arr=array(); //$arr等于array数组
        foreach($cateRes as $k=>$v){
            if($v['pid']==$pid){ //$pid的值赋给v[pid]的值
                $v['level']=$level;//$level的值赋$v[level]
                $arr[]=$v; //将$v的值赋给$arr排列成数组
                $this->sort($cateRes,$v['id'],$level+1);//去$cateRes,sort按id的排序进行排列,等级+1扩展.
            }
        }
        return $arr; 
    }
    //获取组织及子组织ID
    public function childrenids($structureid){
        $data=$this->field('id,pid')->select();
        return $this->_childrenids($data,$structureid);
    }
    private function _childrenids($data,$structureid){
        static $arr=array();
        foreach ($data as $k=>$v){
            if($v["pid"]==$structureid){
                $arr[]=$v["id"];
                $this->_childrenids($data,$v["id"]);
            }
        }
        return $arr;
    }

    //批量删除
    public function delAll($idarrs)
    {
        foreach($idarrs as $k=>$v){
            $idArr[]=$this->childrenids($v);
            $v=(int)$v;
            $idArr[][]=$v;
        }
        $_idArr=array();
        foreach ($idArr as $k=>$v) {
            foreach ($v as $k1=>$v1) {
                $_idArr[]=$v1;
            }
        }
        $id=array_unique($_idArr);
        $this::destroy($id);
    }
}


























