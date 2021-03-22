<?php
//function diffDate1($date1,$date2){
//
//    if(strtotime($date1)>strtotime($date2)){
//        $tmp=$date2;
//        $date2=$date1;
//        $date1=$tmp;
//    }
//    list($Y1,$m1,$d1)=explode('-',$date1);
//    list($Y2,$m2,$d2)=explode('-',$date2);
//    $Y=$Y2-$Y1;
//    $m=$m2-$m1;
//    $d=$d2-$d1;
//    if($d<0){
//        $d+=(int)date('t',strtotime("-1 month $date2"));
//        $m--;
//    }
//    if($m<0){
//        $m+=12;
//        $y--;
//    }
// return array('year'=>$Y,'month'=>$m,'day'=>$d);
//    return array('month'=>$Y2 * 12 + $m);
//}
//echo(date('y年m月',diffDate1(time(),1520179200)));
//$ageb=ceil((time()-1520179200)/(86400*365));
//$ageb=diffDate1(time(),1520179200);
//$agec=date('y年m月',$ageb['month']);
//print_r( $ageb);

function diffDate($date1,$date2)
{
    $datetime1 = new \DateTime($date1);
//
    $datetime2 = new \DateTime($date2);
//    $datetime2 = date("y-m-d",(1520179200));
    $interval = $datetime1->diff($datetime2);
//    $interval = date_diff($datetime1,$datetime2);
    $time1['y']         = $interval->format('%Y');
    $time1['m']         = $interval->format('%m');
    $time1['d']         = $interval->format('%d');
    // 两个时间相差总天数
    //$outtime=array($time1);
    return $time1;
//    return $datetime1;
}
//----------使用方式diffDate----------
$sss = diffDate('2010-03-15', '2018-12-26');
print_r($sss['d']);
//----------------------------------
//$outtime=explode(diffDate('2025-01-23','2018-12-12'));
//echo (($outtime[0]));
//$a=implode("|" ,( diffDate('2025-01-23','2018-12-12')));
//echo ("diffDate 的方式 - $a");
//$dat1=('1620179200','1520179200');

//$datetime1 = date("Y-m-d",(time()));
//echo ($this->diffDate->format("%R%a days"));

$zero1=strtotime (date("y-m-d h:i:s")); //当前时间  ,注意H 是24小时 h是12小时
$zero2=strtotime ("2014-1-21 00:00:00");  //过年时间，不能写2014-1-21 24:00:00  这样不对
$guonian= (($zero2-$zero1)/86400/365); //60s*60min*24h
//$guonian=(ceil(($zero1-$zero2)));
//round
//echo (round($guonian , 3));
//echo "离过年还有<strong>$guonian</strong>天！";
//echo date('m',(224928425));


//------date_diff的方式------//
$date1=date_create("1984-01-28");
$date2=date_create("1980-10-15");
$diff=date_diff($date1,$date2);
//echo $diff->format("%R%a days");
//------------//

//
//
//# 使用实例
//$sss = diffDate('2014-12-25', time());
//print_r($sss);

//$aaa = strtotime('2015-12-26 16:33:33');
//$bbb = time()-$aaa;
////echo gmstrftime('%Y %m %d',$bbb);
//
//$one = strtotime('2020-12-08 07:02:40');//开始时间 时间戳 入职时间
////$tow = strtotime('2011-12-25 00:00:00');//结束时间 时间戳 当前时间
//$tow = time();//结束时间 时间戳 当前时间
//$cle = $tow - $one; //得出时间戳差值
//$d = floor($cle/3600/24); //取一天
//$h = floor(($cle%(3600*24))/3600);  //%取余
//$m = floor(($cle%(3600*24))/600/60);
//$s = floor(($cle%(3600*24)));
//$yers=date('t',$cle);
//
////$ctat = date('y-m-d',strtotime($cle));
////echo "两个时间相差 $d 天 $h 小时 $m 分 $s 秒";
////echo "$yers";
//$myFirstMonts=mktime(0,0,0,4,1,2020);//已2012年4月为初始月份
//$intervalMonths=abs(date("Y",time())-date("Y",$myFirstMonts))*12+date("m",time())-date("m",$myFirstMonts);
////echo $intervalMonths.'个月';

function diffDate2($date1,$date2){
    $datestart= date('Y-m-d',($date1));
    if(($datestart)>($date2)){
        $tmp=$date2;
        $date2=$datestart;
        $datestart=$tmp;
    }
    list($Y1,$m1,$d1)=explode('-',$datestart);
    list($Y2,$m2,$d2)=explode('-',$date2);
    $Y=$Y2-$Y1;
    $m=$m2-$m1;
    $d=$d2-$d1;
    if($d<0){
        $d+=(int)date('t',strtotime("-1 month $date2"));
        $m--;
    }
    if($m<0){
        $m+=12;
        $Y--;
    }
    if($Y == 0){
        return $m.'个月'.$d.'天';
    }elseif($Y == 0 && $m == 0){
        return $d.'天';
    }else{
        $Y=date('Y',$Y);
        return $Y.'年'.$m.'个月'.$d.'天';
    }
}
//echo (diffDate2(1520179200,time()));


?>