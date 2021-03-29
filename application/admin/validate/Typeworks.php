<?php
namespace app\admin\validate;

use think\Validate;

class Typeworks extends Validate
{
    protected $rule = [
        'position'  =>  'require|max:30',  //职业

    ];
    protected $message=[
        'position.require'=>'组织名称不能为空！',
        'position.max'=>'组织名称不能超过30位！',
    ];
    //验证场景
    protected $scene=[
        //'add'=>[],
        'add'=>['position'],
        'edit'=>['position'],
    ];
}
