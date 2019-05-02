<?php
function hello(){
	return 'hello';
}
function birthday_day(){
	for($i=1;$i<=31;$i++){
        $i2=sprintf("%02d",$i); // ฟอร์แมตรูปแบบให้เป็น 00
        echo '<option value="'.$i2.'">'.$i2.'</option>';
    }
}
function birthday_month(){
	$output = '';
		$output .= '
		</option><option value="01">ม.ค.</option><option value="02">ก.พ.</option><option value="03">มี.ค.</option><option value="04">เม.ย.</option><option value="05">พ.ค.</option><option value="06">มิ.ย.</option><option value="07">ก.ค.</option><option value="08">ส.ค.</option><option value="09">ก.ย.</option><option value="10">ต.ค.</option><option value="11">พ.ย.</option><option value="12">ธ.ค.</option>';
	echo $output;
}
function birthday_year(){
	$xYear=date('Y'); // เก็บค่าปีปัจจุบันไว้ในตัวแปร
        for($i=0;$i<=100;$i++){
        echo '<option value="'.($xYear-$i).'">'.($xYear-$i+543).'</option>';
    }
}
function formatDateThat($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear $strHour:$strMinute";
}
function formatDateThaiBirthday($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}
function createDateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}
function dateThai($int){
    $num = intval($int);
    $arr = [" ","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"];
    return $arr[$num];
}

function dateThaiShort($int){
    $num = intval($int);
    $arr = [" ","ม.ค.","ก.พ.","มี.ค.","เม.ษ","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
    return $arr[$num];
}

function checkDuration($start_date, $end_date)
{
    $status = '';
    $now = Carbon\Carbon::now();
    if ($now < $start_date) {
        $status = 'ยังไม่เริ่มโปรโมชัน';
    } else if ($now > $end_date) {
        $status = 'หมดโปรโมชันแล้ว';
    } else {
        $start = Carbon\Carbon::parse($start_date);
        $end = Carbon\Carbon::parse($end_date);
        if($now->between($start,$end)){
            $status = 'อยู่ในช่วงโปรโมชั่น';
        }
    }
    return $status;
}

function checkOrderStatus($order_status)
{
    $status = '';
    if($order_status == 'new') {
        $status = 'ยังไม่แจ้งชำระเงิน';
    } else if($order_status == 'playment') {
        $status = 'แจ้งชำระเงินแล้ว';
    } else if($order_status == 'confirm') {
        $status = 'ยืนยันการชำระเงินแล้ว';
    } else if($order_status == 'not_confirm') {
        $status = 'ข้อมูลการชำระเงินไม่ถูกต้อง';
    } else {
        $status = 'ยกเลิกการสั่งซื้อ';
    }
    return $status;
}