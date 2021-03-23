<?php
namespace app\admin\Model;

use think\Model;

class Typeworks extends Model
{
 //越盾分隔符

            function currency_format($number, $suffix = 'đ') {
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

//    public function catetree($cateRes)
//    {
//        return $this->sort($cateRes);
//    }
//
}


























