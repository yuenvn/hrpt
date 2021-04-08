<?php
$type = isset(); //get提交数据 赋给$type
$parent_id=isset($_GET["prent_id"]) ? $_GET["parent_id"] : "";
if($type=="" || $parent_id=="") {
    exit(json_encode(array("flag" => false, "msg"=>"查询类型错误")));
}else{
    $sql="select *from globa where parent_id=$parent_id AND region_type=$type"; //数据库查询
    $result=$mysqli->query($sql);  //执行
    if ($result->num_rows>0)
    {
        $arr=[];
        while($row=$result->fetch_assoc())
        {
            $arr[$row["region_id"]]['region_id']=$row["region_id"];


        }
    }
}

?>