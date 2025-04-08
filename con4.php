<?php
require_once'connection.php';
$data = array();

$query = "select * from datas";
$result = mysql_query($query , $con);

if($result > 0){

}
else{
$query = 'create table if not exists datas(lang1 varchar(20) , lang2 varchar(20) , lang3 varchar(20) , 
feet varchar(3) , flipFlag boolean , unitFlag boolean , deciamalFlag boolean , feetFlag boolean , lColor varchar(10) , rColor varchar(10) )';
$result = mysql_query($query , $con) or die(mysql_error());


$query2 = "insert into datas(lang1, lang2,lang3,feet,flipFlag , unitFlag, decimalFlag , feetFlag, lColor , rColor) values('TAMIL','TELUGU', 'HINDI', '20', 0 , 1, 1, 1 , '#ff0000', '#00ff00' )";
$ress = mysql_query($query2 , $con) or die(mysql_error());


}

function getAllDatas($con){
$responce = array();
$query = "select * from datas";
$result = mysql_query($query , $con);

$row = mysql_fetch_row($result);
$data['lang1'] = $row[0];
$data['lang2'] = $row[1];
$data['lang3'] = $row[2];
$data['feet'] = $row[3];
$data['flipflag'] = $row[4];
$data['unitFlag'] = $row[5];
$data['decimalFlag'] = $row[6];
$data['feetFlag'] = $row[7];
$data['lColor'] = $row[8];
$data['rColor'] = $row[9];

echo json_encode($data);

}

function updateLang2Value($con , $data){
$query = "update datas set lang2 = '".$data."'";
$result = mysql_query($query , $con) or die(mysql_error());
$q1 = 'select lang2 from datas';
$r1 = mysql_query($q1 , $con);
$row1 = mysql_fetch_row($r1);
echo $row1[0].'data from lang2';
}

function updateLang3Value($con , $data){
$query = "update datas set lang3 = '".$data."'";
$result = mysql_query($query , $con) or die(mysql_error());
$q1 = 'select lang3 from datas';
$r1 = mysql_query($q1 , $con);
$row1 = mysql_fetch_row($r1);
echo $row1[0].'data from lang3';
}

function updateLang1Value($con , $data){
$query = "update datas set lang1 = '".$data."'";
$result = mysql_query($query , $con) or die(mysql_error());
$q1 = 'select lang1 from datas';
$r1 = mysql_query($q1 , $con);
$row1 = mysql_fetch_row($r1);
echo $row1[0].'data from lang1';
}

function updateReverseFlag($status , $con){

$query = "update datas set flipFlag = ".$status;
$result = mysql_query($query , $con) or die(mysql_error());
$q1 = 'select flipFlag from datas';
$r1 = mysql_query($q1 , $con);
$row1 = mysql_fetch_row($r1);
echo $row1[0].'data from flipFlag';

}

function updateDecimalFlag($status , $con){

$query = "update datas set decimalFlag = '".$status."'";
$result = mysql_query($query , $con) or die(mysql_error());
$q1 = 'select decimalFlag from datas';
$r1 = mysql_query($q1 , $con);
$row1 = mysql_fetch_row($r1);
echo $row1[0].'data from decimalFlag';

}

function updatefeetFlag($status , $con){

$query = "update datas set feetFlag = ".$status;
$result = mysql_query($query , $con) or die(mysql_error());
$q1 = 'select feetFlag from datas';
$r1 = mysql_query($q1 , $con);
$row1 = mysql_fetch_row($r1);
echo $row1[0].'data from feetFlag';

}
function updateUnitFlag($status , $con){

$query = "update datas set unitFlag = '".$status."'"	;
$result = mysql_query($query , $con) or die(mysql_error());
$q1 = 'select unitFlag from datas';
$r1 = mysql_query($q1 , $con);
$row1 = mysql_fetch_row($r1);
echo $row1[0].'data from unit';

}

function updateLColor($status , $con){

$query = "update datas set lColor = '".$status."'"	;
$result = mysql_query($query , $con) or die(mysql_error());
$q1 = 'select lColor from datas';
$r1 = mysql_query($q1 , $con);
$row1 = mysql_fetch_row($r1);
echo $row1[0].'data from left color';

}

function updateRColor($status , $con){

$query = "update datas set rColor = '".$status."'"	;
$result = mysql_query($query , $con) or die(mysql_error());
$q1 = 'select rColor from datas';
$r1 = mysql_query($q1 , $con);
$row1 = mysql_fetch_row($r1);
echo $row1[0].'data from rColor';

}

//echo updateRColor('#211111',$con);
echo getAllDatas($con);

?>