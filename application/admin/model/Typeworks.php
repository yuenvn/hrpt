<?php
namespace app\admin\Model;

use think\Loader;
use think\Model;

class Typeworks extends Model
{
 //越盾分隔符
    public function currency_format($number, $suffix = 'đ')  //这个是函数
    {
                if (!empty($number)) {
                    return number_format($number, 0, ',', '.') . "{$suffix}";
                }
    }

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
    public function childrenids($typeworksid){
        $data=$this->field('id,pid')->select();  //查询id和pid的值
        return $this->_childrenids($data,$typeworksid); //返回data 和
    }
    private function _childrenids($data,$typeworksid){
        static $arr=array();  //把array的值赋给arr
        foreach ($data as $k=>$v){ //循环取值
            if($v["pid"]==$typeworksid){  //取pid的值
                $arr[]=$v["id"];  //取id的值
                $this->_childrenids($data,$v["id"]); //用childrenids取data,$v[数组的值]
            }
        }
        return $arr; //返回一个数组
    }

    public function getLevelPosition($pid=0,$level=1)  //获取城市信息
    {
        return self::where(['pid'=>$pid,'level'=>$level])->select(); //level,1级城市,level2级城市,upid为父id,子id继承父id实现城市
    }

    public function getjobtitleInfo($id)   //返回职称信息
    {
        return $this->field('position')->where(['id'=>$id])->find()['jobtitle'];
    }

}


























