<?php
namespace app\common\model;
use think\Model;
class Jobs extends Model
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
    public function getJobsLevel($pid=0)  //获取职位等级
    {
        return self::where(['upid'=>$pid])->select(); //getJobsLevel函数返回 UPID的值和level的值
    }

}
