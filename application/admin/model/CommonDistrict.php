<?php
namespace app\common\model;
use think\Model;
class CommonDistrict extends Model
{
    protected $field = true;  //忽略数据库表不存在的字段
    /**
     * 通过上级ID及级别获得对应城市结果集
     * @param $id
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getLevelCity($pid=0,$level=1)
    {
       return self::where(['upid'=>$pid,'level'=>$level])->select(); //level,1级城市,level2级城市,upid为父id,子id继承父id实现城市
    }

    public function getCityInfo($id)   //返回城市信息
    {
        return $this->field('name')->where(['id'=>$id])->find()['name'];
    }
}
